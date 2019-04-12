<?php defined('BASEPATH') or exit('No direct script access allowed');

Class Bms_jmb_mc_model extends CI_Model {
    function __construct () { parent::__construct(); }
        
    function get_jmb_mc_list ($offset = '0', $per_page = '25', $property_id ='', $search_txt ='') {
        $limit = '';
        if($offset != '' && $per_page != '')
            $limit = ' LIMIT '. $offset .', '.$per_page;
        
        $cond = '';
        $cond .= " AND a.property_id=(SELECT property_id FROM bms_staff_property WHERE property_id = ".$property_id." AND staff_id = ".$_SESSION['bms']['staff_id'].") ";
        if($search_txt != '') {
            $search_txt = $this->db->escape_str($search_txt);
            $cond .= " AND (LOWER(c.owner_name) LIKE '%".$search_txt."%' OR LOWER(jmb_desi_name) LIKE '%".$search_txt."%')";
        } 
        
        
        $sql = "SELECT member_id,a.property_id,c.unit_id,c.unit_no,c.owner_name,jmb_desi_name,elect_date,jmb_role,email_addr
                FROM bms_jmb_mc a   
                LEFT JOIN bms_jmb_designation b ON b.jmb_desi_id = a.jmb_desi_id               
                LEFT JOIN bms_property_units c ON c.unit_id = a.unit_id
                WHERE jmb_status = 1  ". $cond ;//LEFT JOIN bms_property b ON b.property_id = a.property_id
        $query = $this->db->query($sql);
        $num_rows = $query->num_rows();          
        
        $order_by = " ORDER BY owner_name ASC".$limit;
        $query = $this->db->query($sql.$order_by);
        //echo "<br />".$this->db->last_query();
        $data = $query->result_array();
        return array('numFound'=>$num_rows,'records'=>$data);
    }   
    
    function get_jmb_mc_details ($jmb_mc_id) {
        $cond = " AND a.property_id=(SELECT property_id FROM bms_staff_property WHERE property_id = a.property_id AND staff_id = ".$_SESSION['bms']['staff_id'].") ";
        $sql = "SELECT member_id,a.property_id,c.unit_id,c.owner_name,contact_1,a.jmb_desi_id,jmb_desi_name,elect_date,jmb_role,email_addr
                FROM  bms_jmb_mc a  
                LEFT JOIN bms_jmb_designation b ON b.jmb_desi_id = a.jmb_desi_id               
                LEFT JOIN bms_property_units c ON c.unit_id = a.unit_id             
                WHERE member_id=". $jmb_mc_id . $cond;        
        $query = $this->db->query($sql);
        //echo "<br />".$this->db->last_query();
        return $query->row_array();
    }
    
    function getUnit ($property_id) {
        $sql = "SELECT unit_id,unit_no,unit_status,floor_no,owner_name,email_addr,contact_1,is_defaulter 
                FROM bms_property_units WHERE property_id = '".$property_id."'
                ORDER BY unit_no";
        $query = $this->db->query($sql);
        //echo $this->db->last_query();
        return $query->result_array();
    }
    
    function getPositions () {
        $sql = "SELECT jmb_desi_id,jmb_desi_name FROM bms_jmb_designation ORDER BY jmb_desi_name";
        $query = $this->db->query($sql);
        //echo $this->db->last_query();
        return $query->result_array();
    }
    
    
    function check_email($email_addr, $jmb_mc_id) {
        $cond = $jmb_mc_id ? ' AND jmb_mc_id <>'.$jmb_mc_id : '';
        $sql = "SELECT jmb_mc_id,email_addr 
                FROM bms_jmb_mc WHERE status = 1 AND email_addr=? ".$cond;
        $query = $this->db->query($sql,array($email_addr));
        //echo $this->db->last_query();exit;
        return $query->result_array();   
    }
    
    function insert_jmb_mc ($data) {
        $data['created_by'] = $_SESSION['bms']['staff_id'];
        $data['created_date'] = date("Y-m-d H:i:s");
        $this->db->insert('bms_jmb_mc', $data);
        return $this->db->insert_id();           
    } 
    
    function update_jmb_mc ($data,$jmb_mc_id) {
        $data['updated_by'] = $_SESSION['bms']['staff_id'];
        $data['updated_date'] = date("Y-m-d H:i:s");
        $this->db->update('bms_jmb_mc', $data, array('member_id' => $jmb_mc_id));       
    } 
    
    function getAgmMasterChkList ($agm_type) {
        $query = $this->db->select('agm_master_id, agm_descrip, agm_responsibility')                      
                      ->get_where('bms_agm_master',array('agm_type'=>$agm_type));
        return $query->result_array();
    }
    
    function getAgmMasterChkListRemin ($agm_master_id) {
        $query = $this->db->select('agm_master_reminder_id,agm_master_id, remind_before, email_content,email_staff,email_jmb')                      
                      ->get_where('bms_agm_master_reminder',array('agm_master_id'=>$agm_master_id));
        return $query->result_array();
    }
    
    function getDesignations () {
        $query = $this->db->select('desi_id,desi_name')
                      ->order_by('desi_name')                      
                      ->get_where('bms_designation');
        return $query->result_array();
    }
    
    function getAgmList ($property_id,$agm_type) {
        $sql = "SELECT agm_id,a.property_id,b.property_name,agm_type,agm_last_date,agm_date
                FROM bms_agm a
                LEFT JOIN bms_property b ON b.property_id=a.property_id
                WHERE a.property_id = ".$property_id. ($agm_type !='' ? " AND agm_type=".$agm_type : "");
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function getAgmMain ($agm_id) {
        $query = $this->db->select('property_id,agm_type,agm_last_date,agm_date')                      
                      ->get_where('bms_agm',array('agm_id'=>$agm_id));
        return $query->row_array();
    }
    
    function getAgmChkList ($agm_id) {
        $query = $this->db->select('agm_checklist_id, agm_descrip, agm_responsibility')                      
                      ->get_where('bms_agm_checklist',array('agm_id'=>$agm_id));
        return $query->result_array();
    }
    function getAgmMainWithPropName ($agm_id) {
        $query = $this->db->select('a.property_id,b.property_name,agm_type,agm_last_date,agm_date') 
                      ->join('bms_property b','b.property_id=a.property_id','left')                     
                      ->get_where('bms_agm a',array('agm_id'=>$agm_id));
        return $query->row_array();
    }
    
    function getAgmChkListDesignation ($agm_id) {
        $query = $this->db->select('agm_checklist_id, agm_descrip, agm_responsibility,b.desi_name,agm_checklist_status,agm_checklist_remarks')  
                      ->join('bms_designation b','b.desi_id=agm_responsibility','left')                        
                      ->get_where('bms_agm_checklist',array('agm_id'=>$agm_id));
        return $query->result_array();
    }
    
    function getAgmChkListRemin ($agm_checklist_id) {
        $query = $this->db->select('agm_checklist_reminder_id,agm_checklist_id, remind_before, email_content,email_staff,email_jmb')                      
                      ->get_where('bms_agm_checklist_reminder',array('agm_checklist_id'=>$agm_checklist_id));
        return $query->result_array();
    }
    
    function getDeleteAgm ($agm_type,$ids) {        
        $sql = "SELECT agm_master_id FROM bms_agm_master WHERE agm_type=".$agm_type." AND agm_master_id NOT IN (".implode(',',$ids).")";
        $query = $this->db->query($sql);
        return $query->result_array();    
    }
    
    function deleteAgmReminder ($ids) {
        $this->db->where_in('agm_master_id', $ids);
        $this->db->delete('bms_agm_master_reminder');
    }  
    
    function deleteAgmMaster ($ids) {
        $this->db->where_in('agm_master_id', $ids);
        $this->db->delete('bms_agm_master');
    } 
    
    function deleteAgmReminderById ($master_id,$reminder_ids) {
        $sql = "DELETE FROM bms_agm_master_reminder WHERE agm_master_id=".$master_id." AND agm_master_reminder_id NOT IN (".implode(',',$reminder_ids).")";
        $this->db->query($sql);
    }
    
    function updateAgmMaster ($data,$id) {
        $data['updated_by'] = $_SESSION['bms']['staff_id'];
        $data['updated_date'] = date("Y-m-d");
        $this->db->update('bms_agm_master', $data, array('agm_master_id' => $id));   
    }
    
    function insertAgmMaster ($data) {
        $data['created_by'] = $_SESSION['bms']['staff_id'];
        $data['created_date'] = date("Y-m-d");
        $this->db->insert('bms_agm_master', $data);
        return $this->db->insert_id();   
    }
    
    function updateAgmReminder ($data,$id) {
        $this->db->update('bms_agm_master_reminder', $data, array('agm_master_reminder_id' => $id));   
    }
    
    function insertAgmReminder ($data) {
        $this->db->insert('bms_agm_master_reminder', $data);   
    }
    
    function insertAgm ($data) {
        $data['created_by'] = $_SESSION['bms']['staff_id'];
        $data['created_date'] = date("Y-m-d");
        $this->db->insert('bms_agm', $data);
        return $this->db->insert_id();   
    }
    
    function updateAgm ($data,$id) {
        $data['updated_by'] = $_SESSION['bms']['staff_id'];
        $data['updated_date'] = date("Y-m-d");
        $this->db->update('bms_agm', $data, array('agm_id' => $id));   
    }
    
    function getDeleteAgmChecklist ($agm_id,$ids) {        
        $sql = "SELECT agm_checklist_id FROM bms_agm_checklist WHERE agm_id=".$agm_id." AND agm_checklist_id NOT IN (".implode(',',$ids).")";
        $query = $this->db->query($sql);
        return $query->result_array();    
    }
    
    function deleteAgmChecklistReminder ($ids) {
        $this->db->where_in('agm_checklist_id', $ids);
        $this->db->delete('bms_agm_checklist_reminder');
    }  
    
    function deleteAgmChecklist ($ids) {
        $this->db->where_in('agm_checklist_id', $ids);
        $this->db->delete('bms_agm_checklist');
    }
    
    function deleteAgmChklistReminderById ($master_id,$reminder_ids) {
        $sql = "DELETE FROM bms_agm_checklist_reminder WHERE agm_checklist_id=".$master_id." AND agm_checklist_reminder_id NOT IN (".implode(',',$reminder_ids).")";
        $this->db->query($sql);
    }
    
    function updateAgmChecklist ($data,$id) {        
        $this->db->update('bms_agm_checklist', $data, array('agm_checklist_id' => $id));   
    }
    
    function insertAgmCheckList ($data) {        
        $this->db->insert('bms_agm_checklist', $data);
        return $this->db->insert_id();   
    }
    
    function deleteAgmChecklistReminderById ($master_id,$reminder_ids) {
        $sql = "DELETE FROM bms_agm_checklist_reminder WHERE agm_checklist_id=".$master_id." AND agm_checklist_reminder_id NOT IN (".implode(',',$reminder_ids).")";
        $this->db->query($sql);
    }
    
    function updateAgmChecklistReminder ($data,$id) {
        $this->db->update('bms_agm_checklist_reminder', $data, array('agm_checklist_reminder_id' => $id));   
    }
    
    function insertAgmChecklistReminder ($data) {
        $this->db->insert('bms_agm_checklist_reminder', $data);   
    }
    
    function update_checklist_status ($data,$id) {
        $data['status_updated_by'] = $_SESSION['bms']['staff_id'];
        $data['status_updated_date'] = date("Y-m-d");
        $this->db->update('bms_agm_checklist', $data, array('agm_checklist_id' => $id));   
    }
}