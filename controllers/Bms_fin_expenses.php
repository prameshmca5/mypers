<?php
//error_reporting(1);
defined('BASEPATH') OR exit('No direct script access allowed');
class Bms_fin_expenses extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['bms']['is_logged_in']) || $_SESSION['bms']['is_logged_in'] == false || $_SESSION['bms']['user_type'] != 'staff') {
            redirect('index.php/bms_index/login?return_url=' . ($_SERVER['SERVER_NAME'] == 'www.tpaccbms.com' ? 'https://www.tpaccbms.com' : 'http://127.0.0.1') . $_SERVER['REQUEST_URI']);
        }
        //$this->user_access_log->user_access_log_insert(); // create user access log
        // load necessary models
        $this->load->model('bms_masters_model');
        $this->load->model('bms_fin_masters_model');
        $this->load->model('bms_fin_expenses_model');
        
    }
    public function expenses_list($offset = 0, $per_page = 25) {
        $data['browser_title'] = 'Property Butler | Expense Invoice';
        $data['page_header']   = '<i class="fa fa-file"></i> Expense Invoice';
        $data['properties']  = $this->bms_masters_model->getMyProperties();
        $data['property_id'] = isset($_GET['property_id']) ? trim ($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : '');
    
        if(!empty($data['property_id'])) {
            $data['service_provider'] = $this->bms_fin_expenses_model->getServiceProvider($data['property_id']);
            $data['property_assets'] = $this->bms_fin_expenses_model->getPropertyAssets($data['property_id']);
            $data['expense_items'] = $this->bms_fin_masters_model->getExpenseItems ($_SESSION['bms_default_property']);
        }

        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        $data['property_id'] = isset($_GET['property_id']) && trim($_GET['property_id']) != '' ? trim($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));

        $data['offset'] = $offset;
        $data['per_page'] = $per_page;

        $this->load->view('finance/expenses/expenses_list_view', $data); //bms_purchase_add
    }

    public function add_expenses($ex_order_id = '') {

        $data['browser_title'] = 'Property Butler | Expense Invoice';
        $data['page_header']   = '<i class="fa fa-file"></i> Expense Invoice';
        $data['properties']  = $this->bms_masters_model->getMyProperties();
        $data['property_id'] = isset($_GET['property_id']) ? trim ($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : '');
        if(!empty($data['property_id'])) {
            $data['service_provider'] = $this->bms_fin_expenses_model->getServiceProvider($data['property_id']);
            $data['property_assets'] = $this->bms_fin_expenses_model->getPropertyAssets($data['property_id']);
            $data['expense_items'] = $this->bms_fin_masters_model->getExpenseItems ($_SESSION['bms_default_property']);
         }
         
         if(!empty($ex_order_id)) {
            $data['poitem'] = $this->bms_fin_expenses_model->getPurchaseOrder($ex_order_id);
            $data['ponumb'] = $this->bms_fin_expenses_model->getPONumberdetails($data['poitem']['service_provider_id']);
 
            if(!empty($data['poitem']['exp_inv_id'])) {
                   $data['po_sub_items'] = $this->bms_fin_expenses_model->getPurchaseOrderDetails($data['poitem']['exp_inv_id']);
                   
                   if(!empty($data['po_sub_items'])) {
                       foreach ($data['po_sub_items'] as $key=>$val) {
                           if(!empty($val['sub_cat_id'])){
                               $data['po_sub_items'][$key]['sub_cat_dd'] = $this->bms_fin_masters_model->getSubCategory($val['cat_id']);;
                           } else {
                               $data['po_sub_items'][$key]['sub_cat_dd'] = array();
                           }
                       }
                   }
             }
			 $data['pursubitem'] = $this->bms_fin_expenses_model->getPurchaseOrderitems($data['poitem']['exp_inv_id']);
			/*
			if($data['poitem']['po_id']>0){
				$data['pursubitem'] = $this->bms_fin_expenses_model->getPurchaseOrderitems($data['poitem']['po_id']);
			}else {
                $data['pursubitem'] = $data['po_sub_items'];
            }
			*/
         }
		 
		 
        $this->load->view('finance/expenses/expenses_add_view', $data);
    }
	
	 public function expenses_popup($ex_order_id = '', $act_type='') {

        $data['browser_title'] = 'Property Butler | Expense Orders';
        $data['page_header']   = '<i class="fa fa-file"></i> Invoice';
        $data['properties']  = $this->bms_masters_model->getMyProperties();
        $data['property_id'] = isset($_GET['property_id']) ? trim ($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : '');
        if(!empty($data['property_id'])) {
            $data['service_provider'] = $this->bms_fin_expenses_model->getServiceProvider($data['property_id']);
            $data['property_assets'] = $this->bms_fin_expenses_model->getPropertyAssets($data['property_id']);
            $data['expense_items'] = $this->bms_fin_masters_model->getExpenseItems ($_SESSION['bms_default_property']);
         }
         
         if(!empty($ex_order_id)) {
            $data['poitem'] = $this->bms_fin_expenses_model->getPurchaseOrder($ex_order_id);
            $data['ponumb'] = $this->bms_fin_expenses_model->getPONumberdetails($data['poitem']['service_provider_id']);
 
            if(!empty($data['poitem']['exp_inv_id'])) {
                   $data['po_sub_items'] = $this->bms_fin_expenses_model->getPurchaseOrderitems($data['poitem']['exp_inv_id']);
                   
                   if(!empty($data['po_sub_items'])) {
                       foreach ($data['po_sub_items'] as $key=>$val) {
                           if(!empty($val['sub_cat_id'])){
                               $data['po_sub_items'][$key]['sub_cat_dd'] = $this->bms_fin_masters_model->getSubCategory($val['cat_id']);;
                           } else {
                               $data['po_sub_items'][$key]['sub_cat_dd'] = array();
                           }
                       }
                   }
             }
			 
			 
			// $data['pursubitem'] = $this->bms_fin_expenses_model->getPurchaseOrderitems($data['poitem']['exp_inv_id']);
			 
         }
		 
			foreach ($data['properties'] as $key=>$val){
                if($val['property_id']==$data['poitem']['property_id']){
                    $data['pro_name'] = $val['property_name'];
                }
            }
			
		$data ['act_type'] = $act_type;
        if($act_type == 'download') {
            $this->load->library('M_pdf');
            $html = $this->load->view('finance/expenses/expenses_popup_view_pdf',$data,true);
            $res = $this->m_pdf->pdf->WriteHTML($html);
            $this->m_pdf->pdf->Output($data['pv_item']['pay_no'].'.pdf', 'D');
        } else if($act_type == 'print') {
            $this->load->view('finance/expenses/expenses_popup_view_print',$data);
        }else {
		    $this->load->view('finance/expenses/expenses_popup_view', $data); //bms_purchase_add
		}
		 
        //$this->load->view('finance/expenses/expenses_popup_view', $data);
    }


    function get_expenses_list () {
        header('Content-type: application/json');
        $poorder = array();

        if (isset($_POST['offset']) && is_numeric($_POST['offset']) && $_POST['offset'] >= 0 && isset($_POST['rows']) && is_numeric($_POST['rows']) && $_POST['rows'] >= 0 && $_POST['rows'] <= 100 && isset($_POST['property_id']) && $_POST['property_id'] != '') {
            $search_txt = $this->input->post('search_txt');
            $search_txt = $search_txt ? strtolower($search_txt) : $search_txt;
            $poorder = $this->bms_fin_expenses_model->getexpenseList ($_POST['offset'], $_POST['rows'], $this->input->post('property_id'), $search_txt);
        }
        echo json_encode($poorder);
    }


    function expenses_ins_upd($inv_id, $invoice_num){
        $invdate = $this->input->post('po_date');
        if(!empty($invdate)) {
            $invdate = date('Y-m-d',strtotime($invdate));
        }
        $data = array(
            'property_id' => $this->input->post('po_id'),
            'exp_doc_no' =>  $invoice_num,
            'exp_inv_no' => $this->input->post('vendor_inv_no'),
            'service_provider_id' => $this->input->post('service_provider'),
            'exp_date' => $invdate,
            'subtotal' => $this->input->post('rstsubtot'),
            'remarks' => $this->input->post('remarks'),
            'discounts' => $this->input->post('maindiscount'),
            'nettotal' => $this->input->post('mainntat'),
            'tax_percent' => $this->input->post('taxpers'),
            'tax_amt' => $this->input->post('taxamt'),
            'total' => $this->input->post('maintotat')
        );

        if(!empty($inv_id)) {
           // $type = "edit";
            $this->bms_fin_expenses_model->updateExpenceOrder($data,$inv_id);
            $insert_id = $inv_id;
        }else {
            //$type = "add";
            $insert_id = $this->bms_fin_expenses_model->insertExpenseOrder($data);
        }
        return $insert_id;
    }

    function getInvoiceId($inv_id, $invoice_num){
        $prop_abbrev = $this->input->post('prop_abbr');
        if($inv_id==''){
            $pur_no_format = ($prop_abbrev != '' ? $prop_abbrev : 'XX'). '/EI/'.date('y').'/'.date('m').'/';
            $last_iv_no = $this->bms_fin_expenses_model->getLastInvoiceNo ($pur_no_format);
           
            if(!empty ($last_iv_no)) {
                $t_arr = explode('/',$last_iv_no['exp_doc_no']); 
                $inv_no = $pur_no_format . (end($t_arr) +1);
            } else {
                $inv_no = $pur_no_format . 1001;
            }
        } else {
            $inv_no = $invoice_num;
        }
        return $inv_no;
    }


    function add_expenses_order () {

       //echo "<pre>";print_r($_POST); echo "</pre>";

        //exit;

        $po_select_po_no = $this->input->post('po_select_po_no');
        $type = "add";
        if($po_select_po_no) {

            $invoice_num = $this->getInvoiceId("", "");
            $getentryamt = $this->input->post('grandtotal');
            $balance = $this->input->post('balanceamt');

            $totalpaid = ($getentryamt - $balance);
            $data = array();

            $data['invoice_create_status'] = 1;
           // if($balance=='0'){
           //    $data['invoice_create_status'] = 1;
           // }
                $data['invoice_paid_amount'] = $totalpaid;
                $data['invoice_pending_amount'] = $balance;
            
           
            $inv_id = $this->input->post('po_select_pur_order_id');
            $this->bms_fin_expenses_model->updateInvoiceAmount($data,$inv_id);

            $invdate = $this->input->post('po_date');
            if(!empty($invdate)) {
                $invdate = date('Y-m-d',strtotime($invdate));
            }

            $data = array(
                'property_id' => $this->input->post('po_id'),
                'exp_doc_no' =>  $invoice_num,
                'exp_inv_no' => $this->input->post('vendor_inv_no'),
                'service_provider_id' => $this->input->post('service_provider'),
                'exp_date' => $invdate,
                'po_id' => $this->input->post('po_number'),
                'remarks' => $this->input->post('remarks'),
                'total' => $this->input->post('curtot')
            );

            
                if(!empty($poitem['expInvId'])) {
                   // echo "insideeee";
                    $type = "edit";
                    $this->bms_fin_expenses_model->updateExpenceOrder($data,$poitem['exp_inv_id']);
                    $insert_id = $poitem['exp_inv_id'];
                }else {
                    $insert_id = $this->bms_fin_expenses_model->insertExpenseOrder($data);
                }

        }else {
                $poitem = $this->input->post('poitem');
                $inv_id = $poitem['expInvId'];
                $invoice_num = $poitem['exp_doc_no'];
                $invoice_num = $this->getInvoiceId($inv_id, $invoice_num);
                $insert_id = $this->expenses_ins_upd($inv_id, $invoice_num);
                $exp_items = $this->input->post('items');

                foreach ($exp_items['description'] as $key=>$val) {

                    $item['description'] = $exp_items['description'][$key];
                    $item['exp_id'] = $insert_id;
                    $item['asset_id'] = (!empty($exp_items['assetlst'][$key])?$exp_items['assetlst'][$key]:0);
                    $item['cat_id'] = $exp_items['category'][$key];
                   // $item['sub_cat_id'] = $exp_items['subcategory'][$key];
                    $item['qty'] = $exp_items['quantity'][$key];
                    $item['uom'] = $exp_items['uom'][$key];
                    $item['unit_price'] = $exp_items['subunitprice'][$key];
                    $item['amount'] = $exp_items['amount'][$key];
                    $item['discount_amt'] = $exp_items['distamount'][$key];
                    $item['net_amount'] = $exp_items['netamount'][$key];
                    $exp_item_id = $exp_items['exp_item_id'][$key];
				
	 
					if($exp_item_id>0) {
                        //echo "inside record for UPDATE===><br><br><br>";
                        $type = "edit";
                        $this->bms_fin_expenses_model->updateExpenceOrderItem($item,$exp_item_id);
                    } else {
                        //echo "inside record for INSERT ===> <br><br><br>";
                        $this->bms_fin_expenses_model->insertExpenceOrderItem($item);
                    }
				 
                }
            }

        $_SESSION['flash_msg'] = 'Invoice Order '. ($type == 'edit' ? 'Edited' : 'Added') .' successfully!';
        redirect ('index.php/bms_fin_expenses/expenses_list');
    }

    function unset_expense () {
        $exp_id = $this->input->post('exp_id');
        $this->bms_fin_expenses_model->deleteExpenseItem($exp_id);
        echo $this->bms_fin_expenses_model->deleteExpenses($exp_id);
    }

    function delete_expenses_item () {
        $exp_item_id = $this->input->post('sub_exp_id');
        $this->bms_fin_expenses_model->deleteExpenseSubItem($exp_item_id);
    }


    public function getPurchaseOrderNumber(){
        header('Content-type: application/json');
        $category_id = trim($this->input->post('servprov_id'));
        $subcategory = array();
        if($category_id) {
            $subcategory = $this->bms_fin_expenses_model->getPONumber($category_id);
        }
        echo json_encode($subcategory);
    }

    public function getExpensesOrderDetails(){
        header('Content-type: application/json');
        $po_id = trim($this->input->post('po_id'));
        $purdetails = array();
        if($po_id) {
            $purdetails = $this->bms_fin_expenses_model->getPurchaseOrderBasedPOdetails($po_id);
        }
         echo json_encode($purdetails);
    }

    public function getSubCategoryList(){
        header('Content-type: application/json');
        $category_id = trim($this->input->post('category_id'));
        $subcategory = array();
        if($category_id) {
            $subcategory = $this->bms_fin_masters_model->getSubCategory($category_id);
        }
        echo json_encode($subcategory);
    }

}