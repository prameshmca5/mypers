<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bms_jmb_mc extends CI_Controller {
    
    function __construct () { 
        parent::__construct ();
        if(!isset($_SESSION['bms']['is_logged_in']) || $_SESSION['bms']['is_logged_in'] == false || $_SESSION['bms']['user_type'] != 'staff' || !in_array('4',$_SESSION['bms']['access_mod'])) {
	       redirect('index.php/bms_index/login?return_url='.($_SERVER['SERVER_NAME'] == 'www.tpaccbms.com' ? 'https://www.tpaccbms.com' : 'http://127.0.0.1').$_SERVER['REQUEST_URI']);	       
	    }
        //if(!in_array($this->uri->segment(2), array('get_jmb_mc_list','check_email')))
        //    $this->user_access_log->user_access_log_insert(); // create user access log
        // load necessary models
        $this->load->model('bms_masters_model');
        $this->load->model('bms_jmb_mc_model');         
    }

    public function jmb_mc_list($offset=0, $per_page = 25) {
        //echo "<pre>";print_r($_SESSION);echo "</pre>";
		$data['browser_title'] = 'Transpacc | BMS | JMB / MC List';
        $data['page_header'] = '<i class="fa fa-users"></i> JMB / MC <i class="fa fa-angle-double-right"></i> JMB / MC List';
                
        /*parse_str($_SERVER['QUERY_STRING'], $output);
        if(isset($output['doc_type']))  unset($output['doc_type']);
        $data['query_str'] = http_build_query($output);*/
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        $data ['property_id'] = isset($_GET['property_id']) && trim($_GET['property_id']) != '' ? trim($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        
        $data['offset'] = $offset;
        $data['per_page'] = $per_page;        
        
        $this->load->view('jmb_mc/jmb_mc_list_view',$data);
	}
    
    public function get_jmb_mc_list() {        
        
        header('Content-type: application/json');        
        
        $jmb_mcs = array();
        if (isset($_POST['offset']) && is_numeric($_POST['offset']) && $_POST['offset'] >= 0 && isset($_POST['rows']) && is_numeric($_POST['rows']) && $_POST['rows'] >= 0 && $_POST['rows'] <= 100 && isset($_POST['property_id']) && $_POST['property_id'] != '') {
            $search_txt = $this->input->post('search_txt');
            $search_txt = $search_txt ? strtolower($search_txt) : $search_txt;
            $jmb_mcs = $this->bms_jmb_mc_model->get_jmb_mc_list ($_POST['offset'], $_POST['rows'], $this->input->post('property_id'), $search_txt);
        }      
                
        echo json_encode($jmb_mcs);
	}
    
    public function add_jmb_mc($member_id = '') {
        
        $type = $member_id != '' ? 'Edit' : 'Add';    
		$data['browser_title'] = 'Transpacc | BMS | '.$type.' JMB / MC';
        $data['page_header'] = '<i class="fa fa-info-cog"></i> JMB / MC <i class="fa fa-angle-double-right"></i> '.$type.' JMB / MC';
        $data['member_id'] = $member_id;
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        $data['positions'] = $this->bms_jmb_mc_model->getPositions ();
        if($member_id != '') {
            $data['jmb_mc'] = $this->bms_jmb_mc_model->get_jmb_mc_details($member_id);
            if(empty($data['jmb_mc'])) {
                redirect('index.php/bms_dashboard/index'); 
            }                     
        }        
        //echo "<pre>";print_r($data['jmb_mc']);echo "</pre>"; 
        $this->load->view('jmb_mc/add_jmb_mc_view',$data);
	} 
    
    function get_unit () {
        header('Content-type: application/json');
        $property_id = trim($this->input->post('property_id'));
        //$block_id = trim($this->input->post('block_id')); 
        
        $unit = array();         
        if($property_id) {
            $unit = $this->bms_jmb_mc_model->getUnit ($property_id);            
        }
        echo json_encode($unit);
    }
    
    function add_jmb_mc_submit () {
        //echo "<pre>";print_r($_POST);echo "</pre>"; exit;
        $jmb_mc_id = $this->input->post('member_id');
        
        $jmb_mc_info = $this->input->post('jmb_mc');
        $jmb_mc_info['elect_date'] = date('Y-m-d', strtotime($jmb_mc_info['elect_date']));
        $type = 'add';
        if(isset($jmb_mc_info['unit_id']) && trim($jmb_mc_info['unit_id']) !='') {
            if($jmb_mc_id) {
                $this->bms_jmb_mc_model->update_jmb_mc($jmb_mc_info,$jmb_mc_id);
                $type = 'edit';                
            } else {
                $jmb_mc_id = $this->bms_jmb_mc_model->insert_jmb_mc($jmb_mc_info);                
            }       
            
            $_SESSION['flash_msg'] = 'JMB / MC '. ($type == 'edit' ? 'Updated' : 'Added') .' successfully!';
        }
        //echo "<pre>";print_r($_POST);echo "</pre>"; exit;
        redirect('index.php/bms_jmb_mc/jmb_mc_list/0/25?property_id='.$jmb_mc_info['property_id']);
        
    } 
    
    function agm_master () {
        $data['browser_title'] = 'Transpacc | BMS | AGM Master';
        $data['page_header'] = '<i class="fa fa-bandcamp"></i> AGM <i class="fa fa-angle-double-right"></i> AGM Master';
        $data['agm_types'] = $this->config->item('agm_types');
        //echo $_GET['agm_type'];
        if (!empty($_GET['agm_type']) && in_array ($_GET['agm_type'],array_keys($data['agm_types'])) ) {
            $data['check_list'] = $this->bms_jmb_mc_model->getAgmMasterChkList($_GET['agm_type']);
            if(!empty($data['check_list'])) {
                foreach ($data['check_list'] as $key=>$val) {
                    $data['chk_list_reminder'][$key] = $this->bms_jmb_mc_model->getAgmMasterChkListRemin ($val['agm_master_id']);
                }
            }
            $data['designations'] = $this->bms_jmb_mc_model->getDesignations ();
        }
        //echo "<pre>";print_r($data);echo "</pre>";
        $this->load->view('jmb_mc/agm_master_view',$data);
    }
    
    function agm_master_save () {       
        
        $agm  = $this->input->post('agm');
        $agm_reminder  = $this->input->post('agm_reminder');
        if(!empty($agm)) {
            $agm_master_ids = array_filter(array_values($agm['agm_master_id']));
            //echo "<pre>"; print_r($agm['agm_master_id']); print_r($_POST);echo "</pre>";   exit;
            if(!empty($agm_master_ids)) {
                $toBeDeleteAgm = $this->bms_jmb_mc_model->getDeleteAgm ($agm['agm_type'],$agm_master_ids);
                if(!empty($toBeDeleteAgm)) {
                    foreach ($toBeDeleteAgm as $key=>$val) {
                        $toBeDeleteAgmMasterIds[] = $val['agm_master_id'];
                    }
                    if(!empty($toBeDeleteAgmMasterIds))  {
                        $this->bms_jmb_mc_model->deleteAgmReminder ($toBeDeleteAgmMasterIds);
                        $this->bms_jmb_mc_model->deleteAgmMaster ($toBeDeleteAgmMasterIds);
                    }
                }
            }
            foreach ($agm['agm_master_id'] as $key=>$val) {
                
                $update_data['agm_type'] = $agm['agm_type'];
                $update_data['agm_descrip'] = $agm['agm_descrip'][$key];
                $update_data['agm_responsibility'] = $agm['agm_responsibility'][$key];
                
                if(empty($val)) {
                    // insert process
                    $agm_master_id = $this->bms_jmb_mc_model->insertAgmMaster ($update_data);
                } else {
                    // update process
                    $agm_master_id = $val;
                    $this->bms_jmb_mc_model->updateAgmMaster ($update_data,$val);
                }    
                    
                if(!empty($agm_reminder[$key]['agm_master_reminder_id'])) {
                    $agm_reminder_ids = array_filter(array_values($agm_reminder[$key]['agm_master_reminder_id']));
                    if(!empty($agm_reminder_ids))
                        $this->bms_jmb_mc_model->deleteAgmReminderById ($agm_master_id,$agm_reminder_ids);
                }
                if(!empty($agm_reminder[$key]['remind_before'])) {
                    foreach ($agm_reminder[$key]['remind_before'] as $key2=>$val2) {
                        $update_data2['agm_master_id'] = $agm_master_id;
                        $update_data2['remind_before'] = $agm_reminder[$key]['remind_before'][$key2];
                        $update_data2['email_content'] = !empty($agm_reminder[$key]['email_content'][$key2]) ? $agm_reminder[$key]['email_content'][$key2] : '-';
                        $update_data2['email_staff'] = !empty($agm_reminder[$key]['email_staff'][$key2]) ? $agm_reminder[$key]['email_staff'][$key2] : 0;
                        $update_data2['email_jmb'] = !empty($agm_reminder[$key]['email_jmb'][$key2]) ? $agm_reminder[$key]['email_jmb'][$key2] : 0;
                        if(!empty($agm_reminder[$key]['agm_master_reminder_id'][$key2])) {
                            $agm_master_reminder_id = $agm_reminder[$key]['agm_master_reminder_id'][$key2];                                
                            $this->bms_jmb_mc_model->updateAgmReminder ($update_data2,$agm_master_reminder_id);
                        } else {
                            $this->bms_jmb_mc_model->insertAgmReminder ($update_data2);
                        }
                    }
                }
            }
            $_SESSION['flash_msg'] = 'AGM Master Saved successfully!';            
        }
        redirect('index.php/bms_jmb_mc/agm_master?agm_type='.$agm['agm_type']);
    }
    
    
    function agm_list ($property_id = '',$agm_type = '') {
        $data['browser_title'] = 'Transpacc | BMS | AGM';
        $data['page_header'] = '<i class="fa fa-bandcamp"></i> AGM';
        
        $data['agm_types'] = $this->config->item('agm_types');
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        
        $data ['property_id'] = !empty($property_id) ? $property_id : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        $data ['agm_type'] = !empty($agm_type) ? $agm_type : '';
        
        $data['agm_list'] = $this->bms_jmb_mc_model->getAgmList($data ['property_id'],$data ['agm_type']);
        
        $this->load->view('jmb_mc/agm_list_view',$data);
    }
    
    function agm_details ($agm_id) {
        //echo $agm_id;
        $data['agm_types'] = $this->config->item('agm_types');
        $data['agm_main'] = $this->bms_jmb_mc_model->getAgmMainWithPropName($agm_id);
        $data['check_list'] = $this->bms_jmb_mc_model->getAgmChkListDesignation($agm_id);
        //echo "<pre>";print_r($data);echo "</pre>";
        $this->load->view('jmb_mc/agm_update_view',$data);
    }
    
    function checklist_status_update () {
        //print_r($_POST);
        if(!empty($_POST)) {
            foreach ($_POST as $key=>$val) {
                //$data['agm_checklist_id'] = $key;
                $data['agm_checklist_status'] = 1;
                $data['agm_checklist_remarks'] = trim($val);                
                $this->bms_jmb_mc_model->update_checklist_status ($data,$key);
            }
            echo 1;
        } else {
            echo 0;
        }
    }
    
    function add_agm ($property_id='',$agm_type='',$mode='',$agm_id='') {
        $data['browser_title'] = 'Transpacc | BMS | AGM';
        $data['page_header'] = '<i class="fa fa-bandcamp"></i> AGM <i class="fa fa-angle-double-right"></i> Add AGM';
        $data['agm_types'] = $this->config->item('agm_types');
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        
        if (!empty($agm_type) && in_array ($agm_type,array_keys($data['agm_types'])) && !empty($property_id) ) {
            
            if($mode == 'edit' && !empty ($agm_id)) {
                $data['agm_main'] = $this->bms_jmb_mc_model->getAgmMain($agm_id);
                $data['check_list'] = $this->bms_jmb_mc_model->getAgmChkList($agm_id);
                if(!empty($data['check_list'])) {
                    foreach ($data['check_list'] as $key=>$val) {
                        $data['chk_list_reminder'][$key] = $this->bms_jmb_mc_model->getAgmChkListRemin ($val['agm_checklist_id']);
                    }
                }
                //echo "<pre>";print_r($data);echo "</pre>"; exit;
            } else {
                $data['check_list'] = $this->bms_jmb_mc_model->getAgmMasterChkList($agm_type);
                if(!empty($data['check_list'])) {
                    foreach ($data['check_list'] as $key=>$val) {
                        $data['chk_list_reminder'][$key] = $this->bms_jmb_mc_model->getAgmMasterChkListRemin ($val['agm_master_id']);
                    }
                }
            }
            
            $data['designations'] = $this->bms_masters_model->getAssignTo ($property_id);
        }
        
        $data['agm_type'] = $agm_type;
        $data['property_id'] = !empty($property_id) ? $property_id : (!empty($_SESSION['bms_default_property']) ? $_SESSION['bms_default_property'] : '');
        $data['mode'] = $mode;
        $data['agm_id'] = $agm_id;
        $this->load->view('jmb_mc/add_agm_view',$data);
    }
    
    function add_agm_submit () {
        //echo "<pre>";print_r($_POST);echo "</pre>";exit;
        $agm_main  = $this->input->post('agm_main');
        $agm  = $this->input->post('agm');
        $agm_reminder  = $this->input->post('agm_reminder');
        $agm_id = '';
        
        if(!empty($agm_main)) {
            $agm_main['agm_last_date'] = date('Y-m-d',strtotime($agm_main['agm_last_date']));
            $agm_main['agm_date'] = !empty($agm_main['agm_date']) ? date('Y-m-d',strtotime($agm_main['agm_date'])) : '';
            $type = 'add';
            if(!empty($agm_main['agm_id'])) {
                $type = 'edit'; 
                $agm_id = $agm_main['agm_id'];
                $this->bms_jmb_mc_model->updateAgm($agm_main,$agm_id);
            } else {
                $agm_id = $this->bms_jmb_mc_model->insertAgm($agm_main);
            }
            
            if(!empty($agm) && !empty($agm_id)) {
                $agm_master_ids = array_filter(array_values($agm['agm_checklist_id']));
                //echo "<pre>"; print_r($agm['agm_master_id']); print_r($_POST);echo "</pre>";   exit;
                if(!empty($agm_master_ids)) {
                    $toBeDeleteAgm = $this->bms_jmb_mc_model->getDeleteAgmChecklist ($agm_id,$agm_master_ids);
                    if(!empty($toBeDeleteAgm)) {
                        foreach ($toBeDeleteAgm as $key=>$val) {
                            $toBeDeleteAgmMasterIds[] = $val['agm_checklist_id'];
                        }
                        if(!empty($toBeDeleteAgmMasterIds))  {
                            $this->bms_jmb_mc_model->deleteAgmChecklistReminder ($toBeDeleteAgmMasterIds);
                            $this->bms_jmb_mc_model->deleteAgmChecklist ($toBeDeleteAgmMasterIds);
                        }
                    }
                }
                foreach ($agm['agm_checklist_id'] as $key=>$val) {
                    
                    $update_data['agm_id'] = $agm_id;
                    $update_data['agm_descrip'] = $agm['agm_descrip'][$key];
                    $update_data['agm_responsibility'] = $agm['agm_responsibility'][$key];
                    $agm_checklist_id = '';
                    if(empty($val)) {
                        // insert process
                        $agm_checklist_id = $this->bms_jmb_mc_model->insertAgmCheckList ($update_data);
                    } else {
                        // update process
                        $agm_checklist_id = $val;
                        $this->bms_jmb_mc_model->updateAgmChecklist ($update_data,$val);
                    }    
                        
                    if(!empty($agm_reminder[$key]['agm_checklist_reminder_id'])) {
                        $agm_reminder_ids = array_filter(array_values($agm_reminder[$key]['agm_checklist_reminder_id']));
                        if(!empty($agm_reminder_ids))
                            $this->bms_jmb_mc_model->deleteAgmChklistReminderById ($agm_checklist_id,$agm_reminder_ids);
                    }
                    if(!empty($agm_reminder[$key]['remind_before'])) {
                        foreach ($agm_reminder[$key]['remind_before'] as $key2=>$val2) {
                            $update_data2['agm_checklist_id'] = $agm_checklist_id;
                            $update_data2['remind_before'] = $agm_reminder[$key]['remind_before'][$key2];
                            $update_data2['email_content'] = !empty($agm_reminder[$key]['email_content'][$key2]) ? $agm_reminder[$key]['email_content'][$key2] : '-';
                            $update_data2['email_staff'] = !empty($agm_reminder[$key]['email_staff'][$key2]) ? $agm_reminder[$key]['email_staff'][$key2] : 0;
                            $update_data2['email_jmb'] = !empty($agm_reminder[$key]['email_jmb'][$key2]) ? $agm_reminder[$key]['email_jmb'][$key2] : 0;
                            if(!empty($agm_reminder[$key]['agm_checklist_reminder_id'][$key2])) {
                                $agm_checklist_reminder_id = $agm_reminder[$key]['agm_checklist_reminder_id'][$key2];                                
                                $this->bms_jmb_mc_model->updateAgmChecklistReminder ($update_data2,$agm_checklist_reminder_id);
                            } else {
                                $this->bms_jmb_mc_model->insertAgmChecklistReminder ($update_data2);
                            }
                        }
                    }
                }                        
            }
            $_SESSION['flash_msg'] = 'AGM '. ($type == 'edit' ? 'Edited' : 'Added') .' successfully!'; 
            redirect ('index.php/bms_jmb_mc/agm_list/'.$agm_main['property_id'].'/'.$agm_main['agm_type']);
        }
        redirect ('index.php/bms_jmb_mc/agm_list/');
    }
    
    function getMinMaxDate ($last_date) {
        //echo $last_date;
        $min_date = date('d-m-Y', strtotime("-1 Day",strtotime("+12 months", strtotime($last_date))));
        $max_date = date('d-m-Y', strtotime("-1 Day",strtotime("+15 months", strtotime($last_date))));
        echo $min_date.'~~~'.$max_date;
    }
    
}