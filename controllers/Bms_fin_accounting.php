<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bms_fin_accounting extends CI_Controller {
   
    function __construct () { 
        parent::__construct ();
        if(!isset($_SESSION['bms']['is_logged_in']) || $_SESSION['bms']['is_logged_in'] == false || $_SESSION['bms']['user_type'] != 'staff') {
	       redirect('index.php/bms_index/login?return_url='.($_SERVER['SERVER_NAME'] == 'www.tpaccbms.com' ? 'https://www.tpaccbms.com' : 'http://127.0.0.1').$_SERVER['REQUEST_URI']);       
	    }
        //$this->user_access_log->user_access_log_insert(); // create user access log
        // load necessary models
        
        $this->load->model('bms_masters_model');  
        $this->load->model('bms_fin_masters_model'); 
        $this->load->model('bms_fin_accounting_model');
        $this->load->helper('common_functions');
    }
    
    function journal_entry ($offset = 0, $per_page = 25) {
        $data['browser_title'] = 'Property Butler | Journal Entry';
        $data['page_header'] = '<i class="fa fa-file"></i> Journal Entry';
        
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        
        $data ['property_id'] = !empty($data['bill']['property_id']) ? $data['bill']['property_id'] : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        
        $data['offset'] = $offset;
        $data['per_page'] = $per_page;
        //$data['units'] = $this->bms_masters_model->getUnit ($data ['property_id'],0);
        
        $this->load->view('finance/accounting/jv_list_view',$data);
    }
    
    function get_jvs_list () {
        header('Content-type: application/json');        
        
        $jvs = array('numFound'=>0,'records'=>array());
        if (isset($_POST['offset']) && is_numeric($_POST['offset']) && $_POST['offset'] >= 0 && isset($_POST['rows']) && is_numeric($_POST['rows']) && $_POST['rows'] >= 0 && $_POST['rows'] <= 100 && isset($_POST['property_id']) && $_POST['property_id'] != '') {
            //$unit_id = $this->input->post('unit_id');
            $from = $this->input->post('from');
            $to = $this->input->post('to');
            $from = !empty($from) ? date('Y-m-d',strtotime($from)) : '';
            $to = !empty($to) ? date('Y-m-d',strtotime($to)) : ''; 
            $jvs = $this->bms_fin_accounting_model->getJvsList ($_POST['offset'], $_POST['rows'], $this->input->post('property_id'), $from,$to);
        }   
        echo json_encode($jvs);
    }
    
    function add_journal_entry ($jv_id='') {
        $data['browser_title'] = 'Property Butler | Journal Entry';
        $data['page_header'] = '<i class="fa fa-file"></i> Journal Entry <i class="fa fa-angle-double-right"></i> '.($jv_id != '' ? 'Update' : 'New').' Journal Entry';
        
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        
        $data ['property_id'] = !empty($data['bill']['property_id']) ? $data['bill']['property_id'] : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        if(empty($data ['property_id'])) {
            redirect('index.php/bms_dashboard/index');
        }
        $data['coas'] = $this->bms_fin_accounting_model->getAllCoa ($data ['property_id']);
        
        if(!empty($jv_id)) {
            $data['jv'] = $this->bms_fin_accounting_model->getJv($jv_id);
            if(!empty($data['jv']['jv_id'])) {
                $data['jv_items'] = $this->bms_fin_accounting_model->getJvItems($data['jv']['jv_id']);
            }
        }
        
        $this->load->view('finance/accounting/jv_add_view',$data);
    }
    
    function add_journal_entry_submit ($jv_id='') {
        //echo "<pre>";print_r($_POST);echo "</pre>"; exit;       
        
        $jv = $this->input->post('jv');
        $items = $this->input->post('jv_items');
        $type = 'add';
        if(!empty($jv['jv_date'])) {
            $jv['jv_date'] = date('Y-m-d',strtotime($jv['jv_date']));
        }        
        
        if(!empty($jv['jv_id'])) {
            $type = 'edit';
            $jv_id = $jv['jv_id'];
            $this->bms_fin_accounting_model->updateJv ($jv,$jv['jv_id']);
        } else {
            if(isset($jv['jv_id'])) unset($jv['jv_id']);
            $jv_date = !empty($jv['jv_date']) ? $jv['jv_date'] : date('d-m-Y');
            $prop_abbrev = $this->input->post('prop_abbr');
            $jv_no_format = ($prop_abbrev != '' ? $prop_abbrev : 'XX'). '/JV/'.date('y/m',strtotime($jv_date)).'/';
            $last_jv_no = $this->bms_fin_accounting_model->getLastJvNo ($jv_no_format);
            if(!empty ($last_jv_no)) {
                $last_no = explode('/',$last_jv_no['jv_no']);
                $jv['jv_no'] = $jv_no_format . (end($last_no) +1);
            } else {
                $jv['jv_no'] = $jv_no_format . 1001;
            }
            $jv['jv_time'] = date('H:i:s');
            $jv_id = $this->bms_fin_accounting_model->insertJv ($jv);
        }
        
        if(!empty($items['jv_coa_id'])) {
            $item['jv_id'] = $jv_id;
            foreach ($items['jv_coa_id'] as $key=>$val) {
                if(!empty($val)) {
                    $item['jv_coa_id'] = $val;                     
                    $item['description'] = $items['description'][$key];
                    $item['debit'] = $items['debit'][$key];
                    $item['credit'] = $items['credit'][$key];
                    
                    if(!empty($items['jv_item_id'][$key])) {
                        $this->bms_fin_accounting_model->updateJvItem ($item,$items['jv_item_id'][$key]);
                    } else {
                        $this->bms_fin_accounting_model->insertJvItem ($item);    
                    }               
                }
                                
            }
        }
        $_SESSION['flash_msg'] = 'Journal Entry '. ($type == 'edit' ? 'Edited' : 'Added') .' successfully!'; 
        redirect ('index.php/bms_fin_accounting/journal_entry');
    }
    
       
    function unset_jv_item () {        
        $jv_item_id = $this->input->post('jv_item_id');
        echo $this->bms_fin_accounting_model->deleteJvItem ($jv_item_id); 
    }
    
    function unset_jv () {        
        $jv_id = $this->input->post('jv_id');
        $this->bms_fin_accounting_model->deleteJvItemByJvId ($jv_id); 
        echo $this->bms_fin_accounting_model->deleteJv ($jv_id);
    }
    
    function general_ledger () {
        $data['browser_title'] = 'Property Butler | General Ledger';
        $data['page_header'] = '<i class="fa fa-file"></i> General Ledger';
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        $data['property_id'] = isset($_GET['property_id']) && trim($_GET['property_id']) != '' ? trim($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        
        if(!empty($_GET['from_date']) && !empty($_GET['to_date'])) {
            
            $from = date('Y-m-d',strtotime(trim($_GET['from_date'])));
            $to = date('Y-m-d',strtotime(trim($_GET['to_date']))); 
            
            $result = $this->bms_fin_accounting_model->get_coa ($data['property_id']);  
            
            
            $property_name = '';
            foreach ($data['properties'] as $key=>$val) {
                if($val['property_id'] == $_GET['property_id'] ) {
                    $property_name = !empty($val['jmb_mc_name']) ? $val['jmb_mc_name']: $val['property_name'];
                }
            }
            
            
            require_once APPPATH.'/third_party/PHPExcel.php';
            require_once APPPATH.'/third_party/PHPExcel/IOFactory.php';
            
            // Create new PHPExcel object
            $objPHPExcel = new PHPExcel();
            
            // Create a first sheet, representing sales data
            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true)->setSize(16);
            $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true)->setSize(14);
            
            $objPHPExcel->getActiveSheet()->mergeCells('A1:G1');
            $objPHPExcel->getActiveSheet()->mergeCells('A2:G2');
            $objPHPExcel->getActiveSheet()->mergeCells('A3:G3');
            
            $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
            $objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            
            $objPHPExcel->getActiveSheet()->mergeCells('E4:G4');
            
            
            
            $objPHPExcel->getActiveSheet()->setCellValue('A1', $property_name );
            $objPHPExcel->getActiveSheet()->setCellValue('A2', 'General Ledger' );
            $objPHPExcel->getActiveSheet()->setCellValue('A3', 'Period: '.$_GET['from_date'] .' - '.$_GET['to_date']);
            
            $objPHPExcel->getActiveSheet()->setCellValue('A4', 'All currencies are in RM');
            $objPHPExcel->getActiveSheet()->setCellValue('E4', 'Extracted: '.date('d-m-Y h:i a'));
            
            $row = 4;
            $sheet_head = array('Date', 'Description', 'Reference', 'Remarks', 'Debit', 'Credit', 'Balance');
            
            $styleArray = array(
                            	'borders' => array(
                            		'outline' => array(
                            			'style' => PHPExcel_Style_Border::BORDER_THICK,
                            			'color' => array('argb' => '00000000'),
                            		),
                                    'fill' => array(
                                		'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                                		'rotation' => 90,
                                		'startcolor' => array(
                                			'argb' => 'FFA0A0A0',
                                		),
                                		'endcolor' => array(
                                			'argb' => 'E1E1E1E1',
                                		),
                                	),

                            	),
                            );
            
            foreach ($result as $key=>$val) {
                
                if( $val['coa_code'] != '5001/000') {
                
                
                    /// After Some Operations
                    
                    $row += 3;
                    $objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getFont()->setBold(true)->setSize(12);
                    $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $val['coa_code'] . ' - ' . $val['coa_name'] ); 
                    $row++;
                    $objPHPExcel->getActiveSheet()->getStyle('A'.$row.':G'.$row)->getFont()->setBold(true)->setSize(12);
                    $objPHPExcel->getActiveSheet()->fromArray($sheet_head, NULL, 'A'.$row);
                                   
                    $objPHPExcel->getActiveSheet()->getStyle('A'.$row.':G'.$row)->applyFromArray($styleArray);
                    //$val['opening_debit'] = $val['opening_credit'] = 0.00;
                    $row++;
                    $balance = $bf_debit = $bf_credit = 0; 
                    if((!empty($val['opening_debit']) && abs ($val['opening_debit'] - 0) > 0.00001) || (!empty($val['opening_credit']) && abs ($val['opening_credit'] - 0) > 0.00001)) {
                        //echo "<br />".$val['coa_name'];
                        if(!empty($val['opening_debit']) && abs ($val['opening_debit'] - 0) > 0.00001) {
                              $balance +=  $val['opening_debit']; 
                              $bf_debit += $val['opening_debit'];
                        }                   
                        
                        if(!empty($val['opening_credit']) && abs ($val['opening_credit'] - 0) > 0.00001) {
                            $balance -=  $val['opening_credit']; 
                            $bf_credit += $val['opening_credit'];
                        }
                    }
                    
                    // payment & Receipt Enabled 
                    if(isset($val['payment_enabled']) && $val['payment_enabled'] == 1 && isset($val['receipt_enabled']) && $val['receipt_enabled'] == 1) {
                        $bf_debit_arr = $this->bms_fin_accounting_model->get_pay_ena_bf_debit ($data['property_id'],$val['coa_id'],$from);
                        $bf_credit_arr = $this->bms_fin_accounting_model->get_pay_ena_bf_credit ($data['property_id'],$val['coa_id'],$from);
                        if(!empty($bf_debit_arr['amount'])) {
                            $balance += $bf_debit_arr['amount'];
                            $bf_debit += $bf_debit_arr['amount'];
                        }
                        if(!empty($bf_credit_arr['amount'])) {
                            $balance -= $bf_credit_arr['amount'];
                            $bf_credit += $bf_credit_arr['amount'];
                        }
                        
                        $data['result'] = $this->bms_fin_accounting_model->get_pay_n_receip_ena ($data['property_id'],$val['coa_id'],$from,$to);
                        
                        
                    } // Bill & Receipt Enabled 
                    else if(isset($val['bill_enabled']) && $val['bill_enabled'] == 1 && isset($val['receipt_enabled']) && $val['receipt_enabled'] == 1) {
                        
                        $bf_debit_arr['amount'] = 0; // $this->bms_fin_accounting_model->get_bill_receipt_ena_bf_debit ($data['property_id'],$val['coa_id'],$from);
                        $bf_credit_arr = $this->bms_fin_accounting_model->get_bill_receipt_ena_bf_credit ($data['property_id'],$val['coa_id'],$from);
                        if(!empty($bf_debit_arr['amount'])) {
                            $balance += $bf_debit_arr['amount'];
                            $bf_debit += $bf_debit_arr['amount'];
                        }
                        if(!empty($bf_credit_arr['amount'])) {
                            $balance -= $bf_credit_arr['amount'];
                            $bf_credit += $bf_credit_arr['amount'];
                        }
                        
                        $data['result'] = $this->bms_fin_accounting_model->get_bill_receipt_ena ($data['property_id'],$val['coa_id'],$from,$to);
                        
                        
                    
                    } else if(isset($val['payment_source']) && $val['payment_source'] == 1) {
                        
                        $bf_debit_arr = $this->bms_fin_accounting_model->get_pay_sour_ena_bf_debit ($data['property_id'],$val['coa_id'],$from);
                        $bf_credit_arr = $this->bms_fin_accounting_model->get_pay_sour_ena_bf_credit ($data['property_id'],$val['coa_id'],$from);
                        if(!empty($bf_debit_arr['amount'])) {
                            $balance += $bf_debit_arr['amount'];
                            $bf_debit += $bf_debit_arr['amount'];
                        }
                        if(!empty($bf_credit_arr['amount'])) {
                            $balance -= $bf_credit_arr['amount'];
                            $bf_credit += $bf_credit_arr['amount'];
                        }
                        
                        $data['result'] = $this->bms_fin_accounting_model->get_pay_sour_ena ($data['property_id'],$val['coa_id'],$from,$to);
                        
                        
                    } else if(isset($val['payment_enabled']) && $val['payment_enabled'] == 1) {
                        $bf_debit_arr = $this->bms_fin_accounting_model->get_pay_ena_bf_debit ($data['property_id'],$val['coa_id'],$from);
                        $bf_credit_arr['amount'] = 0;//$this->bms_fin_accounting_model->get_pay_ena_bf_credit ($data['property_id'],$val['coa_id'],$from);
                        if(!empty($bf_debit_arr['amount'])) {
                            $balance += $bf_debit_arr['amount'];
                            $bf_debit += $bf_debit_arr['amount'];
                        }
                        if(!empty($bf_credit_arr['amount'])) {
                            $balance -= $bf_credit_arr['amount'];
                            $bf_credit += $bf_credit_arr['amount'];
                        }
                        $data['result'] = $this->bms_fin_accounting_model->get_pay_ena ($data['property_id'],$val['coa_id'],$from,$to);
                        //echo "<pre>";print_r($data['result']);echo "</pre>";
                    } 
                    else if($val['coa_code'] == '3000/000') {  // DEBTOR CONTROL
                        
                        $bf_debit_arr = $this->bms_fin_accounting_model->get_debtors_bf_debit ($data['property_id'],$from);
                        $bf_credit_arr = $this->bms_fin_accounting_model->get_debtors_bf_credit ($data['property_id'],$from);
                        if(!empty($bf_debit_arr['amount'])) {
                            $balance += $bf_debit_arr['amount'];
                            $bf_debit += $bf_debit_arr['amount'];
                        }
                        if(!empty($bf_credit_arr['amount'])) {
                            $balance -= $bf_credit_arr['amount'];
                            $bf_credit += $bf_credit_arr['amount'];
                        }
                        $data['result'] = $this->bms_fin_accounting_model->get_debtors_ledger ($data['property_id'],$from,$to);
                        
                    } // TRADE CREDITORS 
                    else if($val['coa_code'] == '4100/000') {
                        $bf_debit_arr = $this->bms_fin_accounting_model->get_creditors_bf_debit ($data['property_id'],$from);
                        $bf_credit_arr = $this->bms_fin_accounting_model->get_creditors_bf_credit ($data['property_id'],$from);
                        if(!empty($bf_debit_arr['amount'])) {
                            $balance += $bf_debit_arr['amount'];
                            $bf_debit += $bf_debit_arr['amount'];
                        }
                        if(!empty($bf_credit_arr['amount'])) {
                            $balance -= $bf_credit_arr['amount'];
                            $bf_credit += $bf_credit_arr['amount'];
                        }
                        $data['result'] = $this->bms_fin_accounting_model->get_creditors ($data['property_id'],$from,$to);
                    }
                    
                    $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $_GET['from_date']);
                    $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, 'Balance B/F'); 
                    if(!empty($bf_debit)) {
                        $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, number_format($bf_debit,2));    
                    }
                    if(!empty($bf_credit)) {
                        $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, number_format($bf_credit,2));    
                    }
                    //echo "<br />".$val['coa_name'] ." => ".$balance;
                    if(!empty($balance)) {
                        $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, number_format($balance,2));    
                    }
                    
                    if(!empty($data['result'])){
                        foreach ($data['result'] as $key2=>$val2) {
                            $row++;
                            $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, date('d-m-Y',strtotime($val2['doc_date'])));
                            $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $val2['descrip']); 
                            $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $val2['doc_no']); 
                            if($val2['item_type'] == 'debit') {
                                $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, number_format($val2['amount'],2)); 
                                $balance += $val2['amount']; 
                                $bf_debit += $val2['amount'];
                            }
                            if($val2['item_type'] == 'credit') {
                                $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, number_format($val2['amount'],2));
                                $balance -= $val2['amount'];  
                                $bf_credit += $val2['amount'];
                            }
                            
                            $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, number_format($balance,2));
                        }
                    }
                    
                    $row++;                        
                    $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, 'Total:');                 
                    $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, number_format($bf_debit,2)); 
                    $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, number_format($bf_credit,2)); 
                    $objPHPExcel->getActiveSheet()->getStyle('D'.$row.':F'.$row)->getFont()->setBold(true)->setSize(12);
                    
                    $row++;                        
                    $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, 'Balance C/F:');                 
                    $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, number_format($balance,2));
                    $objPHPExcel->getActiveSheet()->getStyle('D'.$row.':E'.$row)->getFont()->setBold(true)->setSize(12);
                    
                    $row += 2;                        
                    $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, 'Total Debits:');                 
                    $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, number_format($bf_debit,2));
                    $row++;
                    $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, 'Total Credits:');
                    $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, number_format($bf_credit,2));
                    
                    $objPHPExcel->getActiveSheet()->getStyle('D'.($row-4).':D'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                
                
                }                
                
            }
            
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
            
            // Rename sheet
            $objPHPExcel->getActiveSheet()->setTitle('General Ledger');
            
                        
            // Redirect output to a client’s web browser (Excel5)
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="GL_'.$property_name.$_GET['from_date'] .' - '.$_GET['to_date'].'_'.date('Ymd').'.xls"');
            header('Cache-Control: max-age=0');
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
                   
            //echo "<pre>";print_r($data['result']); exit;
        }
        $this->load->view('finance/accounting/general_ledger_view',$data);
    }
    
    function aging_report () {
        $data['browser_title'] = 'Property Butler | Aging Report';
        $data['page_header'] = '<i class="fa fa-file"></i> Aging Report';
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        $data['property_id'] = isset($_GET['property_id']) && trim($_GET['property_id']) != '' ? trim($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        if(!empty($_GET['property_id']) && !empty($_GET['aging_report']) && $_GET['aging_report'] == 'show') {
            //
            $data['debtors'] = $this->bms_fin_accounting_model->get_debtors_list ($data['property_id']);
            //echo "<pre>";print_r($data['debtors']);echo "</pre>";exit;
            if(!empty($data['debtors'])) {
                $date_four_mon_start = date('Y-m-01',strtotime('-3 months',strtotime(date('Y-m-d'))));
                $date_four_mon_end = date('Y-m-t',strtotime('-3 months',strtotime(date('Y-m-d'))));
                $date_three_mon_start = date('Y-m-01',strtotime('-2 months',strtotime(date('Y-m-d'))));
                $date_three_mon_end = date('Y-m-t',strtotime('-2 months',strtotime(date('Y-m-d'))));
                $date_two_mon_start = date('Y-m-01',strtotime('-1 months',strtotime(date('Y-m-d'))));
                $date_two_mon_end = date('Y-m-t',strtotime('-1 months',strtotime(date('Y-m-d'))));
                $date_curr_mon_start = date('Y-m-01',strtotime(date('Y-m-d')));
                $date_curr_mon_end = date('Y-m-t',strtotime(date('Y-m-d')));
                
                $data['five_mon_plus'] = $this->bms_fin_accounting_model->get_debtors_aging ($data['property_id'],$date_four_mon_start);
                $data['four_mon'] = $this->bms_fin_accounting_model->get_debtors_aging ($data['property_id'],$date_four_mon_start,$date_four_mon_end);
                $data['three_mon'] = $this->bms_fin_accounting_model->get_debtors_aging ($data['property_id'],$date_three_mon_start,$date_three_mon_end);
                $data['two_mon'] = $this->bms_fin_accounting_model->get_debtors_aging ($data['property_id'],$date_two_mon_start,$date_two_mon_end);
                $data['curr_mon'] = $this->bms_fin_accounting_model->get_debtors_aging ($data['property_id'],$date_curr_mon_start,$date_curr_mon_end);
                
                $data['aging'][5]['total'] = 0;
                foreach($data['five_mon_plus'] as $key=>$val) {
                    $data['aging'][5][$val['unit_id']] = $val['amt'];
                    $data['aging'][5]['total'] += $val['amt'];
                }
                
                $data['aging'][4]['total'] = 0;
                foreach($data['four_mon'] as $key=>$val) {
                    $data['aging'][4][$val['unit_id']] = $val['amt'];
                    $data['aging'][4]['total'] += $val['amt'];
                }
                
                $data['aging'][3]['total'] = 0;
                foreach($data['three_mon'] as $key=>$val) {
                    $data['aging'][3][$val['unit_id']] = $val['amt'];
                    $data['aging'][3]['total'] += $val['amt'];
                }
                
                $data['aging'][2]['total'] = 0;
                foreach($data['two_mon'] as $key=>$val) {
                    $data['aging'][2][$val['unit_id']] = $val['amt'];
                    $data['aging'][2]['total'] += $val['amt'];
                }
                
                $data['aging'][1]['total'] = 0;
                foreach($data['curr_mon'] as $key=>$val) {
                    $data['aging'][1][$val['unit_id']] = $val['amt'];
                    $data['aging'][1]['total'] += $val['amt'];
                }
                
                
                $property_name = '';
                foreach ($data['properties'] as $key=>$val) {
                    if($val['property_id'] == $_GET['property_id'] ) {
                        $property_name = !empty($val['jmb_mc_name']) ? $val['jmb_mc_name']: $val['property_name'];
                    }
                }
                
                
                require_once APPPATH.'/third_party/PHPExcel.php';
                require_once APPPATH.'/third_party/PHPExcel/IOFactory.php';
                
                // Create new PHPExcel object
                $objPHPExcel = new PHPExcel();
                
                // Create a first sheet, representing sales data
                $objPHPExcel->setActiveSheetIndex(0);
                $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true)->setSize(16);
                $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true)->setSize(14);
                
                $objPHPExcel->getActiveSheet()->mergeCells('A1:J1');
                $objPHPExcel->getActiveSheet()->mergeCells('A2:J2');
                //$objPHPExcel->getActiveSheet()->mergeCells('A3:G3');
                
                $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //$objPHPExcel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                //$objPHPExcel->getActiveSheet()->mergeCells('E4:G4');
                
                
                
                $objPHPExcel->getActiveSheet()->setCellValue('A1', $property_name );
                $objPHPExcel->getActiveSheet()->setCellValue('A2', 'TRADE DEBTORS - AGING REPORT AS AT ' .date('d-m-Y h:i a'));
                //$objPHPExcel->getActiveSheet()->setCellValue('A3', 'Period: '.$_GET['from_date'] .' - '.$_GET['to_date']);
                
                $objPHPExcel->getActiveSheet()->setCellValue('A3', 'All currencies are in RM');
                //$objPHPExcel->getActiveSheet()->setCellValue('E4', 'Extracted: '.date('d-m-Y h:i a'));
                
                
                $sheet_head = array('S No', 'Account No', 'Unit No', 'Name', '5 Months+', '4 Months', '3 Months', '2 Months','Current','Total');
                
                $styleArray = array(
                            	'borders' => array(
                            		'outline' => array(
                            			'style' => PHPExcel_Style_Border::BORDER_THICK,
                            			'color' => array('argb' => '00000000'),
                            		),
                                    'fill' => array(
                                		'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                                		'rotation' => 90,
                                		'startcolor' => array(
                                			'argb' => 'FFA0A0A0',
                                		),
                                		'endcolor' => array(
                                			'argb' => 'E1E1E1E1',
                                		),
                                	),

                            	),
                            );
                            
                $row = 4;                      
                
                $objPHPExcel->getActiveSheet()->getStyle('A'.$row.':J'.$row)->getFont()->setBold(true)->setSize(12);
                $objPHPExcel->getActiveSheet()->fromArray($sheet_head, NULL, 'A'.$row);
                               
                $objPHPExcel->getActiveSheet()->getStyle('A'.$row.':J'.$row)->applyFromArray($styleArray);
                
                
                $sno = 1;            
                foreach ($data['debtors'] as $key=>$val) {
                    
                    if(!empty($data['aging'][5][$val['unit_id']]) || !empty($data['aging'][4][$val['unit_id']]) || !empty($data['aging'][3][$val['unit_id']]) || !empty($data['aging'][2][$val['unit_id']]) || !empty($data['aging'][1][$val['unit_id']])) {                    
                    
                        $row++; $sub_total = 0;
                        $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $sno++);
                        $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $val['coa_code']);
                        $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $val['unit_no']);
                        $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $val['owner_name']);
                        if(!empty($data['aging'][5][$val['unit_id']])) {
                            $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $data['aging'][5][$val['unit_id']]);
                            $sub_total += $data['aging'][5][$val['unit_id']];
                        } else {
                            $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, ' - ');
                        }
                        if(!empty($data['aging'][4][$val['unit_id']])) {
                            $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $data['aging'][4][$val['unit_id']]);
                            $sub_total += $data['aging'][4][$val['unit_id']];
                        } else {
                            $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, ' - ');
                        }
                        if(!empty($data['aging'][3][$val['unit_id']])) {
                            $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $data['aging'][3][$val['unit_id']]);
                            $sub_total += $data['aging'][3][$val['unit_id']];
                        } else {
                            $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, ' - ');
                        }
                        if(!empty($data['aging'][2][$val['unit_id']])) {
                            $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $data['aging'][2][$val['unit_id']]);
                            $sub_total += $data['aging'][2][$val['unit_id']];
                        } else {
                            $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, ' - ');
                        }
                        if(!empty($data['aging'][1][$val['unit_id']])) {
                            $objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $data['aging'][1][$val['unit_id']]);
                            $sub_total += $data['aging'][1][$val['unit_id']];
                        } else {
                            $objPHPExcel->getActiveSheet()->setCellValue('I'.$row, ' - ');
                        }
                        
                        $objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $sub_total);
                          
                    }
                }            
                
                //$objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $data['aging'][5][$val['unit_id']]);
                
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
                $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
                $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
                $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
                $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
                $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
                
                
                // Rename sheet
                $objPHPExcel->getActiveSheet()->setTitle('Debtors Aging');
                
                            
                // Redirect output to a client’s web browser (Excel5)
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="AGING_'.$property_name.date('Ymd').'.xls"');
                header('Cache-Control: max-age=0');
                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                $objWriter->save('php://output');    
                
                //echo "<pre>";print_r($data['two_mon']);echo "</pre>";
                
            }
            
        }
        $this->load->view('finance/accounting/aging_report_view',$data);
    }
    
    function bank_recon ($offset = 0, $per_page = 25) {
        $data['browser_title'] = 'Property Butler | Bank Reconciliation';
        $data['page_header'] = '<i class="fa fa-file"></i> Bank Reconciliation';
        
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        
        $data ['property_id'] = !empty($data['bill']['property_id']) ? $data['bill']['property_id'] : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        
        $data['offset'] = $offset;
        $data['per_page'] = $per_page;
        
        $this->load->view('finance/accounting/bank_recon_view',$data);
    }
    
    function get_bank_recon () {
        header('Content-type: application/json');        
        
        $bank_recon = array('numFound'=>0,'records'=>array());
        if (isset($_POST['offset']) && is_numeric($_POST['offset']) && $_POST['offset'] >= 0 && isset($_POST['rows']) && is_numeric($_POST['rows']) && $_POST['rows'] >= 0 && $_POST['rows'] <= 100 && isset($_POST['property_id']) && $_POST['property_id'] != '') {
            //$unit_id = $this->input->post('unit_id');
            $from = $this->input->post('from');
            $to = $this->input->post('to');
            $from = !empty($from) ? date('Y-m-d',strtotime($from)) : '';
            $to = !empty($to) ? date('Y-m-d',strtotime($to)) : ''; 
            $jvs = $this->bms_fin_accounting_model->getBankRecon ($_POST['offset'], $_POST['rows'], $this->input->post('property_id'),$this->input->post('status'), $from,$to);
        }   
        echo json_encode($jvs);
    }
    
    function set_bank_recon () {
        $id = $this->input->post('id');
        $type = $this->input->post('type');
        $val = $this->input->post('val');
        if($id != '' && $type != '' && $val != '') {
            echo $this->bms_fin_accounting_model->setBankRecon ($id,$type,$val);
        }
        
    }
    
    function income_expenses () {
        $data['browser_title'] = 'Property Butler | Income & Expenses';
        $data['page_header'] = '<i class="fa fa-file"></i> Income &amp; Expenses';
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        $data['property_id'] = isset($_GET['property_id']) && trim($_GET['property_id']) != '' ? trim($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        
        $this->load->view('finance/accounting/income_expenses_view',$data);
    }
    
    function trail_balance () {
        $data['browser_title'] = 'Property Butler | Trail Balance';
        $data['page_header'] = '<i class="fa fa-file"></i> Trail Balance';
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        $data['property_id'] = isset($_GET['property_id']) && trim($_GET['property_id']) != '' ? trim($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        
        $this->load->view('finance/accounting/trail_balance_view',$data);
    }
    
    function balance_sheet () {
        $data['browser_title'] = 'Property Butler | Balance Sheet';
        $data['page_header'] = '<i class="fa fa-file"></i> Balance Sheet';
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        $data['property_id'] = isset($_GET['property_id']) && trim($_GET['property_id']) != '' ? trim($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        
        $this->load->view('finance/accounting/balance_sheet_view',$data);
    }   
    
    
    function payment_receipt () {
        $data['browser_title'] = 'Property Butler | Receipt &amp; Payment';
        $data['page_header'] = '<i class="fa fa-file"></i> Receipt &amp; Payment';
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        $data['property_id'] = isset($_GET['property_id']) && trim($_GET['property_id']) != '' ? trim($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        
        $this->load->view('finance/accounting/payment_receipt_view',$data);
    }
    
    function reminder_letter () {
        $data['browser_title'] = 'Property Butler | Reminder Letter';
        $data['page_header'] = '<i class="fa fa-file"></i> Reminder Letter';
        
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        
        $data ['property_id'] = !empty($data['bill']['property_id']) ? $data['bill']['property_id'] : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        
        $data['units'] = $this->bms_masters_model->getUnit ($data ['property_id'],0);
        
        $this->load->view('finance/accounting/reminder_letter_view',$data);
    }
    
    
    
	
    
}