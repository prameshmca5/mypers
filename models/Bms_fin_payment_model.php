<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

Class Bms_fin_payment_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function getServiceProvider ($property_id) {
        $sql = "SELECT service_provider_id,property_id,provider_name,a.service_provider_cat_id,
                address,postcode,city,state,country,contractual,office_ph_no,
                person_incharge,person_inc_mobile,person_inc_email,job_scope, b.country_name
                FROM bms_service_provider a 
                LEFT JOIN bms_countries b ON b.country_id = a.country
                WHERE property_id=".$property_id;
          $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function getPropertyAssets ($property_id) {
        $sql = "SELECT asset_id,asset_name,asset_location 
                FROM bms_property_assets a                
                WHERE property_id=".$property_id ." ORDER BY asset_name";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    
    function getLastPaymentNo ($po_no_format) {
        $sql = "SELECT pay_no FROM bms_fin_payment WHERE pay_no LIKE '".$po_no_format."%' ORDER BY pay_id DESC LIMIT 1";
        $query = $this->db->query($sql);
        //echo "<br />".$this->db->last_query();
        return $query->row_array();
    }
    
    
    function insertExpenseOrder($data){
        $data['created_by'] = $_SESSION['bms']['staff_id'];
        $data['created_date'] = date("Y-m-d");
        $this->db->insert('bms_fin_payment', $data);
		$sql = $this->db->last_query();
		
        return $this->db->insert_id();   
       }

    function insertPaymentOrderItem ($data) {
        $this->db->insert('bms_fin_payment_items', $data);
        return $this->db->insert_id();
    }
	
	function updateExpenceOrder ($data,$id) {
	    $data['updated_by'] = $_SESSION['bms']['staff_id'];
	    $data['updated_date'] = date("Y-m-d");
	    $this->db->update('bms_fin_payment', $data, array('pay_id' => $id));
	}
	 
	function updatePaymentOrderItem ($data,$id) {
	   $this->db->update('bms_fin_payment_items', $data,  array('pay_item_id' => $id));
	   $sql = $this->db->last_query();
	 
	}

	function updatePayAmount ($data,$id) {

		$data['updated_by'] = $_SESSION['bms']['staff_id'];
	    $data['updated_date'] = date("Y-m-d");
	   $this->db->update('bms_fin_expense_invoice', $data,  array('exp_inv_id' => $id));
	   $sql = $this->db->last_query();
	   //echo $sql."<br>";
	   
	}

 
	function getPaymentList ($offset = '0', $per_page = '25', $property_id ='', $search_txt ='') {
 	    $limit = '';
 	   
	    if($offset != '' && $per_page != '')
	        $limit = ' LIMIT '. $offset .', '.$per_page;
	        
	        $cond = '';
	        $cond .= " AND a.pay_property_id=(SELECT property_id FROM bms_staff_property WHERE property_id = ".$property_id." AND staff_id = ".$_SESSION['bms']['staff_id'].") ";
	        if($search_txt != '') {
	            $search_txt = $this->db->escape_str($search_txt);
	            $cond .= " AND (LOWER(owner_name) LIKE '%".$search_txt."%' OR LOWER(unit_no) LIKE '%".$search_txt."%' OR LOWER(bill_date) LIKE '%".$search_txt."%' OR LOWER(total_amount) LIKE '%".$search_txt."%')";
	        }
	        
	        $sql = "SELECT a.*,c.service_provider_id,c.provider_name,c.person_incharge,d.exp_inv_no
                FROM bms_fin_payment a
                LEFT JOIN bms_property b ON b.property_id = a.pay_property_id
                LEFT JOIN bms_service_provider c ON c.service_provider_id = a.pay_service_provider_id
                LEFT JOIN bms_fin_expense_invoice d ON d.exp_inv_id IN(a.pay_inv_id)
                WHERE 1=1 ". $cond ;
			
            $query = $this->db->query($sql);
	        $num_rows = $query->num_rows();
	        $order_by = " ORDER BY pay_id DESC".$limit;
	        $query = $this->db->query($sql.$order_by);
 
	        $data = $query->result_array();
	        return array('numFound'=>$num_rows,'records'=>$data);
	        
	}


	
	function getPVOrderDetails ($pv_id) {
	    $sql = "SELECT a.pay_item_id,a.pay_id,a.pay_description,a.pay_qty,a.pay_uom,a.pay_unit_price,a.pay_amount,a.pay_discount_amt,a.pay_net_amount,a.pay_asset_id,a.pay_cat_id,a.pay_sub_cat_id, c.charge_code_category_name, b.*
                FROM bms_fin_payment_items a INNER JOIN bms_fin_payment b
                LEFT JOIN bms_charge_code_category c ON c.charge_code_category_id = a.pay_cat_id
                WHERE a.pay_id=b.pay_id  and a.pay_id IN($pv_id)" ;
       // echo $sql;exit;
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
	
	function getPaymentOrder ($pv_order_id) {
        $sql = "SELECT a.pay_id, a.pay_property_id,a.pay_inv_id,a.pay_no,a.pay_service_provider_id,a.pay_service_provider_name,a.pay_service_provider_address,a.pay_date,a.pay_subtotal,a.pay_discounts,a.pay_nettotal,a.pay_tax_percent,a.pay_tax_amt,a.pay_total,a.pay_payment_status,a.remarks,
            a.pay_create_status,a.bank_id,a.pay_mod,a.cheq_card_txn_no as pay_chq_bank_name,a.cheq_card_txn_no as pay_cheq_no,a.cheq_txn_online_date as pay_cheq_date,a.bank as pay_online_bank,a.cheq_card_txn_no as pay_online_txn_no,a.online_r_card_type as pay_online_type,a.cheq_txn_online_date as pay_online_date,b.address,b.postcode,b.city,b.state,b.country,b.office_ph_no,b.person_incharge,b.person_inc_mobile,b.person_inc_email, c.coa_name as bank_name
            FROM bms_fin_payment a
            LEFT JOIN bms_service_provider b ON b.service_provider_id = a.pay_service_provider_id
            LEFT JOIN bms_fin_coa c ON a.bank_id = c.coa_id
            WHERE a.pay_id =".$pv_order_id;
 	    $query = $this->db->query($sql);
	    return $query->row_array();
	}

	function deletePaymentItem($pay_id) {
        echo "delete from bms_fin_payment_items where pay_item_id=$pay_id";
        return $this->db->delete('bms_fin_payment_items',array('pay_item_id'=>$pay_id));
	}

	function deletePayment ($pay_id) {
        echo "delete from bms_fin_payment where pay_id=$pay_id";
        return $this->db->delete('bms_fin_payment',array('pay_id'=>$pay_id));
	}
	
	function getINVNumber ($sp_id) {
	    $sql = "SELECT exp_inv_id, exp_inv_no 
                FROM bms_fin_expense_invoice
                WHERE payment_status!=1 and service_provider_id =".$sp_id;
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
/*
    function getExpenseOrderitems ($exp_order_id) {
        $sql = "SELECT exp_item_id,exp_id,description,qty,uom,unit_price,amount,discount_amt,net_amount,asset_id,cat_id,sub_cat_id, d.*
                FROM bms_fin_exp_inv_items a
                LEFT JOIN bms_fin_expense_invoice d ON d.exp_inv_id = a.exp_id
                WHERE exp_id =".$exp_order_id;
        echo  $sql;
        exit;
        $query = $this->db->query($sql);
        return $query->result_array();
    }*/

    function getExpNumber ($sp_id) {
        $sql = "SELECT exp_inv_id, exp_inv_no 
                FROM bms_fin_expense_invoice
                WHERE 	invoice_create_status =0 and service_provider_id =".$sp_id;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getPaymentBasedINVdetails ($inv_id) {
		$sqlres = "SELECT po_id FROM bms_fin_expense_invoice WHERE exp_inv_id IN($inv_id)";
		$query = $this->db->query($sqlres);
        $queres = $query->result_array();

		if($queres[0]['po_id']>0){
			 $sql = "SELECT a.po_item_id ,a.po_id ,a.description,a.qty,a.uom,a.unit_price,a.amount,a.discount_amt,a.net_amount,a.asset_id,a.cat_id,a.sub_cat_id, c.charge_code_category_name, b.*, d.exp_inv_id,d.exp_inv_no,d.exp_doc_no,d.payment_status,d.invoice_create_status,d.payment_paid_amount,d.payment_pending_amount
                FROM bms_fin_po_items a INNER JOIN  bms_fin_purchase_orders b
                LEFT JOIN bms_charge_code_category c ON c.charge_code_category_id = a.cat_id
				LEFT JOIN bms_fin_expense_invoice d ON d.po_id = b.pur_order_id
                WHERE a.po_id=b.pur_order_id  and b.pur_order_id =".$queres[0]['po_id'] ;
		}else {
			$sql = "SELECT a.exp_item_id ,a.exp_id,a.description,a.qty,a.uom,a.unit_price,a.amount,a.discount_amt,a.net_amount,a.asset_id,a.cat_id,a.sub_cat_id, c.charge_code_category_name, b.*
                FROM bms_fin_exp_inv_items a INNER JOIN  bms_fin_expense_invoice b
                LEFT JOIN bms_charge_code_category c ON c.charge_code_category_id = a.cat_id
                WHERE b.exp_inv_id=a.exp_id  and exp_inv_id IN($inv_id)" ;
		}

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getpoidchecked($inv_id){
        $sqlres = "SELECT po_id FROM bms_fin_expense_invoice WHERE exp_inv_id IN($inv_id)";
        $query = $this->db->query($sqlres);
        return $query->result_array();
    }

    function getInvoiceName($invid){
        $sql = "SELECT exp_inv_no FROM bms_fin_expense_invoice WHERE exp_inv_id IN($invid)";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getExpInvoiceDetailswithPO ($inv_id) {
           $sql = "SELECT a.exp_inv_id, a.property_id, a.po_id, a.exp_inv_no, a.exp_doc_no, a.service_provider_id, a.remarks, b.subtotal, b.discounts, b.nettotal, b.tax_percent, b.tax_amt, a.total AS expstot, b.total, a.payment_status, a.invoice_create_status,a.payment_paid_amount,a.payment_pending_amount
                FROM bms_fin_expense_invoice a INNER JOIN  bms_fin_purchase_orders b ON b.pur_order_id = a.`po_id`
                WHERE a.exp_inv_id IN($inv_id)" ;
		$query = $this->db->query($sql);
        return $query->result_array();
    }

    function getExpInvoiceDetailswithoutPO ($inv_id) {
        $sql = "SELECT exp_inv_id, property_id, po_id, exp_inv_no, exp_doc_no, service_provider_id, remarks, subtotal, discounts, nettotal, tax_percent, tax_amt, total, payment_status, invoice_create_status,payment_paid_amount,payment_pending_amount,total as expstot
                FROM bms_fin_expense_invoice 
                WHERE exp_inv_id IN($inv_id) and po_id=0" ;
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    function getExpInvoiceDetailswithPOPrint($inv_id, $pay_id) {
        $sql = "SELECT a.exp_inv_id, a.property_id, a.po_id, a.exp_inv_no, a.exp_doc_no, a.service_provider_id, a.remarks, b.subtotal, b.discounts, b.nettotal, b.tax_percent, b.tax_amt, a.total AS expstot, b.total, a.payment_status, a.invoice_create_status,a.payment_paid_amount,a.payment_pending_amount
                FROM bms_fin_expense_invoice a INNER JOIN  bms_fin_purchase_orders b ON b.pur_order_id = a.`po_id`
                LEFT JOIN bms_fin_payment c ON c.pay_id = $pay_id
                WHERE a.exp_inv_id IN($inv_id)" ;

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getExpInvoiceDetailswithoutPOPrint($inv_id, $pay_id) {
        $sql = "SELECT exp_inv_id, property_id, po_id, exp_inv_no, exp_doc_no, service_provider_id, remarks, subtotal, discounts, nettotal, tax_percent, tax_amt, total, payment_status, invoice_create_status,payment_paid_amount,payment_pending_amount,total as expstot
                FROM bms_fin_expense_invoice 
                WHERE exp_inv_id IN($inv_id) and po_id=0" ;
        $query = $this->db->query($sql);
        return $query->result_array();
    }


}

