<?php defined('BASEPATH') or exit('No direct script access allowed');

Class Bms_fin_bills_model extends CI_Model {
    function __construct () { parent::__construct(); }
    
    /*function getSalesItems () {                
        $sql = "SELECT charge_code_category_id, charge_code_category_name AS charge_code_category_name                  
                FROM bms_charge_code_category b
                WHERE b.charge_code_group_id = 5 ORDER BY charge_code ASC";
                //CONCAT(charge_code_category_name, ' (',b.charge_code,')') AS charge_code_category_name
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function getSubCategory ($cat_id) {                
        $sql = "SELECT charge_code_sub_category_id, charge_code_sub_category_name AS charge_code_sub_category_name 
                FROM bms_charge_code_sub_category 
                WHERE charge_code_category_id  = ".$cat_id ." ORDER BY charge_code ASC";
                // CONCAT(charge_code_sub_category_name, ' (',charge_code,')') 
        $query = $this->db->query($sql);
        return $query->result_array();
    }*/
    
    function getLastBillNo ($bill_no_format) {
        $sql = "SELECT bill_no FROM bms_fin_bills WHERE bill_no LIKE '".$bill_no_format."%' ORDER BY bill_id DESC LIMIT 1";
        $query = $this->db->query($sql);        
        //echo "<br />".$this->db->last_query();
        return $query->row_array();
    }
    
    function insertBill ($data) {
        $data['created_by'] = $_SESSION['bms']['staff_id'];
        $data['created_date'] = date("Y-m-d");
        $this->db->insert('bms_fin_bills', $data);
        //echo "<br /><pre>".$this->db->last_query()."</pre>";
        return $this->db->insert_id();   
    }
    
    function updateBill ($data,$id) {
        $data['updated_by'] = $_SESSION['bms']['staff_id'];
        $data['updated_date'] = date("Y-m-d");
        $this->db->update('bms_fin_bills', $data, array('bill_id' => $id));   
    }
    
    function insertBillItem ($data) {        
        $this->db->insert('bms_fin_bill_items', $data);
        //echo "<br /><br /><pre>".$this->db->last_query()."</pre>";        
    }
    
    function updateBillItem ($data,$id) {        
        $this->db->update('bms_fin_bill_items', $data,  array('bill_item_id' => $id));        
    }
    
    function getBillsList ($offset = '0', $per_page = '25', $property_id ='', $unit_id ='',$from= '',$to='') {
        $limit = '';
        if($offset != '' && $per_page != '')
            $limit = ' LIMIT '. $offset .', '.$per_page;
        
        $cond = '';
        $cond .= " AND a.property_id=(SELECT property_id FROM bms_staff_property WHERE property_id = ".$property_id." AND staff_id = ".$_SESSION['bms']['staff_id'].") ";
        if($unit_id != '') {            
            $cond .= " AND a.unit_id = ".$unit_id;
        } 
        if($from != '' && $to != '') {            
            $cond .= " AND a.bill_date BETWEEN '$from' AND '$to'";
        } else if($from != '' && $to == '') {            
            $cond .= " AND a.bill_date >= '$from'";
        } else if($from == '' && $to != '') {            
            $cond .= " AND a.bill_date <= '$to'";
        }
        
        $sql_cnt = "SELECT COUNT(a.bill_id) AS num_rows, SUM(a.total_amount) AS grant_tot, SUM(d.total_amount) AS cn_amt
                FROM bms_fin_bills a  
                LEFT JOIN bms_property b ON b.property_id = a.property_id
                LEFT JOIN bms_property_units c ON c.unit_id = a.unit_id 
                LEFT JOIN bms_fin_credit_note d ON d.invoice_id = a.bill_id                
                WHERE 1=1 ". $cond;
        
        $sql = "SELECT a.bill_id,a.bill_no,a.bill_date,a.bill_due_date,a.total_amount,a.bill_paid_status,
                b.property_name,c.unit_no,c.owner_name,d.total_amount AS cn_amt
                FROM bms_fin_bills a  
                LEFT JOIN bms_property b ON b.property_id = a.property_id
                LEFT JOIN bms_property_units c ON c.unit_id = a.unit_id 
                LEFT JOIN bms_fin_credit_note d ON d.invoice_id = a.bill_id                 
                WHERE 1=1 ". $cond ;//LEFT JOIN bms_property b ON b.property_id = a.property_id
        $query = $this->db->query($sql_cnt);
        $num_rows = $query->row_array();          
        
        $order_by = " ORDER BY bill_date DESC, bill_id DESC".$limit;
        $query = $this->db->query($sql.$order_by);
        //echo "<br />".$this->db->last_query();
        $data = $query->result_array();
        return array('numFound'=>$num_rows,'records'=>$data);
    
    }
    
    function getBill ($bill_id) {       
        
        $sql = "SELECT bill_id,property_id,block_id,unit_id,bill_no,bill_date,bill_due_date,remarks,total_amount
                FROM bms_fin_bills a                        
                WHERE bill_id =".$bill_id;
        $query = $this->db->query($sql);        
        //echo "<br />".$this->db->last_query();
        return $query->row_array();
    }
    
    function getBillItems ($bill_id) {
        $sql = "SELECT bill_item_id,bill_id,item_cat_id,item_period,item_descrip,item_amount
                FROM bms_fin_bill_items a                        
                WHERE bill_id =".$bill_id;
        $query = $this->db->query($sql);        
        //echo "<br />".$this->db->last_query();
        return $query->result_array();
    }
    
    function getBillDetails ($bill_id) {       
        
        $sql = "SELECT bill_id,a.property_id,a.block_id,a.unit_id,
                b.property_name,b.jmb_mc_name,b.address_1,b.address_2,b.pin_code,b.city,e.state_name,f.country_name,
                c.unit_no,c.owner_name,
                bill_no,bill_date,bill_due_date,remarks,total_amount,a.created_date,d.first_name,d.last_name
                FROM bms_fin_bills a  
                LEFT JOIN bms_property b ON b.property_id = a.property_id
                LEFT JOIN bms_property_units c ON c.unit_id = a.unit_id 
                LEFT JOIN bms_staff d ON d.staff_id=a.created_by 
                LEFT JOIN bms_state e ON e.state_id=b.state_id
                LEFT JOIN bms_countries f ON f.country_id=b.country_id                                     
                WHERE bill_id =".$bill_id;
        $query = $this->db->query($sql);        
        //echo "<br />".$this->db->last_query();
        return $query->row_array();
    }
    
    function getBillItemsDetail ($bill_id) {
        $sql = "SELECT a.bill_item_id,a.bill_id,a.item_cat_id,a.item_period,a.item_descrip,a.item_amount,
                b.coa_name as cat_name,
                d.adj_amount
                FROM bms_fin_bill_items a 
                LEFT JOIN bms_fin_coa b ON b.coa_id = a.item_cat_id
                
                LEFT JOIN bms_fin_credit_note_items d ON d.bill_item_id = a.bill_item_id
                WHERE bill_id =".$bill_id;
        $query = $this->db->query($sql);        
        //echo "<br />".$this->db->last_query();
        return $query->result_array();
    }
    
    function deleteBillItem ($bill_item_id) {
        return $this->db->delete('bms_fin_bill_items',array('bill_item_id'=>$bill_item_id));
    }
    
    function deleteBillItemByBillId ($bill_id) {
        return $this->db->delete('bms_fin_bill_items',array('bill_id'=>$bill_id));
    }
    
    function deleteBill ($bill_id) {
        return $this->db->delete('bms_fin_bills',array('bill_id'=>$bill_id));
    }
    
    function get_bf_debit ($unit_id,$from) {
        $sql = "SELECT SUM(amount) AS amount FROM 
                (SELECT SUM(item_amount) AS amount
                FROM bms_fin_bills a
                JOIN bms_fin_bill_items b ON  b.bill_id=a.bill_id
                WHERE a.unit_id=".$unit_id ." AND bill_date < '$from' 
                UNION
                SELECT SUM(d.paid_amount) AS amount
                FROM bms_fin_receipt c
                JOIN bms_fin_receipt_items d ON  d.receipt_id=c.receipt_id
                WHERE c.unit_id=".$unit_id ." AND bill_item_id=0 AND receipt_date < '$from'
                UNION                 
                SELECT SUM(f.paid_amount) AS amount
                FROM bms_fin_debit_note e
                JOIN bms_fin_debit_note_items f ON  f.debit_note_id=e.debit_note_id
                WHERE e.unit_id=".$unit_id ." AND debit_note_date < '$from') bf_debit                
                ";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->row_array();
    }
    
    function get_bf_credit ($unit_id,$from) {
        $sql = "SELECT SUM(amount) AS amount FROM 
                (SELECT SUM(item_amount) AS amount
                FROM bms_fin_receipt c
                JOIN bms_fin_receipt_items d ON  d.receipt_id=c.receipt_id
                WHERE c.unit_id=".$unit_id ." AND bill_item_id<>0 AND receipt_date < '$from' 
                UNION
                SELECT SUM(f.adj_amount) AS amount
                FROM bms_fin_credit_note e
                JOIN bms_fin_credit_note_items f ON  f.credit_note_id=e.credit_note_id
                WHERE e.unit_id=".$unit_id ." AND credit_note_date < '$from') bf_credit
                ";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->row_array();
    }
    
    function get_soa ($unit_id,$from,$to) {
        $sql = "SELECT a.bill_id as id, unit_id,bill_date AS doc_date,bill_no AS doc_no,item_descrip AS descrip,
                item_amount AS amount, 'RINV' as item_type, '' as invoice_id, bill_time AS doc_time
                FROM bms_fin_bills a
                JOIN bms_fin_bill_items b ON  b.bill_id=a.bill_id
                WHERE a.unit_id=".$unit_id ." AND bill_date BETWEEN '$from' AND '$to'
                UNION
                SELECT c.receipt_id as id, unit_id,receipt_date AS doc_date,receipt_no AS doc_no,item_descrip AS descrip,
                d.paid_amount AS amount,'OR' as item_type, d.bill_item_id as invoice_id, receipt_time AS doc_time
                FROM bms_fin_receipt c
                JOIN bms_fin_receipt_items d ON  d.receipt_id=c.receipt_id
                WHERE c.unit_id=".$unit_id ." AND receipt_date BETWEEN '$from' AND '$to'
                UNION
                SELECT e.credit_note_id as id, unit_id,credit_note_date AS doc_date,credit_note_no AS doc_no,item_descrip AS descrip,
                f.adj_amount AS amount,'CN' as item_type, '' as invoice_id, credit_note_time AS doc_time
                FROM bms_fin_credit_note e
                JOIN bms_fin_credit_note_items f ON  e.credit_note_id=f.credit_note_id
                WHERE e.unit_id=".$unit_id ." AND credit_note_date BETWEEN '$from' AND '$to'
                UNION
                SELECT g.debit_note_id as id, unit_id,debit_note_date AS doc_date,debit_note_no AS doc_no,item_descrip AS descrip,
                h.paid_amount AS amount,'DN' as item_type, '' as invoice_id, debit_note_time AS doc_time
                FROM bms_fin_debit_note g
                JOIN bms_fin_debit_note_items h ON  g.debit_note_id=h.debit_note_id
                WHERE g.unit_id=".$unit_id ." AND debit_note_date BETWEEN '$from' AND '$to'                               
                ORDER BY doc_date ASC, doc_time ASC";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->result_array();
    }
    
    function getUnitsForQuitRent ($property_id) {
        $sql = "SELECT unit_id,block_id,share_unit FROM bms_property_units 
                WHERE property_id=".$property_id." AND share_unit<>'' 
                ORDER BY unit_no DESC";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->result_array();
    }
    
}