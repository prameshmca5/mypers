<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bms_fin_bills extends CI_Controller {
   
    function __construct () { 
        parent::__construct ();
        if(!isset($_SESSION['bms']['is_logged_in']) || $_SESSION['bms']['is_logged_in'] == false || $_SESSION['bms']['user_type'] != 'staff') {
	       redirect('index.php/bms_index/login?return_url='.($_SERVER['SERVER_NAME'] == 'www.tpaccbms.com' ? 'https://www.tpaccbms.com' : 'http://127.0.0.1').$_SERVER['REQUEST_URI']);       
	    }
        //$this->user_access_log->user_access_log_insert(); // create user access log
        // load necessary models
        
        $this->load->model('bms_masters_model');  
        $this->load->model('bms_fin_masters_model'); 
        $this->load->model('bms_fin_bills_model');
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

   
	public function manual_bill_list ($offset = 0, $per_page = 25) {
		//echo "fdfd";exit;
		// $this->load->model('vendors_model');
        //echo "<pre>";print_r($_SESSION);echo "</pre>";
		$data['browser_title'] = 'Property Butler | Sales Invoice';
        $data['page_header'] = '<i class="fa fa-file"></i> Sales Invoice';
        
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        $data['property_id'] = isset($_GET['property_id']) && trim($_GET['property_id']) != '' ? trim($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        
        $data['units'] = $this->bms_masters_model->getUnit ($data ['property_id'],0);
        
        $data['offset'] = $offset;
        $data['per_page'] = $per_page;
        
        $this->load->view('finance/manual_bill/manual_bill_list_view',$data);
	}  
    
    function get_bills_list () {
        header('Content-type: application/json');        
        
        $bills = array('numFound'=>0,'records'=>array());
        if (isset($_POST['offset']) && is_numeric($_POST['offset']) && $_POST['offset'] >= 0 && isset($_POST['rows']) && is_numeric($_POST['rows']) && $_POST['rows'] >= 0 && $_POST['rows'] <= 100 && isset($_POST['property_id']) && $_POST['property_id'] != '') {
            $unit_id = $this->input->post('unit_id');
            $from = $this->input->post('from');
            $to = $this->input->post('to');
            $from = !empty($from) ? date('Y-m-d',strtotime($from)) : '';
            $to = !empty($to) ? date('Y-m-d',strtotime($to)) : ''; 
            $bills = $this->bms_fin_bills_model->getBillsList ($_POST['offset'], $_POST['rows'], $this->input->post('property_id'), $unit_id,$from,$to);
        }       
        echo json_encode($bills);
    } 
    
    
	public function add_manual_bill($bill_id = ''){
		//echo "fdfd";exit;
		// $this->load->model('vendors_model');
        //echo "<pre>";print_r($_SESSION);echo "</pre>";
		$data['browser_title'] = 'Property Butler | Sales Invoice';
        $data['page_header'] = '<i class="fa fa-search-plus"></i> Sales Invoice <i class="fa fa-angle-double-right"></i> '.($bill_id != '' ? 'Update' : 'New').' Sales Invoice';
        
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        
        if(!empty($bill_id)) {
            $data['bill'] = $this->bms_fin_bills_model->getBill($bill_id);
            if(!empty($data['bill']['bill_id'])) {
                $data['blocks'] = $this->bms_masters_model->getBlocks ($data['bill']['property_id']); 
                $data['units'] = $this->bms_masters_model->getUnit ($data['bill']['property_id'],$data['bill']['block_id']);   
                $data['bill_items'] = $this->bms_fin_bills_model->getBillItems($data['bill']['bill_id']);
                /*if(!empty($data['bill_items'])) {
                    foreach ($data['bill_items'] as $key=>$val) {
                        if(!empty($val['item_sub_cat_id'])){
                            $data['bill_items'][$key]['sub_cat_dd'] = $this->bms_fin_masters_model->getSubCategory ($val['item_cat_id']);    
                        } else {
                            $data['bill_items'][$key]['sub_cat_dd'] = array();
                        }                        
                    }                       
                } */               
            }            
        }
        $data ['property_id'] = !empty($data['bill']['property_id']) ? $data['bill']['property_id'] : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
               
        $data['sales_items'] = $this->bms_fin_masters_model->getSalesItemsForBill ($data ['property_id']);        
        //echo "<pre>";print_r($data['bill_items']);echo "</pre>";
        //$property_id = isset($_GET['property_id']) && trim($_GET['property_id']) != '' ? trim ($_GET['property_id']) : '';        
        $this->load->view('finance/manual_bill/manual_bill_add_view',$data);
	}
    
    function manual_bill_submit () {
        //echo "<pre>";print_r($_POST);echo "</pre>"; exit;
        
        $bill = $this->input->post('bill');
        $items = $this->input->post('items');
        $type = 'add';
        if(!empty($bill['bill_date'])) {
            $bill['bill_date'] = date('Y-m-d',strtotime($bill['bill_date']));
        }
        if(!empty($bill['bill_due_date'])) {
            $bill['bill_due_date'] = date('Y-m-d',strtotime($bill['bill_due_date']));
        }      
        
        
        if(!empty($bill['bill_id'])) {
            $type = 'edit';
            $bill_id = $bill['bill_id'];
            $this->bms_fin_bills_model->updateBill ($bill,$bill['bill_id']);
        } else {
            if(isset($bill['bill_id'])) unset($bill['bill_id']);
            $bill_date = !empty($bill['bill_date']) ? $bill['bill_date'] : date('d-m-Y');
            $prop_abbrev = $this->input->post('prop_abbr');
            $bill_no_format = ($prop_abbrev != '' ? $prop_abbrev : 'XX'). '/SI/'.date('y/m',strtotime($bill_date)).'/';
            $last_bill_no = $this->bms_fin_bills_model->getLastBillNo ($bill_no_format);
            if(!empty ($last_bill_no)) {
                $last_no = explode('/',$last_bill_no['bill_no']);
                $bill['bill_no'] = $bill_no_format . (end($last_no) +1);
            } else {
                $bill['bill_no'] = $bill_no_format . 1001;
            }
            $bill['bill_time'] = date('H:i:s');
            $bill_id = $this->bms_fin_bills_model->insertBill ($bill);
        }
        
        if(!empty($items['item_cat_id'])) {
            $item['bill_id'] = $bill_id;
            foreach ($items['item_cat_id'] as $key=>$val) {
                if(!empty($val)) {
                    $item['item_cat_id'] = $val;
                    //$item['item_sub_cat_id'] = $items['item_sub_cat_id'][$key] != 'None' ? $items['item_sub_cat_id'][$key]: ''; 
                    $item['item_descrip'] = $items['item_descrip'][$key];
                    $item['item_period'] = $items['item_period'][$key];
                    $item['item_amount'] = $items['item_amount'][$key];
                    $item['bal_amount'] = $items['item_amount'][$key];
                    $item['paid_amount'] = 0; 
                    
                    if(!empty($items['bill_item_id'][$key])) {
                        $this->bms_fin_bills_model->updateBillItem ($item,$items['bill_item_id'][$key]);
                    } else {
                        $this->bms_fin_bills_model->insertBillItem ($item);    
                    }               
                }
                                
            }
        }
        $_SESSION['flash_msg'] = 'Bill '. ($type == 'edit' ? 'Edited' : 'Added') .' successfully!'; 
        redirect ('index.php/bms_fin_bills/manual_bill_details/'.$bill_id); //manual_bill_list/0/25?property_id='.$bill['property_id']
    }
    
    function auto_bill () {
        
        $property_id = 147;
        $per_share_value = 0.5594; 
        $prop_abbrev = 'WS';
        
        $units = $this->bms_fin_bills_model->getUnitsForQuitRent ($property_id);
        
        if(!empty($units)) {
            foreach($units as $key=>$val) {
                $bill_no_format = ($prop_abbrev != '' ? $prop_abbrev : 'XX'). '/SI/'.date('y').'/'.date('m').'/';
                $last_bill_no = $this->bms_fin_bills_model->getLastBillNo ($bill_no_format);
                if(!empty ($last_bill_no)) {
                    $last_no = explode('/',$last_bill_no['bill_no']);
                    $bill['bill_no'] = $bill_no_format . (end($last_no) +1);
                } else {
                    $bill['bill_no'] = $bill_no_format . 1001;
                }
                $bill['property_id'] = $property_id;
                $bill['block_id'] = $val['block_id'];
                $bill['unit_id'] = $val['unit_id'];
                $bill['bill_date'] = '2019-02-01';
                $bill['bill_due_date'] = '2019-02-15';
                $bill['remarks'] = 'QUIT RENT 2019';
                $bill['created_by'] = '1273';
                $bill['created_date'] = '2019-02-08';
                $bill['total_amount'] = $item['item_amount'] = number_format(($val['share_unit']*$per_share_value), 2, '.', '');
                $item['bill_id'] = $this->bms_fin_bills_model->insertBill ($bill);
                $item['item_cat_id'] = 22;
                //$item['item_sub_cat_id'] = ''; 
                $item['item_descrip'] = 'QUIT RENT (2019)';
                $item['item_period'] = '2019';
                $this->bms_fin_bills_model->insertBillItem ($item);     
                //number_format($number, 2, '.', '');
            }
        }
    }
    
    public function manual_bill_details ($bill_id,$act_type = 'view'){
		
		
		$data['browser_title'] = 'Property Butler | Sales Invoice ';
        $data['page_header'] = '<i class="fa fa-search-plus"></i> Sales Invoice  Details';
        
        if(!empty($bill_id)) {
            $data['manual_bill'] = $this->bms_fin_bills_model->getBillDetails($bill_id);
            if(!empty($data['manual_bill']['bill_id'])) {
                $data['manual_bill_items'] = $this->bms_fin_bills_model->getBillItemsDetail($data['manual_bill']['bill_id']);
            }            
        }
        //echo "<pre>";print_r($data['manual_bill_items']);echo "</pre>";
        $data ['act_type'] = $act_type;
        $this->load->helper('number_to_word');
        if($act_type == 'download') {
            
            $this->load->library('M_pdf');
            
            $html = $this->load->view('finance/manual_bill/manual_bill_details_print_view',$data,true);
            
            $this->m_pdf->pdf->WriteHTML($html);
            $this->m_pdf->pdf->Output($data['manual_bill']['bill_no'].'.pdf', 'D');
        } else if($act_type == 'print') {
            $this->load->view('finance/manual_bill/manual_bill_details_print_view',$data);
        } else {
            $this->load->view('finance/manual_bill/manual_bill_details_view',$data);
        }
	}
    
    function unset_bill_item () {
        $bill_item_id = $this->input->post('bill_item_id');
        echo $this->bms_fin_bills_model->deleteBillItem ($bill_item_id); 
    }
    
    function unset_bill () {
        $bill_id = $this->input->post('bill_id');
        $this->bms_fin_bills_model->deleteBillItemByBillId ($bill_id); 
        echo $this->bms_fin_bills_model->deleteBill ($bill_id);
    }
    
    function get_period () {
        $period_format = $this->input->post('period_format');
        echo get_period_dd($period_format);
    }
    
    /*function auto_genarated_bills () {
        echo "In progress";
            
    } 
    
    function meter_reading_list () {
        
    }
    
    function meter_reading_add () {
        
    }*/
    
    function soa () {
        
        $data['browser_title'] = 'Property Butler | Statement Of Account';
        $data['page_header'] = '<i class="fa fa-file"></i> Statement Of Account';
        
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        
        $data ['property_id'] = !empty($data['bill']['property_id']) ? $data['bill']['property_id'] : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        
        $data['units'] = $this->bms_masters_model->getUnit ($data ['property_id'],0);
        if(!empty($_GET['property_id']) && !empty($_GET['unit_id']) && !empty($_GET['from'])) {
            //echo "query error!"; exit;
            $from = date('Y-m-d',strtotime(trim($_GET['from'])));
            $to = !empty($_GET['to']) ? date('Y-m-d',strtotime(trim($_GET['to']))) : date('Y-m-d',strtotime('-1 day',strtotime("+1 month", strtotime($from)))); 
            //strtotime("+1 month", strtotime($val['agm_last_date'])))
            // get brought forward
            $data['bf_debit'] = $this->bms_fin_bills_model->get_bf_debit ($_GET['unit_id'],$from);
            if(empty($data['bf_debit']['amount']))
                $data['bf_debit']['amount'] = 0;
            
            $data['bf_credit'] = $this->bms_fin_bills_model->get_bf_credit ($_GET['unit_id'],$from);
            if(empty($data['bf_credit']['amount']))
                $data['bf_credit']['amount'] = 0;
                
            $data['soa'] = $this->bms_fin_bills_model->get_soa ($_GET['unit_id'],$from,$to);
            //echo "<pre>";print_r($data['bf_debit']);echo "</pre>";
        }
        $this->load->view ('finance/manual_bill/smt_of_acc_view',$data);
    }   
	
}