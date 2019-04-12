<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bms_fin_receipt extends CI_Controller {
   
    function __construct () { 
        parent::__construct ();
        if(!isset($_SESSION['bms']['is_logged_in']) || $_SESSION['bms']['is_logged_in'] == false || $_SESSION['bms']['user_type'] != 'staff') {
	       redirect('index.php/bms_index/login?return_url='.($_SERVER['SERVER_NAME'] == 'www.tpaccbms.com' ? 'https://www.tpaccbms.com' : 'http://127.0.0.1').$_SERVER['REQUEST_URI']);       
	    }
        //$this->user_access_log->user_access_log_insert(); // create user access log
        // load necessary models
        
        $this->load->model('bms_masters_model');  
        $this->load->model('bms_fin_masters_model'); 
        $this->load->model('bms_fin_receipt_model');
        $this->load->helper('common_functions');
    }
    
    function getSubCategory () {
        header('Content-type: application/json');
        $cat_id = trim($this->input->post('cat_id'));
        $sub_cats = array ();
        if($cat_id) {
            $sub_cats = $this->bms_fin_masters_model->getSubCategory ($cat_id);       
        }
        echo json_encode($sub_cats);
    }
    
    function get_banks () {
        header('Content-type: application/json');
        $property_id = trim($this->input->post('property_id')); 
        $banks = array();
        if($property_id) {
            $banks = $this->bms_fin_masters_model->getBanksForReceipt ($property_id);            
        }
        echo json_encode($banks);
    }

   
	public function receipt_list ($offset = 0, $per_page = 25) {
		//echo "fdfd";exit;
		// $this->load->model('vendors_model');
        //echo "<pre>";print_r($_SESSION);echo "</pre>";
		$data['browser_title'] = 'Property Butler | Receipt';
        $data['page_header'] = '<i class="fa fa-file"></i> Receipt';
        
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        $data['property_id'] = isset($_GET['property_id']) && trim($_GET['property_id']) != '' ? trim($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        
        //$data['sales_items'] = $this->bms_fin_masters_model->getSalesItems ();
        //echo "<pre>";print_r($data['sales_items']); echo "</pre>";
        
        $data['units'] = $this->bms_masters_model->getUnit ($data ['property_id'],0);
        
        
        $data['offset'] = $offset;
        $data['per_page'] = $per_page;
        
        $this->load->view('finance/receipt/receipt_list_view',$data);
	}
    
    function get_receipt_list () {
        header('Content-type: application/json');        
        
        $bills = array();
        if (isset($_POST['offset']) && is_numeric($_POST['offset']) && $_POST['offset'] >= 0 && isset($_POST['rows']) && is_numeric($_POST['rows']) && $_POST['rows'] >= 0 && $_POST['rows'] <= 100 && isset($_POST['property_id']) && $_POST['property_id'] != '') {
            $unit_id = $this->input->post('unit_id');
            $from = $this->input->post('from');
            $to = $this->input->post('to');
            $from = !empty($from) ? date('Y-m-d',strtotime($from)) : '';
            $to = !empty($to) ? date('Y-m-d',strtotime($to)) : ''; 
            $bills = $this->bms_fin_receipt_model->getReceiptList ($_POST['offset'], $_POST['rows'], $this->input->post('property_id'), $unit_id,$from,$to);
        }       
        echo json_encode($bills);
    } 
    
    
	public function add_receipt($receipt_id = '', $act_type = ''){
	
		$data['act_type'] = $act_type;
        //echo "<pre>";print_r($_SESSION);echo "</pre>";
		$data['browser_title'] = 'Property Butler | Receipt';
        $data['page_header'] = '<i class="fa fa-file"></i> Receipt';
        
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        
        if(!empty($receipt_id)) {
            $data['receipt'] = $this->bms_fin_receipt_model->getReceipt($receipt_id);
            if(!empty($data['receipt']['receipt_id'])) {
                $data['blocks'] = $this->bms_masters_model->getBlocks ($data['receipt']['property_id']); 
                $data['units'] = $this->bms_masters_model->getUnit ($data['receipt']['property_id'],$data['receipt']['block_id']);   
                $data['banks'] = $this->bms_fin_masters_model->getBanks ($data['receipt']['property_id']);
                $data['receipt_items'] = $this->bms_fin_receipt_model->getReceiptItems($data['receipt']['receipt_id']);
                //echo "<pre>";print_r($data['receipt']);echo "</pre>";exit;
                /*if(!empty($data['receipt_items'])) {
                    foreach ($data['receipt_items'] as $key=>$val) {
                        if(!empty($val['item_sub_cat_id'])){
                            $data['receipt_items'][$key]['sub_cat_dd'] = $this->bms_fin_masters_model->getSubCategory ($val['item_cat_id']);    
                        } else {
                            $data['receipt_items'][$key]['sub_cat_dd'] = array();
                        }                        
                    }                       
                } */               
            }            
        }
        //echo "<pre>";print_r($data);echo "</pre>";
        $data ['property_id'] = !empty($data['receipt']['property_id']) ? $data['receipt']['property_id'] : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
               
        $data['sales_items'] = $this->bms_fin_masters_model->getSalesItemsForReceipt ($data ['property_id']);            
        $this->load->view('finance/receipt/receipt_add_view',$data);
	}
    
    function add_receipt_submit () {
        //echo "<pre>";print_r($_POST);echo "</pre>"; exit;
        $receipt = $this->input->post('receipt');
        $items = $this->input->post('items');
        
        $type = 'add';
        if(!empty($receipt['receipt_date'])) {
            $receipt['receipt_date'] = date('Y-m-d',strtotime($receipt['receipt_date']));
        }
        $pm_details = $this->input->post('pm_details');
        switch ($receipt['payment_mode']) {
            case 2: 
                $receipt['bank'] = !empty($pm_details['cheq_bank']) ? $pm_details['cheq_bank'] : '';
                $receipt['cheq_card_txn_no'] = !empty($pm_details['cheq_no']) ? $pm_details['cheq_no'] : '';
                $receipt['cheq_txn_online_date'] = !empty($pm_details['cheq_date']) ? date('Y-m-d',strtotime($pm_details['cheq_date'])) : '';
                break;
            case 3: 
                $receipt['bank'] = !empty($pm_details['card_bank']) ? $pm_details['card_bank'] : '';
                $receipt['cheq_card_txn_no'] = !empty($pm_details['card_txn_no']) ? $pm_details['card_txn_no'] : '';
                $receipt['online_r_card_type'] = !empty($pm_details['card_type']) ? $pm_details['card_type'] : '';
                break;
            case 4: 
                $receipt['bank'] = !empty($pm_details['online_bank']) ? $pm_details['online_bank'] : '';
                $receipt['cheq_card_txn_no'] = !empty($pm_details['online_txn_no']) ? $pm_details['online_txn_no'] : '';
                $receipt['online_r_card_type'] = !empty($pm_details['online_type']) ? $pm_details['online_type'] : '';
                $receipt['cheq_txn_online_date'] = !empty($pm_details['online_date']) ? date('Y-m-d',strtotime($pm_details['online_date'])) : '';
                break;
        }   
        
        
        if(!empty($receipt['receipt_id'])) {
            $type = 'edit';
            $receipt_id = $receipt['receipt_id'];
            $this->bms_fin_receipt_model->updateReceipt ($receipt,$receipt['receipt_id']);
        } else {
            $receipt_date = !empty($receipt['receipt_date']) ? $receipt['receipt_date'] : date('d-m-Y');
            
            $prop_abbrev = $this->input->post('prop_abbr');
            $receipt_no_format = ($prop_abbrev != '' ? $prop_abbrev : 'XX'). '/OR/'.date('y', strtotime($receipt_date)).'/'.date('m', strtotime($receipt_date)).'/';
            $last_no = $this->bms_fin_receipt_model->getLastReceiptNo ($receipt_no_format);
            if(!empty ($last_no)) {
                $last_no = explode('/',$last_no['receipt_no']);
                $receipt['receipt_no'] = $receipt_no_format . (end($last_no) +1);
            } else {
                $receipt['receipt_no'] = $receipt_no_format . 1001;
            }
            $receipt['receipt_time'] = date('H:i:s');
            $receipt_id = $this->bms_fin_receipt_model->insertReceipt ($receipt);
        }
        
        if(!empty($items['item_cat_id'])) {
            $item['receipt_id'] = $receipt_id;
            $bill_item_ids = array();
            foreach ($items['item_cat_id'] as $key=>$val) {
                if(!empty($items['paid_amount'][$key])) {
                    $item['item_cat_id'] = $val;
                    //$item['item_sub_cat_id'] = $items['item_sub_cat_id'][$key] != 'None' ? $items['item_sub_cat_id'][$key]: ''; 
                    $item['item_descrip'] = $items['item_descrip'][$key];
                    $item['item_period'] = $items['item_period'][$key];
                    $item['item_amount'] = $items['item_amount'][$key];
                    $item['paid_amount'] = $items['paid_amount'][$key];
                    $item['bal_amount'] = $items['bal_amount'][$key];
                    
                    // Calculation Adjustment
                    $item_amount_orgi = $items['item_amount'][$key];
                    if(isset($items['item_amount_orgi'][$key])) {
                        if($items['item_amount_orgi'][$key] != '') {
                            $item_amount_orgi = $items['item_amount_orgi'][$key];                            
                        }
                        unset($items['item_amount_orgi'][$key]);                        
                    }                   
                    
                    if(!empty($items['bill_item_id'][$key])) {
                        //echo "<br />".$key . ' => ' . $items['paid_amount'][$key];
                        //$bill_item['item_amount'] = $item['item_amount'];
                        $bill_item['bal_amount'] = $item['bal_amount'];
                        if(abs($item['bal_amount'] - 0) < 0.00001) {
                            $bill_item['paid_amount'] = $item_amount_orgi;
                            $bill_item['paid_status'] = 1;
                        } else {
                            $bill_item['paid_amount'] = $item_amount_orgi - $item['bal_amount'];
                            $bill_item['paid_status'] = 0;
                        }
                        $this->bms_fin_receipt_model->setBillItem($items['bill_item_id'][$key],$bill_item);
                        array_push($bill_item_ids,$items['bill_item_id'][$key]);
                        $item['bill_item_id'] = $items['bill_item_id'][$key] ;
                    } else {
                        $item['bill_item_id'] = '';
                    }
                    
                    if(!empty($items['receipt_item_id'][$key])) {
                        $this->bms_fin_receipt_model->updateReceiptItem ($item,$items['receipt_item_id'][$key]);
                    } else {
                        $this->bms_fin_receipt_model->insertReceiptItem ($item);    
                    } 
                }              
                                
            }
            //echo "<pre>";print_r($bill_item_ids);echo "</pre>"; exit;
            if(!empty($bill_item_ids)) {
                $bill_ids = $this->bms_fin_receipt_model->getBillItemPaidStatusForBill (implode(',',$bill_item_ids));
                if(!empty($bill_ids)) {                    
                    foreach ($bill_ids as $key=>$val) {
                        if(!empty($val['bill_cnt']) && $val['bill_cnt'] > 0 && $val['bill_cnt'] == $val['paid_cnt']) {
                            $this->bms_fin_receipt_model->setBillAsPaid($val['bill_id']);
                        }
                    }
                }    
            }
        }
        /*if(!empty($receipt['open_credit']) && $receipt['open_credit'] > 0) {
            $oc['unit_id'] = $receipt['unit_id'];
            $oc['receipt_id'] = $receipt_id;
            $oc['amount'] = $receipt['open_credit'];
            $oc['oc_date'] = date('Y-m-d');
            //$oc['last_used'] = $receipt['unit_id'];
            //$oc['balance'] = $receipt['unit_id'];
            $this->bms_fin_receipt_model->insertOpenCredit ($oc);    
        }*/
        
        $_SESSION['flash_msg'] = 'Receipt '. ($type == 'edit' ? 'Edited' : 'Added') .' successfully!'; 
        redirect ('index.php/bms_fin_receipt/receipt_details/'.$receipt_id);
    }
    
	function getOutstandingBills ($key_cnt=0) {
	   
       $unit_id = $_POST['unit_id'];
       $property_id = $_POST['property_id'];
       $data['key_cnt'] = $key_cnt;
       $open_credit = $key_cnt == 0 ? $this->bms_fin_receipt_model->checkOpenCredit($unit_id) : '';
       if(empty($open_credit)) {       
       
           $data['sales_items'] = $this->bms_fin_masters_model->getSalesItemsForReceipt ($property_id);
           if(!empty($unit_id)) {
                
                /*$data['bill_ids'] = $this->bms_fin_receipt_model->getOutstandingBillIds($unit_id);
                if(!empty($data['bill_ids']['bill_ids'])) {*/
                    
                $data['bill_items'] = $this->bms_fin_receipt_model->getOutstandingBillItems($unit_id);
                /*if(!empty($data['bill_items'])) {
                    
                    foreach ($data['bill_items'] as $key=>$val) {
                        if(!empty($val['item_sub_cat_id'])){
                            $data['bill_items'][$key]['sub_cat_dd'] = $this->bms_fin_masters_model->getSubCategory ($val['item_cat_id']);    
                        } else {
                            $data['bill_items'][$key]['sub_cat_dd'] = array();
                        }                        
                    }
                    //echo "<pre>";print_r($data['bill_items']); echo "</pre>";
                    //$this->load->view('finance/receipt/outstanding_items_view',$data);                       
                } */         
                                
                //}            
            }
            $this->load->view('finance/receipt/outstanding_items_view',$data);
       } else {
            echo 'This Unit has Unapplied Amount!-'.$open_credit['receipt_id'];
       }
	}	
    
    function receipt_details ($receipt_id,$act_type = 'view') {
        $data['browser_title'] = 'Property Butler | Receipt Details';
        $data['page_header'] = '<i class="fa fa-file"></i> Receipt Details';   
        if(!empty($receipt_id)) {
            $data['receipt'] = $this->bms_fin_receipt_model->getReceiptDetails($receipt_id);
            if(!empty($data['receipt']['receipt_id'])) {
                $data['receipt_items'] = $this->bms_fin_receipt_model->getReceiptItemsDetail($data['receipt']['receipt_id']);                                
            }
            //echo "<pre>";print_r($data['receipt']);echo "</pre>";            
        }
        
        $data ['act_type'] = $act_type;
        $this->load->helper('number_to_word');
        if($act_type == 'download') {
            
            $this->load->library('M_pdf');
            
            $html = $this->load->view('finance/receipt/receipt_details_print_view',$data,true);
            
            $this->m_pdf->pdf->WriteHTML($html);
            $this->m_pdf->pdf->Output($data['receipt']['receipt_no'].'.pdf', 'D');
        } else if($act_type == 'print') {
            $this->load->view('finance/receipt/receipt_details_print_view',$data);
        } else {
            $this->load->view('finance/receipt/receipt_details_view',$data);
        }
    } 
    
    
    function unset_receipt_item () {
        $receipt_item_id = $this->input->post('receipt_item_id');
        
        $item = $this->bms_fin_receipt_model->getReceiptItem ($receipt_item_id);
        if(!empty($item) && $item['bill_item_id'] != '0') {
            $bill_item = $this->bms_fin_receipt_model->getBillItem ($item['bill_item_id']);
            if(!empty($bill_item)) {
                $bill_item['bal_amount'] = $bill_item['bal_amount'] + $item['paid_amount'];
                $bill_item['paid_amount'] = $bill_item['paid_amount'] - $item['paid_amount'];
                $bill_item['paid_status'] = 0;
                $this->bms_fin_receipt_model->setBillItem ($item['bill_item_id'],$bill_item);
                $this->bms_fin_receipt_model->setBillAsUnPaid ($bill_item['bill_id']);
            }
        }
        
        echo $this->bms_fin_receipt_model->deleteReceiptItem ($receipt_item_id); 
    }
    
    function unset_receipt () {
        $receipt_id = $this->input->post('receipt_id');
        
        $items = $this->bms_fin_receipt_model->getReceiptItems ($receipt_id);
        
        if(!empty($items)) {
            foreach ($items as $key=>$val) {
                $bill_item = $this->bms_fin_receipt_model->getBillItem ($val['bill_item_id']);
                if(!empty($bill_item)) {
                    $bill_item['bal_amount'] = $bill_item['bal_amount'] + $val['paid_amount'];
                    $bill_item['paid_amount'] = $bill_item['paid_amount'] - $val['paid_amount'];
                    $bill_item['paid_status'] = 0;
                    $this->bms_fin_receipt_model->setBillItem ($val['bill_item_id'],$bill_item);
                    $this->bms_fin_receipt_model->setBillAsUnPaid ($bill_item['bill_id']);
                }
            }
        }
        
        $this->bms_fin_receipt_model->deleteReceiptItemByReceiptId ($receipt_id); 
        echo $this->bms_fin_receipt_model->deleteReceipt ($receipt_id);
    }
    
    
    function receipt_summary () {
        $data['browser_title'] = 'Property Butler | Summary Of Receipt';
        $data['page_header'] = '<i class="fa fa-file"></i> Summary Of Receipt';
        
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        
        $data ['property_id'] = !empty($data['bill']['property_id']) ? $data['bill']['property_id'] : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        
        
        //$data['units'] = $this->bms_masters_model->getUnit ($data ['property_id'],0);
        if(!empty($_GET['property_id']) && !empty($_GET['from']) && !empty($_GET['to'])) {
            //echo "query error!"; exit;
            $from = date('Y-m-d',strtotime(trim($_GET['from'])));
            $to = date('Y-m-d',strtotime(trim($_GET['to']))); 
            
            $property_name = '';
            foreach ($data['properties'] as $key=>$val) {
                if($val['property_id'] == $_GET['property_id'] ) {
                    $property_name = $val['property_name'];
                }
            }
            
            $data['receipts'] = $this->bms_fin_receipt_model->getReceiptForSummary($_GET['property_id'],$from,$to);
            //echo "<pre>";print_r($data['receipts']);echo "</pre>";exit;
            require_once APPPATH.'/third_party/PHPExcel.php';
            require_once APPPATH.'/third_party/PHPExcel/IOFactory.php';
            
            // Create new PHPExcel object
            $objPHPExcel = new PHPExcel();
            
            // Create a first sheet, representing sales data
            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true)->setSize(16);
            $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true)->setSize(14);
            //$objPHPExcel->getStyle('A1:A2')->getFont()->setBold(true)->setSize(14);

            $objPHPExcel->getActiveSheet()->setCellValue('A1', $property_name );
            $objPHPExcel->getActiveSheet()->setCellValue('A2', 'Receipts: '.$_GET['from'] .' - '.$_GET['to']);
            $objPHPExcel->getActiveSheet()->setCellValue('A3', 'Dated: '.date('d-m-Y h:i a'));
            $objPHPExcel->getActiveSheet()->setCellValue('A4', 'All currencies are in RM');
            
            $sheet_head = array('Receipt No',
                                    'Date',
                                    'Unit No',
                                    'Received From',
                                    'Amount Received',
                                    'Credit Used',
                                    'Issued By',
                                    'Payment Mode',
                                    'Bank',
                                    'Card Type',
                                    'Cheque/Txn Ref No',
                                    'Cheque/Txn Date',
                                    'Notes',
                                    'Debit A/c');
            $objPHPExcel->getActiveSheet()->getStyle('A5:N5')->getFont()->setBold(true)->setSize(12);
            $objPHPExcel->getActiveSheet()->fromArray($sheet_head, NULL, 'A5');
            if(!empty($data['receipts'])) {
                $objPHPExcel->getActiveSheet()->fromArray($data['receipts'], NULL, 'A6');
                $rows_cnt = count($data['receipts']);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.(6+$rows_cnt), 'Total' );
                $objPHPExcel->getActiveSheet()->setCellValue('E'.(6+$rows_cnt),'=SUM(E6:E'.(5+$rows_cnt).')');
                $objPHPExcel->getActiveSheet()->getStyle('D'.(6+$rows_cnt).':E'.(6+$rows_cnt))->getFont()->setBold(true)->setSize(12);
                //$objPHPExcel->getActiveSheet()->
                // ->setCellValue('F18', '=SUM(B2:C12)');
               	
                //$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
                $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
            } else {
                $objPHPExcel->getActiveSheet()->setCellValue('A6', 'No Data Found!' );
                $objPHPExcel->getActiveSheet()->mergeCells('A6:N6');
            }
    
            // Rename sheet
            $objPHPExcel->getActiveSheet()->setTitle('Receipts');
            
            //$data['receipt_items'] = $this->bms_fin_receipt_model->getReceiptItemsForSummary($from,$to);
                
            // Create a new worksheet, after the default sheet
            $objPHPExcel->createSheet();
            
            // Add some data to the second sheet, resembling some different data types
            $objPHPExcel->setActiveSheetIndex(1);
            $objPHPExcel->getActiveSheet()->setCellValue('A1', 'More data');
            
            // Rename 2nd sheet
            $objPHPExcel->getActiveSheet()->setTitle('Receipt Items');
            
            $objPHPExcel->setActiveSheetIndex(0);
            
            // Redirect output to a client’s web browser (Excel5)
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="ReceiptList_'.$property_name.$_GET['from'] .' - '.$_GET['to'].'_'.date('Ymd').'.xls"');
            header('Cache-Control: max-age=0');
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            
            //strtotime("+1 month", strtotime($val['agm_last_date'])))
            // get brought forward
            /*$data['bf_debit'] = $this->bms_fin_bills_model->get_bf_debit ($_GET['unit_id'],$from);
            if(empty($data['bf_debit']['amount']))
                $data['bf_debit']['amount'] = 0;
            
            $data['bf_credit'] = $this->bms_fin_bills_model->get_bf_credit ($_GET['unit_id'],$from);
            if(empty($data['bf_credit']['amount']))
                $data['bf_credit']['amount'] = 0;
                
            $data['soa'] = $this->bms_fin_bills_model->get_soa ($_GET['unit_id'],$from,$to);*/
            //echo "<pre>";print_r($data['bf_debit']);echo "</pre>";
        }
        $this->load->view ('finance/receipt/receipt_summary_view',$data);
    }
	
}