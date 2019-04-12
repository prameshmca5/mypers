<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bms_fin_payment extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['bms']['is_logged_in']) || $_SESSION['bms']['is_logged_in'] == false || $_SESSION['bms']['user_type'] != 'staff') {
            redirect('index.php/bms_index/login?return_url=' . ($_SERVER['SERVER_NAME'] == 'www.tpaccbms.com' ? 'https://www.tpaccbms.com' : 'http://127.0.0.1') . $_SERVER['REQUEST_URI']);
        }
        //$this->user_access_log->user_access_log_insert(); // create user access log
        // load necessary models
        $this->load->model('bms_purchase_model');
        $this->load->model('bms_masters_model');
        $this->load->model('bms_fin_masters_model');
        $this->load->model('bms_fin_payment_model');
        
    }

    public function payment_list($offset = 0, $per_page = 25) {
        
        $data['browser_title'] = 'Property Butler | payment';
        $data['page_header']   = '<i class="fa fa-file"></i> Payment';
        $data['properties']  = $this->bms_masters_model->getMyProperties();
        $data['property_id'] = isset($_GET['property_id']) ? trim ($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : '');
    
        if(!empty($data['property_id'])) {
            $data['service_provider'] = $this->bms_fin_payment_model->getServiceProvider($data['property_id']);
            $data['property_assets'] = $this->bms_fin_payment_model->getPropertyAssets($data['property_id']);
            $data['expense_items'] = $this->bms_fin_masters_model->getExpenseItems ($_SESSION['bms_default_property']);
        }
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        $data['property_id'] = isset($_GET['property_id']) && trim($_GET['property_id']) != '' ? trim($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        $data['offset'] = $offset;
        $data['per_page'] = $per_page;


        $this->load->view('finance/payment/payment_list_view', $data); //bms_purchase_add
    }

    public function add_payment($pv_order_id = '') {
        $data['browser_title'] = 'Property Butler | Payment Orders';
        $data['page_header']   = '<i class="fa fa-file"></i> Payment';
        $data['properties']  = $this->bms_masters_model->getMyProperties();
        $data['property_id'] = isset($_GET['property_id']) ? trim ($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : '');
        if(!empty($data['property_id'])) {
            $data['service_provider'] = $this->bms_fin_payment_model->getServiceProvider($data['property_id']);
            $data['property_assets'] = $this->bms_fin_payment_model->getPropertyAssets($data['property_id']);
            $data['expense_items'] = $this->bms_fin_masters_model->getExpenseItems ($_SESSION['bms_default_property']);
        }
        
		if(!empty($pv_order_id)) {
            $data['pv_item'] = $this->bms_fin_payment_model->getPaymentOrder($pv_order_id);
            $data['invnum'] = $this->bms_fin_payment_model->getExpNumber($data['pv_item']['pay_service_provider_id']);
            if(!empty($data['pv_item']['pay_id'])) {
                   $data['pv_sub_items'] = $this->bms_fin_payment_model->getPVOrderDetails($data['pv_item']['pay_id']);
                   if(!empty($data['pv_sub_items'])) {
                       foreach ($data['pv_sub_items'] as $key=>$val) {
                           if(!empty($val['pay_sub_cat_id'])){
                                $data['pv_sub_items'][$key]['sub_cat_dd'] = $this->bms_fin_masters_model->getSubCategory($val['pay_cat_id']);;
                           } else {
                                $data['pv_sub_items'][$key]['sub_cat_dd'] = array();
                           }
                       }
                   }
            }

            $payinvid = $data['pv_item']['pay_inv_id'];
            if(!empty($payinvid)){
                $purdetails = array(); $purdetails1 = array(); $purdetails2 = array();
                    $getpoid = $this->bms_fin_payment_model->getpoidchecked($payinvid);
                    foreach ($getpoid as $pid => $pval){
                        if($pval['po_id']!=0){
                            $purdetails1 = $this->bms_fin_payment_model->getExpInvoiceDetailswithPOPrint($payinvid, $pv_order_id);
                        }else {
                            $purdetails2 = $this->bms_fin_payment_model->getExpInvoiceDetailswithoutPOPrint($payinvid, $pv_order_id);
                        }
                    }
                    $purdetails = array_merge($purdetails1,$purdetails2);
                    $exparr = array();
                    //foreach ($purdetails as $mid =>$mval){
                        $exparr = $this->bms_fin_payment_model->getInvoiceName($payinvid);
                    //}
                    $data['invnamedisp'] = $exparr;
                    $data['expsubitem'] = $purdetails;
            }

        }
        $this->load->view('finance/payment/payment_add_view', $data);
    }

    function get_payment_list () {
        header('Content-type: application/json');
        $poorder = array();

        if (isset($_POST['offset']) && is_numeric($_POST['offset']) && $_POST['offset'] >= 0 && isset($_POST['rows']) && is_numeric($_POST['rows']) && $_POST['rows'] >= 0 && $_POST['rows'] <= 100 && isset($_POST['property_id']) && $_POST['property_id'] != '') {
            $search_txt = $this->input->post('search_txt');
            $search_txt = $search_txt ? strtolower($search_txt) : $search_txt;
            $prop_id =  $this->input->post('property_id');
            $poorder = $this->bms_fin_payment_model->getPaymentList ($_POST['offset'], $_POST['rows'], $prop_id, $search_txt);
        }
        echo json_encode($poorder);
    }

    function payment_ins_upd($inv_id, $invoice_num){
         
        $pvdate = $this->input->post('pv_date');
		$paymt = $this->input->post('paymt');
		$pmdetails = $this->input->post('pm_details');
		$ser_pro = $this->input->post('service_provider');
		$onlinedate = $pmdetails['online_date'];
		$cheqdate = $pmdetails['cheq_date'];
        $pvitem = $this->input->post('pv_item');
        $paymt_id = $pvitem['pay_id'];
		if($ser_pro=="new"){
			$ser_pro = 0;
		}
        $pvdated = '0000-00-00';
        if(!empty($pvdate)) {
            $pvdated = date('Y-m-d',strtotime($pvdate));
        }
        $onlndate = '0000-00-00';
        if(!empty($onlinedate)) {
            $onlndate = date('Y-m-d',strtotime($onlinedate));
        }
        $chqdate = '0000-00-00';
        if(!empty($cheqdate)) {
            $chqdate = date('Y-m-d',strtotime($cheqdate));
        }
       // if(!empty($inv_id)){
       //     $payval = 0;
      //  }else {
            $payval = 1;
       // }
        $data = array(
            'pay_property_id' => $this->input->post('po_id'),
            'pay_no' =>  $invoice_num,
            'pay_service_provider_id' => $ser_pro,
            'pay_service_provider_name' => $this->input->post('provider_name'),
            'pay_service_provider_address' => $this->input->post('provider_address'),
            'pay_date' => $pvdated,
            'pay_subtotal' => $this->input->post('rstsubtot'),
            'pay_discounts' => $this->input->post('maindiscount'),
            'pay_nettotal' => $this->input->post('mainntat'),
            'remarks' => $this->input->post('remarks'),
            'pay_tax_percent' => $this->input->post('taxpers'),
            'pay_payment_status' => $payval,
            'pay_tax_amt' => $this->input->post('taxamt'),
            'pay_total' => $this->input->post('maintotat'),	
            'bank_id' => $paymt['bank_id'],
            'pay_mod' => $paymt['payment_mode'],
			/*		
			'pay_chq_bank_name' => $pmdetails['cheq_bank'],
			'pay_cheq_no' => $pmdetails['cheq_no'],
			'pay_cheq_date' => $chqdate,
			'pay_online_bank' => $pmdetails['online_bank'],
			'pay_online_txn_no' => $pmdetails['online_txn_no'],
			'pay_online_type' => $pmdetails['online_type'],
			'pay_online_date' => $onlndate, */
        );

        $pm_details = $this->input->post('pm_details');
        switch ($paymt['payment_mode']) {
            case 2: 
                $data['bank'] = !empty($pm_details['cheq_bank']) ? $pm_details['cheq_bank'] : '';
                $data['cheq_card_txn_no'] = !empty($pm_details['cheq_no']) ? $pm_details['cheq_no'] : '';
                $data['cheq_txn_online_date'] = !empty($pm_details['cheq_date']) ? date('Y-m-d',strtotime($pm_details['cheq_date'])) : '';
                break;
            case 3: 
                $data['bank'] = !empty($pm_details['card_bank']) ? $pm_details['card_bank'] : '';
                $data['cheq_card_txn_no'] = !empty($pm_details['card_txn_no']) ? $pm_details['card_txn_no'] : '';
                $data['online_r_card_type'] = !empty($pm_details['card_type']) ? $pm_details['card_type'] : '';
                break;
            case 4: 
                $data['bank'] = !empty($pm_details['online_bank']) ? $pm_details['online_bank'] : '';
                $data['cheq_card_txn_no'] = !empty($pm_details['online_txn_no']) ? $pm_details['online_txn_no'] : '';
                $data['online_r_card_type'] = !empty($pm_details['online_type']) ? $pm_details['online_type'] : '';
                $data['cheq_txn_online_date'] = !empty($pm_details['online_date']) ? date('Y-m-d',strtotime($pm_details['online_date'])) : '';
                break;
        }   
          
        if(!empty($paymt_id)) {
           // $type = "edit";
            $this->bms_fin_payment_model->updateExpenceOrder($data,$paymt_id);
            $insert_id = $paymt_id;
        }else {
            //$type = "add";
            $insert_id = $this->bms_fin_payment_model->insertExpenseOrder($data);
        }
        return $insert_id;
    }

    function getPaymentId($inv_id, $invoice_num){
        $prop_abbrev = $this->input->post('prop_abbr');
        if($inv_id==''){
           $pur_no_format = ($prop_abbrev != '' ? $prop_abbrev : 'XX'). '/PV/'.date('y').'/'.date('m').'/';
           $last_iv_no = $this->bms_fin_payment_model->getLastPaymentNo ($pur_no_format);
           if(!empty ($last_iv_no)) {
               $pay_no = $pur_no_format . (end(explode('/',$last_iv_no['pay_no'])) +1);
           } else {
               $pay_no = $pur_no_format . 1001;
           }
        }else{
            $pay_no = $invoice_num;
        }
        return $pay_no;
    }

    function view_receipt($pv_order_id = '', $act_type = 'view'){

        $data['browser_title'] = 'Property Butler | Payment Orders';
        $data['page_header']   = '<i class="fa fa-file"></i> Payment';
        $data['properties']  = $this->bms_masters_model->getMyProperties();
        $data['property_id'] = isset($_GET['property_id']) ? trim ($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : '');
        if(!empty($data['property_id'])) {
            $data['service_provider'] = $this->bms_fin_payment_model->getServiceProvider($data['property_id']);
            $data['property_assets'] = $this->bms_fin_payment_model->getPropertyAssets($data['property_id']);
            $data['expense_items'] = $this->bms_fin_masters_model->getExpenseItems ($_SESSION['bms_default_property']);
        }

        if(!empty($pv_order_id)) {

            $data['pv_item'] = $this->bms_fin_payment_model->getPaymentOrder($pv_order_id);
            //$data['pvitem'] = $this->bms_fin_payment_model->getPONumber($data['pv_item']['pay_service_provider_id']);
            if(!empty($data['pv_item']['pay_id'])) {
                $data['pv_sub_items'] = $this->bms_fin_payment_model->getPVOrderDetails($data['pv_item']['pay_id']);
                if(!empty($data['pv_sub_items'])) {
                    foreach ($data['pv_sub_items'] as $key=>$val) {
                        if(!empty($val['pay_sub_cat_id'])){
                            $data['pv_sub_items'][$key]['sub_cat_dd'] = $this->bms_fin_masters_model->getSubCategory($val['pay_cat_id']);;
                        } else {
                            $data['pv_sub_items'][$key]['sub_cat_dd'] = array();
                        }
                    }
                }
            }
        }
 
        // GET Property name
       // print_r($data['properties']);

        foreach ($data['properties'] as $key=>$val){
        	
           if($val['property_id']==$data['pv_item']['pay_property_id']){
            $data['pro_name'] = $val['property_name'];
           }
        }
        
 
        foreach($data['service_provider'] as $skey => $skval){
        	//echo $skval['service_provider_id']."<br>";
         	 if($skval['service_provider_id']==$data['pv_item']['pay_service_provider_id']){
            	$data['provid_name'] = $skval['provider_name'];
           	}
		}
		
		 
       /* // GEt Invoice details
        if($data['pv_item']['pay_inv_id']>0){
            $data['expsubitem'] = $this->bms_fin_payment_model->getPaymentBasedINVdetails($data['pv_item']['pay_inv_id']);
        }*/

        $payinvid = $data['pv_item']['pay_inv_id'];
        if(!empty($payinvid)){
            $purdetails = array(); $purdetails1 = array(); $purdetails2 = array();
            $getpoid = $this->bms_fin_payment_model->getpoidchecked($payinvid);
            foreach ($getpoid as $pid => $pval){
                if($pval['po_id']!=0){
                    $purdetails1 = $this->bms_fin_payment_model->getExpInvoiceDetailswithPOPrint($payinvid, $pv_order_id);
                }else {
                    $purdetails2 = $this->bms_fin_payment_model->getExpInvoiceDetailswithoutPOPrint($payinvid, $pv_order_id);
                }
            }
            $purdetails = array_merge($purdetails1,$purdetails2);
            $exparr = array();
            //foreach ($purdetails as $mid =>$mval){
            $exparr = $this->bms_fin_payment_model->getInvoiceName($payinvid);
            //}
            $data['invnamedisp'] = $exparr;
            $data['expsubitem'] = $purdetails;

           /* echo "<pre>";
            print_r($data['pv_item']);
            exit;*/
        }

        $data ['act_type'] = $act_type;
        if($act_type == 'download') {
            $this->load->library('M_pdf');
            $html = $this->load->view('finance/payment/payment_receipt_pdf',$data,true);
            $res = $this->m_pdf->pdf->WriteHTML($html);
            $this->m_pdf->pdf->Output($data['pv_item']['pay_no'].'.pdf', 'D');
        } else if($act_type == 'print') {
            $this->load->view('finance/payment/payment_receipt',$data);
        }
         //$this->load->view('finance/payment/payment_receipt', $data); //bms_purchase_add
    }
	
	public function payment_popup_view($pv_order_id = '') {
        $data['browser_title'] = 'Property Butler | Payment Orders';
        $data['page_header']   = '<i class="fa fa-file"></i> Payment';
        $data['properties']  = $this->bms_masters_model->getMyProperties();
        $data['property_id'] = isset($_GET['property_id']) ? trim ($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : '');
        if(!empty($data['property_id'])) {
            $data['service_provider'] = $this->bms_fin_payment_model->getServiceProvider($data['property_id']);
            $data['property_assets'] = $this->bms_fin_payment_model->getPropertyAssets($data['property_id']);
            $data['expense_items'] = $this->bms_fin_masters_model->getExpenseItems ($_SESSION['bms_default_property']);
        }
        
		if(!empty($pv_order_id)) {
            $data['pv_item'] = $this->bms_fin_payment_model->getPaymentOrder($pv_order_id);
            $data['invnum'] = $this->bms_fin_payment_model->getExpNumber($data['pv_item']['pay_service_provider_id']);
            if(!empty($data['pv_item']['pay_id'])) {
                   $data['pv_sub_items'] = $this->bms_fin_payment_model->getPVOrderDetails($data['pv_item']['pay_id']);
                   if(!empty($data['pv_sub_items'])) {
                       foreach ($data['pv_sub_items'] as $key=>$val) {
                           if(!empty($val['pay_sub_cat_id'])){
                                $data['pv_sub_items'][$key]['sub_cat_dd'] = $this->bms_fin_masters_model->getSubCategory($val['pay_cat_id']);;
                           } else {
                                $data['pv_sub_items'][$key]['sub_cat_dd'] = array();
                           }
                       }
                   }
            }
            if($data['pv_item']['pay_inv_id']>0){
                $data['expsubitem'] = $this->bms_fin_payment_model->getPaymentBasedINVdetails($data['pv_item']['pay_inv_id']);
            }
        }


        $this->load->view('finance/payment/payment_popup_view', $data);
    }
	

    function add_payment_order () {
       
        $po_select_po_no = $this->input->post('po_select_po_no');
        $pv_number = $this->input->post('pv_number');
        $item_val = $this->input->post('items');

        if($item_val['exp_inv_no'][0]){
			$pvnum = implode(",",$pv_number);
            $invoice_num = $this->getPaymentId("", "");
             $data_inv = array();
             $paidat = 0;
             foreach ($item_val['exp_inv_no'] as $key=>$val) {
                 $data_inv['payment_status'] = 0;
                 if ($item_val['bal_amount'][$key] == '0') {
                     $data_inv['payment_status'] = 1;
                 }
                 $paidat += $item_val['pay_amount'][$key];
                 $data_inv['payment_paid_amount'] = ($item_val['inv_amt'][$key]-$item_val['bal_amount'][$key]);
                 $data_inv['payment_pending_amount'] = $item_val['bal_amount'][$key];
                 $inv_id = $item_val['exp_inv_no'][$key];
                 //print_r($data_inv);
                 $this->bms_fin_payment_model->updatePayAmount($data_inv, $inv_id);
			}
                 $invdate = $this->input->post('pv_date');
                 if (!empty($invdate)) {
                     $invdate = date('Y-m-d', strtotime($invdate));
                 }
                 $pvdate = $this->input->post('pv_date');
                 $paymt = $this->input->post('paymt');
                 $pmdetails = $this->input->post('pm_details');
                 $ser_pro = $this->input->post('service_provider');
                 $onlinedate = $pmdetails['online_date'];
                 $cheqdate = $pmdetails['cheq_date'];
                 $pvitem = $this->input->post('pv_item');
                 $paymt_id = $pvitem['pay_id'];

                 $pvdated = '0000-00-00';
                 if (!empty($pvdate)) {
                     $pvdated = date('Y-m-d', strtotime($pvdate));
                 }
                 $onlndate = '0000-00-00';
                 if (!empty($onlinedate)) {
                     $onlndate = date('Y-m-d', strtotime($onlinedate));
                 }
                 $chqdate = '0000-00-00';
                 if (!empty($cheqdate)) {
                     $chqdate = date('Y-m-d', strtotime($cheqdate));
                 }
                 if (!empty($inv_id)) {
                     $payval = 0;
                 } else {
                     $payval = 1;
                 }

                 $paytotamt = $this->input->post('curtot');
                 if(!empty($paytotamt)){
                     $paidtotamt = $paytotamt;
                 }else {
                     $paidtotamt = $paidat;
                 }

                 $data = array(
                     'pay_property_id' => $this->input->post('po_id'),
                     'pay_no' => $invoice_num,
                     'pay_service_provider_id' => $ser_pro,
                     'pay_date' => $invdate,
                     'pay_inv_id' => $pvnum,
                     'remarks' => $this->input->post('remarks'),
                     'pay_total' => $paidtotamt,
                     'pay_time' => date("H:i:s"),
                     'pay_payment_status' => '1',
                     'bank_id' => $paymt['bank_id'],
                     'pay_mod' => $paymt['payment_mode'],
                     /*'pay_chq_bank_name' => $pmdetails['cheq_bank'],
                     'pay_cheq_no' => $pmdetails['cheq_no'],
                     'pay_cheq_date' => $chqdate,
                    
                     'pay_online_bank' => $pmdetails['online_bank'],
                     'pay_online_txn_no' => $pmdetails['online_txn_no'],
                     'pay_online_type' => $pmdetails['online_type'],
                     'pay_online_date' => $onlndate, */
                 );

                 $pm_details = $this->input->post('pm_details');
                 switch ($paymt['payment_mode']) {
                     case 2: 
                         $data['bank'] = !empty($pm_details['cheq_bank']) ? $pm_details['cheq_bank'] : '';
                         $data['cheq_card_txn_no'] = !empty($pm_details['cheq_no']) ? $pm_details['cheq_no'] : '';
                         $data['cheq_txn_online_date'] = !empty($pm_details['cheq_date']) ? date('Y-m-d',strtotime($pm_details['cheq_date'])) : '';
                         break;
                     case 3: 
                         $data['bank'] = !empty($pm_details['card_bank']) ? $pm_details['card_bank'] : '';
                         $data['cheq_card_txn_no'] = !empty($pm_details['card_txn_no']) ? $pm_details['card_txn_no'] : '';
                         $data['online_r_card_type'] = !empty($pm_details['card_type']) ? $pm_details['card_type'] : '';
                         break;
                     case 4: 
                         $data['bank'] = !empty($pm_details['online_bank']) ? $pm_details['online_bank'] : '';
                         $data['cheq_card_txn_no'] = !empty($pm_details['online_txn_no']) ? $pm_details['online_txn_no'] : '';
                         $data['online_r_card_type'] = !empty($pm_details['online_type']) ? $pm_details['online_type'] : '';
                         $data['cheq_txn_online_date'] = !empty($pm_details['online_date']) ? date('Y-m-d',strtotime($pm_details['online_date'])) : '';
                         break;
                 }   
                 if (!empty($paymt_id)) {
                     $type = "edit";
                     $this->bms_fin_payment_model->updateExpenceOrder($data, $paymt_id);
                     $insert_id = $paymt_id;
                 } else {
                     $type = "add";
                     $insert_id = $this->bms_fin_payment_model->insertExpenseOrder($data);
                 }
           //  }

        }else {
            $pay_no = $this->input->post('pay_no');
            $pv_item = $this->input->post('pv_item');
            //echo "pay_no ==> ".$pv_item['pay_no'];
            $pay_inv_id = $pv_item['pay_id'];
            $invoice_num = $pv_item['pay_no'];
            $invoice_num = $this->getPaymentId($pay_inv_id, $invoice_num);
            $insert_payid = $this->payment_ins_upd($pay_inv_id, $invoice_num);

            $items = $this->input->post('items');
            foreach ($items['description'] as $key=>$val) {
                $item['pay_description'] = $val;
                $item['pay_id'] = $insert_payid;
                $item['pay_asset_id'] = $items['assetlst'][$key];
                $item['pay_cat_id'] = $items['category'][$key];
                $item['pay_sub_cat_id'] = $items['subcategory'][$key];
                $item['pay_qty'] = $items['quantity'][$key];
                $item['pay_uom'] = $items['uom'][$key];
                $item['pay_unit_price'] = $items['subunitprice'][$key];
                $item['pay_amount'] = $items['amount'][$key];
                $item['pay_discount_amt'] = $items['distamount'][$key];
                $item['pay_net_amount'] = $items['netamount'][$key];
                $pay_item_id = $items['pay_item_id'][$key];

               // echo "RESULT ==>".$exp_item_id."<br>";
                if($pay_item_id>0) {
                    $type = 'edit';
                    //echo "inside record for UPDATE===><br><br><br>";
                    $this->bms_fin_payment_model->updatePaymentOrderItem($item,$pay_item_id);
                } else {
                    $type = 'add';
                   // echo "inside record for INSERT ===> <br><br><br>";
                    $this->bms_fin_payment_model->insertPaymentOrderItem($item);
                }
            }
        }

        $_SESSION['flash_msg'] = 'Payment Order '. ($type == 'edit' ? 'Edited' : 'Added') .' successfully!';
        redirect ('index.php/Bms_fin_payment/payment_list');

    }

    function unset_payment () {
        $pay_id = $this->input->post('pay_id');
        $this->bms_fin_payment_model->deletePaymentItem($pay_id);
        echo $this->bms_fin_payment_model->deletePayment($pay_id);
    }

    public function getINVorderNumber(){
        header('Content-type: application/json');
        $category_id = trim($this->input->post('servprov_id'));
        $subcategory = array();
        if($category_id) {
            $subcategory = $this->bms_fin_payment_model->getINVNumber($category_id);
        }
        echo json_encode($subcategory);
    }

    public function getInvoiceOrderDetails(){
       header('Content-type: application/json');
        $inv_id = $this->input->post('po_id');
        //echo "inside => ".$inv_id;
        $purdetails = array();
        if($inv_id) {
            $purdetails = $this->bms_fin_payment_model->getPaymentBasedINVdetails($inv_id);
        }
        echo json_encode($purdetails);
    }

    public function getExpInvoiceDetails(){
        header('Content-type: application/json');
        $inv_id = $this->input->post('po_id');
        $purdetails = array(); $purdetails1 = array(); $purdetails2 = array();
        if($inv_id) {
            $getpoid = $this->bms_fin_payment_model->getpoidchecked($inv_id);
            foreach ($getpoid as $pid => $pval){
                if($pval['po_id']!=0){
                    $purdetails1 = $this->bms_fin_payment_model->getExpInvoiceDetailswithPO($inv_id);
                }else {
                    $purdetails2 = $this->bms_fin_payment_model->getExpInvoiceDetailswithoutPO($inv_id);
                }
            }

            $purdetails = array_merge($purdetails1,$purdetails2);
        }
        echo json_encode($purdetails);
    }


     function getBanks () {
        header('Content-type: application/json');
        $property_id = trim($this->input->post('property_id'));
        $banks = array ();
        if($property_id) {
            $banks = $this->bms_fin_masters_model->getBanks($property_id);       
        }
        echo json_encode($banks);
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