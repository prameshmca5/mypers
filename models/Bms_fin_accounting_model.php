<?php defined('BASEPATH') or exit('No direct script access allowed');

Class Bms_fin_accounting_model extends CI_Model {
    function __construct () { parent::__construct(); }
    
    function getAllCoa ($property_id) {
        $sql = "SELECT coa_id,CONCAT(coa_name,' (',coa_code,')') AS coa_name,coa_type_id
                FROM bms_fin_coa 
                WHERE property_id = ".$property_id ." 
                ORDER BY coa_code ASC";
        $query = $this->db->query($sql);
        //echo "<br />".$this->db->last_query();
        return $query->result_array();
    }
    
    function getLastJvNo ($jv_no_format) {
        $sql = "SELECT jv_no FROM bms_fin_journal_entry WHERE jv_no LIKE '".$jv_no_format."%' ORDER BY jv_id DESC LIMIT 1";
        $query = $this->db->query($sql);        
        //echo "<br />".$this->db->last_query();
        return $query->row_array();
    }
    
    function insertJv ($data) {
        $data['created_by'] = $_SESSION['bms']['staff_id'];
        $data['created_date'] = date("Y-m-d");
        $this->db->insert('bms_fin_journal_entry', $data);
        //echo "<br /><pre>".$this->db->last_query()."</pre>";
        return $this->db->insert_id();   
    }
    
    function updateJv ($data,$id) {
        $data['updated_by'] = $_SESSION['bms']['staff_id'];
        $data['updated_date'] = date("Y-m-d");
        $this->db->update('bms_fin_journal_entry', $data, array('jv_id' => $id));   
    }
    
    function insertJvItem ($data) {        
        $this->db->insert('bms_fin_journal_entry_item', $data);
        //echo "<br /><br /><pre>".$this->db->last_query()."</pre>";        
    }
    
    function updateJvItem ($data,$id) {        
        $this->db->update('bms_fin_journal_entry_item', $data,  array('jv_item_id' => $id));        
    }
    
    function getJvsList ($offset = '0', $per_page = '25', $property_id ='', $from= '',$to='') {
        $limit = '';
        if($offset != '' && $per_page != '')
            $limit = ' LIMIT '. $offset .', '.$per_page;
        
        $cond = '';
        $cond .= " AND a.property_id=(SELECT property_id FROM bms_staff_property WHERE property_id = ".$property_id." AND staff_id = ".$_SESSION['bms']['staff_id'].") ";
        
        if($from != '' && $to != '') {            
            $cond .= " AND a.jv_date BETWEEN '$from' AND '$to'";
        } else if($from != '' && $to == '') {            
            $cond .= " AND a.jv_date >= '$from'";
        } else if($from == '' && $to != '') {            
            $cond .= " AND a.jv_date <= '$to'";
        }
        
        $sql_cnt = "SELECT COUNT(a.jv_id) AS num_rows 
                FROM bms_fin_journal_entry a  
                LEFT JOIN bms_fin_journal_entry_item b ON b.jv_id = a.jv_id
                WHERE 1=1 ". $cond;
        
        $sql = "SELECT a.jv_id,a.jv_no,a.jv_date,c.coa_name,b.description,b.debit,b.credit                
                FROM bms_fin_journal_entry a  
                LEFT JOIN bms_fin_journal_entry_item b ON b.jv_id = a.jv_id
                LEFT JOIN bms_fin_coa c ON c.coa_id = b.jv_coa_id                               
                WHERE 1=1 ". $cond ;//LEFT JOIN bms_property b ON b.property_id = a.property_id
        $query = $this->db->query($sql_cnt);
        $num_rows = $query->row_array();          
        
        $order_by = " ORDER BY jv_date DESC, jv_time DESC".$limit;
        $query = $this->db->query($sql.$order_by);
        //echo "<br />".$this->db->last_query();
        $data = $query->result_array();
        return array('numFound'=>$num_rows,'records'=>$data);    
    }
    
    function getJv ($jv_id) {       
        
        $sql = "SELECT jv_id,property_id,jv_no,jv_date,remarks
                FROM bms_fin_journal_entry a                        
                WHERE jv_id =".$jv_id;
        $query = $this->db->query($sql);        
        //echo "<br />".$this->db->last_query();
        return $query->row_array();
    }
    
    function getJvItems ($jv_id) {
        $sql = "SELECT jv_item_id,jv_id,jv_coa_id,description,debit,credit
                FROM bms_fin_journal_entry_item a                        
                WHERE jv_id =".$jv_id;
        $query = $this->db->query($sql);        
        //echo "<br />".$this->db->last_query();
        return $query->result_array();
    }
    
    function deleteJvItem ($jv_item_id) {
        return $this->db->delete('bms_fin_journal_entry_item',array('jv_item_id'=>$jv_item_id));
    }
    
    function deleteJvItemByJvId ($jv_id) {
        return $this->db->delete('bms_fin_journal_entry_item',array('jv_id'=>$jv_id));
    }
    
    function deleteJv ($jv_id) {
        return $this->db->delete('bms_fin_journal_entry',array('jv_id'=>$jv_id));
    }
    
    function get_coa ($property_id) {
        $sql = "SELECT coa_id,coa_code,coa_name,coa_type_id,payment_source,payment_enabled,
                bill_enabled,receipt_enabled,opening_debit,opening_credit 
                FROM bms_fin_coa 
                WHERE property_id = ".$property_id ." AND coa_code NOT LIKE '4100/%' AND coa_code NOT LIKE '3000/%'
                UNION 
                SELECT coa_id,coa_code,coa_name,coa_type_id,payment_source,payment_enabled,
                bill_enabled,receipt_enabled,opening_debit,opening_credit 
                FROM bms_fin_coa 
                WHERE property_id = ".$property_id ." AND coa_code IN('3000/000','4100/000')
                ORDER BY coa_code ASC";
        $query = $this->db->query($sql);
        //echo "<br />".$this->db->last_query();
        return $query->result_array();
    }
    
    function get_pay_ena_bf_debit ($property_id,$item_cat_id,$from) {
        $sql = "SELECT SUM(amount) AS amount FROM 
                (SELECT SUM(d.paid_amount) AS amount
                FROM bms_fin_receipt c
                JOIN bms_fin_receipt_items d ON  d.receipt_id=c.receipt_id
                WHERE c.property_id = ".$property_id." AND d.item_cat_id=".$item_cat_id ." AND receipt_date < '$from'
                UNION                 
                SELECT SUM(f.paid_amount) AS amount
                FROM bms_fin_debit_note e
                JOIN bms_fin_debit_note_items f ON  f.debit_note_id=e.debit_note_id
                WHERE e.property_id = ".$property_id." AND  f.item_cat_id=".$item_cat_id ." AND debit_note_date < '$from'
                UNION                 
                SELECT SUM(q.debit) AS amount
                FROM bms_fin_journal_entry p
                JOIN bms_fin_journal_entry_item q ON  q.jv_id=p.jv_id
                WHERE p.property_id = ".$property_id." AND  q.jv_coa_id=".$item_cat_id ." AND jv_date < '$from'
                ) bf_debit";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->row_array();
    }
    
    function get_pay_ena_bf_credit ($property_id,$item_cat_id,$from) {
        $sql = "SELECT SUM(amount) AS amount FROM 
                (SELECT SUM(d.pay_net_amount) AS amount
                FROM bms_fin_payment c
                JOIN bms_fin_payment_items d ON  d.pay_id=c.pay_id
                WHERE c.pay_property_id = ".$property_id." AND d.pay_cat_id=".$item_cat_id ." AND c.pay_date < '$from'
                UNION                 
                SELECT SUM(q.debit) AS amount
                FROM bms_fin_journal_entry p
                JOIN bms_fin_journal_entry_item q ON  q.jv_id=p.jv_id
                WHERE p.property_id = ".$property_id." AND  q.jv_coa_id=".$item_cat_id ." AND jv_date < '$from'
                ) bf_credit";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->row_array();
    }
    
    function get_pay_n_receip_ena ($property_id,$item_cat_id,$from,$to) {
        $sql = "SELECT receipt_date AS doc_date,receipt_no AS doc_no,CONCAT(x.unit_no,' ',item_descrip) AS descrip,
                b.paid_amount AS amount,'debit' as item_type, receipt_time AS doc_time
                FROM bms_fin_receipt a
                JOIN bms_fin_receipt_items b ON  b.receipt_id=a.receipt_id
                JOIN bms_property_units x ON  x.unit_id=a.unit_id
                WHERE a.property_id = ".$property_id." AND b.item_cat_id=".$item_cat_id ." AND receipt_date BETWEEN '$from' AND '$to'
                UNION
                SELECT debit_note_date AS doc_date,debit_note_no AS doc_no,CONCAT(x.unit_no,' ',item_descrip) AS descrip,
                h.paid_amount AS amount,'credit' as item_type, debit_note_time AS doc_time
                FROM bms_fin_debit_note g
                JOIN bms_fin_debit_note_items h ON  g.debit_note_id=h.debit_note_id
                JOIN bms_property_units x ON  x.unit_id=g.unit_id
                WHERE  g.property_id = ".$property_id." AND h.item_cat_id=".$item_cat_id ." AND debit_note_date BETWEEN '$from' AND '$to'
                UNION 
                SELECT  pay_date AS doc_date,pay_no AS doc_no,pay_description AS descrip,
                d.pay_net_amount AS amount,'credit' as item_type, pay_time AS doc_time
                FROM bms_fin_payment c
                JOIN bms_fin_payment_items d ON  d.pay_id=c.pay_id                
                WHERE c.pay_property_id = ".$property_id." AND d.pay_cat_id=".$item_cat_id ." AND c.pay_date BETWEEN '$from' AND '$to'
                UNION                 
                SELECT jv_date AS doc_date,jv_no AS doc_no,description AS descrip,
                q.credit AS amount,'credit' as item_type, jv_time AS doc_time
                FROM bms_fin_journal_entry p
                JOIN bms_fin_journal_entry_item q ON  q.jv_id=p.jv_id
                WHERE p.property_id = ".$property_id." AND  q.jv_coa_id=".$item_cat_id ." AND jv_date  BETWEEN '$from' AND '$to'
                UNION                 
                SELECT jv_date AS doc_date,jv_no AS doc_no,description AS descrip,
                q.debit AS amount,'debit' as item_type, jv_time AS doc_time
                FROM bms_fin_journal_entry p
                JOIN bms_fin_journal_entry_item q ON  q.jv_id=p.jv_id
                WHERE p.property_id = ".$property_id." AND  q.jv_coa_id=".$item_cat_id ." AND jv_date  BETWEEN '$from' AND '$to'                           
                ORDER BY doc_date ASC, doc_time ASC";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->result_array();
    }
    
    function get_pay_ena ($property_id,$item_cat_id,$from,$to) {
        $sql = "SELECT  pay_date AS doc_date,pay_no AS doc_no,pay_description AS descrip,
                d.pay_net_amount AS amount,'devit' as item_type, pay_time AS doc_time
                FROM bms_fin_payment c
                JOIN bms_fin_payment_items d ON  d.pay_id=c.pay_id
                WHERE c.pay_property_id = ".$property_id." AND d.pay_cat_id=".$item_cat_id ." AND c.pay_date BETWEEN '$from' AND '$to'                             
                ORDER BY doc_date ASC, doc_time ASC";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->result_array();
    }    
    
    function get_bill_receipt_ena_bf_debit ($property_id,$item_cat_id,$from) {
        $sql = "SELECT SUM(amount) AS amount FROM 
                (SELECT SUM(item_amount) AS amount
                FROM bms_fin_receipt c
                JOIN bms_fin_receipt_items d ON  d.receipt_id=c.receipt_id
                WHERE  c.property_id = ".$property_id." AND d.item_cat_id=".$item_cat_id ." AND bill_item_id<>0 AND receipt_date < '$from' 
                UNION
                SELECT SUM(f.adj_amount) AS amount
                FROM bms_fin_credit_note e
                JOIN bms_fin_credit_note_items f ON  f.credit_note_id=e.credit_note_id
                WHERE  e.property_id = ".$property_id." AND f.item_cat_id=".$item_cat_id ." AND credit_note_date < '$from') bf_credit
                ";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->row_array();
    }
    
    
    
    function get_bill_receipt_ena_bf_credit ($property_id,$item_cat_id,$from) {
        $sql = "SELECT SUM(amount) AS amount FROM 
                (SELECT SUM(item_amount) AS amount
                FROM bms_fin_bills a
                JOIN bms_fin_bill_items b ON  b.bill_id=a.bill_id
                WHERE  a.property_id = ".$property_id." AND b.item_cat_id=".$item_cat_id ." AND bill_date < '$from' 
                UNION
                SELECT SUM(d.paid_amount) AS amount
                FROM bms_fin_receipt c
                JOIN bms_fin_receipt_items d ON  d.receipt_id=c.receipt_id
                WHERE  c.property_id = ".$property_id." AND d.item_cat_id=".$item_cat_id ." AND bill_item_id=0 AND receipt_date < '$from'
                UNION                 
                SELECT SUM(f.paid_amount) AS amount
                FROM bms_fin_debit_note e
                JOIN bms_fin_debit_note_items f ON  f.debit_note_id=e.debit_note_id
                WHERE  e.property_id = ".$property_id." AND f.item_cat_id=".$item_cat_id ." AND debit_note_date < '$from') bf_debit                
                ";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->row_array();
    }
    
    function get_bill_receipt_ena ($property_id,$item_cat_id,$from,$to) {
        $sql = "SELECT bill_date AS doc_date,bill_no AS doc_no,CONCAT(x.unit_no,' ',item_descrip) AS descrip,
                item_amount AS amount, 'credit' as item_type, bill_time AS doc_time
                FROM bms_fin_bills a
                JOIN bms_fin_bill_items b ON  b.bill_id=a.bill_id
                JOIN bms_property_units x ON  x.unit_id=a.unit_id
                WHERE a.property_id = ".$property_id." AND b.item_cat_id=".$item_cat_id ." AND bill_date BETWEEN '$from' AND '$to'
                UNION
                
                SELECT receipt_date AS doc_date,receipt_no AS doc_no,CONCAT(x.unit_no,' ',item_descrip) AS descrip,
                d.paid_amount AS amount,'credit' as item_type, receipt_time AS doc_time
                FROM bms_fin_receipt c
                JOIN bms_fin_receipt_items d ON  d.receipt_id=c.receipt_id
                JOIN bms_property_units x ON  x.unit_id=c.unit_id
                WHERE c.property_id = ".$property_id." AND d.item_cat_id=".$item_cat_id ." AND bill_item_id=0 AND receipt_date BETWEEN '$from' AND '$to'
                UNION
                   
                SELECT debit_note_date AS doc_date,debit_note_no AS doc_no,CONCAT(x.unit_no,' ',item_descrip)  AS descrip,
                h.paid_amount AS amount,'credit' as item_type, debit_note_time AS doc_time
                FROM bms_fin_debit_note g
                JOIN bms_fin_debit_note_items h ON  g.debit_note_id=h.debit_note_id
                JOIN bms_property_units x ON  x.unit_id=g.unit_id
                WHERE g.property_id = ".$property_id." AND h.item_cat_id=".$item_cat_id ." AND debit_note_date BETWEEN '$from' AND '$to'                               
                ORDER BY doc_date ASC, doc_time ASC";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->result_array();
    }
    
    
    function get_pay_sour_ena_bf_debit ($property_id,$bank_id,$from) {
        $sql = "SELECT SUM(c.paid_amount) AS amount
                FROM bms_fin_receipt c                
                WHERE c.property_id = ".$property_id." AND c.bank_id=".$bank_id ." AND receipt_date < '$from'
                ";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->row_array();
    }
    
    function get_pay_sour_ena_bf_credit ($property_id,$bank_id,$from) {
        $sql = "SELECT SUM(amount) AS amount FROM 
                (SELECT SUM(c.pay_total) AS amount
                FROM bms_fin_payment c                
                WHERE c.pay_property_id = ".$property_id." AND c.bank_id=".$bank_id ." AND c.pay_date < '$from'
                UNION                 
                SELECT SUM(e.total_amount) AS amount
                FROM bms_fin_debit_note e                
                WHERE e.property_id = ".$property_id." AND  e.bank_id=".$bank_id ." AND debit_note_date < '$from') 
                bf_debit";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->row_array();
    }
    
    function get_pay_sour_ena ($property_id,$bank_id,$from,$to) {
        $sql = "SELECT receipt_date AS doc_date,receipt_no AS doc_no,CONCAT(x.unit_no,' ',a.remarks) AS descrip,
                a.paid_amount AS amount,'debit' as item_type, receipt_time AS doc_time
                FROM bms_fin_receipt a 
                JOIN bms_property_units x ON  x.unit_id=a.unit_id                
                WHERE a.property_id = ".$property_id." AND a.bank_id=".$bank_id ." AND receipt_date BETWEEN '$from' AND '$to'
                UNION
                SELECT debit_note_date AS doc_date,debit_note_no AS doc_no,CONCAT(x.unit_no,' ',g.remarks) AS descrip,
                g.total_amount AS amount,'credit' as item_type, debit_note_time AS doc_time
                FROM bms_fin_debit_note g  
                JOIN bms_property_units x ON  x.unit_id=g.unit_id              
                WHERE  g.property_id = ".$property_id." AND g.bank_id=".$bank_id ." AND debit_note_date BETWEEN '$from' AND '$to'
                UNION 
                SELECT  pay_date AS doc_date,pay_no AS doc_no,pay_notes AS descrip,
                c.pay_total AS amount,'credit' as item_type, pay_time AS doc_time
                FROM bms_fin_payment c                
                WHERE c.pay_property_id = ".$property_id." AND c.bank_id=".$bank_id ." AND c.pay_date BETWEEN '$from' AND '$to'                             
                ORDER BY doc_date ASC, doc_time ASC";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->result_array();
    }
    
    function get_debtors_bf_debit ($property_id,$from) {
        $sql = "SELECT SUM(amount) AS amount FROM 
                (SELECT SUM(item_amount) AS amount
                FROM bms_fin_bills a
                JOIN bms_fin_bill_items b ON  b.bill_id=a.bill_id
                WHERE a.property_id=".$property_id ." AND bill_date < '$from' 
                UNION
                SELECT SUM(d.paid_amount) AS amount
                FROM bms_fin_receipt c
                JOIN bms_fin_receipt_items d ON  d.receipt_id=c.receipt_id
                WHERE c.property_id=".$property_id ." AND bill_item_id=0 AND receipt_date < '$from'
                UNION                 
                SELECT SUM(f.paid_amount) AS amount
                FROM bms_fin_debit_note e
                JOIN bms_fin_debit_note_items f ON  f.debit_note_id=e.debit_note_id
                WHERE e.property_id=".$property_id ." AND debit_note_date < '$from') bf_debit                
                ";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->row_array();
    }   
    
    function get_debtors_bf_credit ($property_id,$from) {
        $sql = "SELECT SUM(amount) AS amount FROM 
                (SELECT SUM(d.paid_amount) AS amount
                FROM bms_fin_receipt c
                JOIN bms_fin_receipt_items d ON  d.receipt_id=c.receipt_id
                WHERE c.property_id=".$property_id ." AND receipt_date < '$from' 
                UNION
                SELECT SUM(f.adj_amount) AS amount
                FROM bms_fin_credit_note e
                JOIN bms_fin_credit_note_items f ON  f.credit_note_id=e.credit_note_id
                WHERE e.property_id=".$property_id ." AND credit_note_date < '$from') bf_credit
                ";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->row_array();
    }   
    
    function get_debtors_ledger ($property_id,$from,$to) {
        $sql = "SELECT bill_date AS doc_date,bill_no AS doc_no,CONCAT(x.unit_no,' ',item_descrip) AS descrip,
                item_amount AS amount, 'debit' as item_type, bill_time AS doc_time
                FROM bms_fin_bills a
                JOIN bms_fin_bill_items b ON  b.bill_id=a.bill_id
                JOIN bms_property_units x ON  x.unit_id=a.unit_id
                WHERE a.property_id=".$property_id ." AND bill_date BETWEEN '$from' AND '$to'
                UNION
                SELECT receipt_date AS doc_date,receipt_no AS doc_no,CONCAT(x.unit_no,' ',item_descrip) AS descrip,
                d.paid_amount AS amount,'credit' as item_type, receipt_time AS doc_time
                FROM bms_fin_receipt c
                JOIN bms_fin_receipt_items d ON  d.receipt_id=c.receipt_id
                JOIN bms_property_units x ON  x.unit_id=c.unit_id
                WHERE c.property_id=".$property_id ." AND receipt_date BETWEEN '$from' AND '$to'
                UNION
                SELECT receipt_date AS doc_date,receipt_no AS doc_no,CONCAT(x.unit_no,' ',item_descrip) AS descrip,
                d.paid_amount AS amount,'debit' as item_type, receipt_time AS doc_time
                FROM bms_fin_receipt c
                JOIN bms_fin_receipt_items d ON  d.receipt_id=c.receipt_id
                JOIN bms_property_units x ON  x.unit_id=c.unit_id
                WHERE c.property_id=".$property_id ." AND bill_item_id=0 AND receipt_date BETWEEN '$from' AND '$to'
                UNION
                SELECT credit_note_date AS doc_date,credit_note_no AS doc_no,CONCAT(x.unit_no,' ',item_descrip) AS descrip,
                f.adj_amount AS amount,'credit' as item_type, credit_note_time AS doc_time
                FROM bms_fin_credit_note e
                JOIN bms_fin_credit_note_items f ON  e.credit_note_id=f.credit_note_id
                JOIN bms_property_units x ON  x.unit_id=e.unit_id
                WHERE e.property_id=".$property_id ." AND credit_note_date BETWEEN '$from' AND '$to'
                UNION
                SELECT debit_note_date AS doc_date,debit_note_no AS doc_no,CONCAT(x.unit_no,' ',item_descrip) AS descrip,
                h.paid_amount AS amount,'debit' as item_type, debit_note_time AS doc_time
                FROM bms_fin_debit_note g
                JOIN bms_fin_debit_note_items h ON  g.debit_note_id=h.debit_note_id
                JOIN bms_property_units x ON  x.unit_id=g.unit_id
                WHERE g.property_id=".$property_id ." AND debit_note_date BETWEEN '$from' AND '$to'                               
                ORDER BY doc_date ASC, doc_time ASC";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->result_array();
    }   
    
    function get_creditors_bf_debit ($property_id,$from) {
        $sql = "SELECT SUM(c.pay_total) AS amount
                FROM bms_fin_payment c                
                WHERE c.pay_property_id = ".$property_id." AND pay_date < '$from'
                ";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->row_array();
    }   
    
    function get_creditors_bf_credit ($property_id,$from) {
        $sql = "SELECT SUM(total) AS amount
                FROM bms_fin_expense_invoice a
                WHERE a.property_id=".$property_id ." AND exp_date < '$from'
                ";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->row_array();        
    }   
    
    function get_creditors ($property_id,$from,$to) {
        $sql = "SELECT exp_date AS doc_date,exp_doc_no AS doc_no,a.remarks AS descrip,
                total AS amount, 'credit' as item_type, exp_time AS doc_time
                FROM bms_fin_expense_invoice a                
                WHERE a.property_id=".$property_id ." AND exp_date BETWEEN '$from' AND '$to'
                UNION
                SELECT pay_date AS doc_date,pay_no AS doc_no,c.remarks AS descrip,
                c.pay_total AS amount,'debit' as item_type, pay_time AS doc_time
                FROM bms_fin_payment c                
                WHERE c.pay_property_id=".$property_id ." AND pay_date BETWEEN '$from' AND '$to'                                             
                ORDER BY doc_date ASC, doc_time ASC";
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->result_array();
    }
    
    function get_debtors_list ($property_id) {
        $sql = "SELECT unit_id,unit_no,owner_name,a.coa_id,coa_code
                FROM bms_property_units a
                JOIN bms_fin_coa b ON b.coa_id=a.coa_id
                WHERE a.property_id=".$property_id." ORDER BY coa_code ASC"; 
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->result_array();       
    } 
    
    function get_debtors_aging ($property_id,$from,$to='') {
        
        $cond = $to == '' ? " AND bill_date < '$from'" : " AND bill_date BETWEEN '$from' AND '$to'"; 
        
        $sql = "SELECT a.unit_id, SUM(bal_amount) AS amt                
                FROM bms_fin_bills a
                JOIN bms_fin_bill_items b ON  b.bill_id=a.bill_id                
                WHERE a.property_id=".$property_id ." $cond GROUP BY a.unit_id HAVING SUM(bal_amount) > 0"; 
        $query = $this->db->query($sql);        
        //echo "<pre>".$this->db->last_query()."</pre>";
        return $query->result_array();       
    } 
    
    function getBankRecon ($offset, $per_page, $property_id, $status, $from,$to) {
        $limit = '';
        if($offset != '' && $per_page != '')
            $limit = ' LIMIT '. $offset .', '.$per_page;
        
        
        $bank_recon_status = '';
        if($status != '' && $status != 'all') {            
            $bank_recon_status = " AND bank_recon=".$status;
        } 
        $union_sql = "(SELECT receipt_id AS id, receipt_no AS ref_no_1,receipt_date AS doc_date,receipt_time AS doc_time,
                payment_mode AS pay_mod,cheq_card_txn_no AS ref_no_2,paid_amount AS debit, 
                '0.00' AS credit,bank_recon, 'receipt' AS acc_type 
                FROM bms_fin_receipt 
                WHERE property_id=".$property_id. $bank_recon_status . " AND receipt_date BETWEEN '".$from."' AND '".$to."'
                UNION 
                SELECT pay_id AS id,pay_no AS ref_no_1,pay_date AS doc_date,pay_time AS doc_time,pay_mod,
                pay_cheq_no AS ref_no_2,'0.00' AS debit, pay_total AS credit,bank_recon, 'payment' AS acc_type 
                FROM bms_fin_payment 
                WHERE pay_property_id=".$property_id. $bank_recon_status . " AND pay_date BETWEEN '".$from."' AND '".$to."'
                )";
        $sql = "SELECT id,ref_no_1,doc_date,pay_mod,ref_no_2,debit,credit,acc_type FROM 
                 AS bank_recon";
        
        $sql_cnt = "SELECT COUNT(id) AS num_rows FROM ". $union_sql." AS bank_recon";
        
        $sql = "SELECT id,ref_no_1,doc_date,doc_time,pay_mod,ref_no_2,debit,credit,bank_recon,acc_type FROM ".$union_sql."
                 AS bank_recon";
        $query = $this->db->query($sql_cnt);
        $num_rows = $query->row_array();          
        
        $order_by = " ORDER BY doc_date DESC, doc_time DESC".$limit;
        $query = $this->db->query($sql.$order_by);
        //echo "<br />".$this->db->last_query();
        $data = $query->result_array();
        return array('numFound'=>$num_rows,'records'=>$data);    
    }
    
    function setBankRecon ($id,$type,$val) {
        if($type == 'receipt'){
            $table = 'bms_fin_receipt';
            $id_col = 'receipt_id';
        } else {
            $table = 'bms_fin_payment';
            $id_col = 'pay_id';
        }
        $data['bank_recon'] = $val;        
        $data['updated_by'] = $_SESSION['bms']['staff_id'];
        $data['updated_date'] = date("Y-m-d");
        return $this->db->update($table, $data, array($id_col => $id));           
    }
}