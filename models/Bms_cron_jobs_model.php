<?php defined('BASEPATH') or exit('No direct script access allowed');

Class Bms_cron_jobs_model extends CI_Model {
    function __construct () { parent::__construct(); }
        
    function getAgms () {
        $sql = "SELECT agm_id,a.property_id,b.property_name,agm_type,agm_last_date,agm_date 
                FROM bms_agm a
                LEFT JOIN bms_property b ON b.property_id = a.property_id 
                WHERE  (agm_date = '0000-00-00' AND TIMESTAMPDIFF(MONTH, '".date('Y-m-d')."', (DATE_ADD(agm_last_date, INTERVAL 12 MONTH) - INTERVAL 1 DAY)) <= 3)
                OR (agm_date <> '0000-00-00' AND TIMESTAMPDIFF(MONTH, '".date('Y-m-d')."', agm_date) <= 3)";
        $query = $this->db->query($sql);
        //echo "<br /><pre>".$this->db->last_query()."</pre>";
        return $query->result_array();
    } 
    
    function getAgmChecklist ($agm_id) {
        $sql = "SELECT agm_checklist_id,agm_id,agm_responsibility FROM bms_agm_checklist 
                WHERE agm_id=".$agm_id." AND agm_checklist_status IS NULL ";
        $query = $this->db->query($sql);
        //echo "<br /><pre>".$this->db->last_query()."</pre>";
        return $query->result_array();
    }
    
    function getAgmreminders ($agm_checklist_id) {
        $sql = "SELECT remind_before,email_content,email_staff,email_jmb FROM bms_agm_checklist_reminder 
                WHERE agm_checklist_id=".$agm_checklist_id;
        $query = $this->db->query($sql);
        //echo "<br /><pre>".$this->db->last_query()."</pre>";
        return $query->result_array();
    }
    
    function get_unit_email () {
        $sql = "SELECT a.email_addr,a.unit_id,a.property_id 
                FROM bms_property_units a LEFT JOIN bms_property b ON b.property_id = a.property_id 
                WHERE b.property_status=1 AND b.`property_id`in (161,163,164,165,166)
                GROUP BY a.email_addr,b.property_name HAVING COUNT(a.email_addr) =1
                ORDER BY a.unit_id ASC";
                
        $query = $this->db->query($sql);
        //echo "<br /><pre>".$this->db->last_query()."</pre>";
        return $query->result_array();
    }
    
    function set_email_addr_invalid ($data) {
        $this->db->insert('bms_email_addr_invalid', $data);
    }
    
    function set_email_not_send ($data) {
        $this->db->insert('bms_email_not_send', $data);
    }
       
}