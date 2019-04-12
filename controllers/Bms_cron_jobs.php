<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bms_cron_jobs extends CI_Controller {
    
    function __construct () { 
        parent::__construct ();        
        //header('Content-type: application/json');
        
        /*if(!isset($_GET['auth_key']) || $_GET['auth_key'] != 'gXR65_*4!sU-8paCyuvwR7Efv*DLBDV$') {
            $data['Data'] = array();
            $data['Status'] = false;
            $data['ErrorLog'] = array(array('message'=>'Authentication failed!'));
            echo json_encode(array($data));	exit;       	       
	    } */
        $this->load->model('bms_masters_model'); 
        $this->load->model('bms_cron_jobs_model'); 
        $this->load->library('agm_emails');   
    }
    
    function sendAgmReminder () {
        
        $agms = $this->bms_cron_jobs_model->getAgms ();
        //echo "<pre>";print_r($agms);echo "</pre>";
        if(!empty($agms)) {
            $agm_types = $this->config->item('agm_types');
            $agm_remin = $this->config->item('agm_remin');
            foreach ($agms as $key=>$val) {
                $agm_checklist = $this->bms_cron_jobs_model->getAgmChecklist ($val['agm_id']);
                $staff_emails = array ();
                $jmb_emails = array ();
                if(!empty($agm_checklist)) {
                    foreach ($agm_checklist as $key2=>$val2) {
                        $agm_reminders = $this->bms_cron_jobs_model->getAgmreminders ($val2['agm_checklist_id']);
                        if(!empty($agm_reminders)) {
                            //echo "<pre>";print_r($agm_reminders);echo "</pre>";
                            foreach ($agm_reminders as $key3=>$val3) {
                                $date2=date_create(date('Y-m-d'));
                                if($val['agm_date'] == '0000-00-00') {
                                    $date1=date_create(date('d-m-Y', strtotime("-1 Day",strtotime("+12 months", strtotime($val['agm_last_date'])))));
                                } else {
                                    $date1=date_create($val['agm_date']);
                                }                         
                                
                                $diff=date_diff($date1,$date2,TRUE);
                                
                                $day_diff = $diff->format("%d");
                                $days_diff = $diff->format("%a");                                
                                $months_diff = $diff->format("%m");
                                $weeks_diff = $diff->format("%a")/7;
                                //echo "<br />".$agm_remin[$val3['remind_before']];
                                $remind_bef = $agm_remin[$val3['remind_before']];
                                if((($remind_bef == $months_diff.' Months' || $remind_bef == $months_diff.' Month') && $day_diff == 0)
                                     || (($remind_bef == $weeks_diff.' Weeks' || $remind_bef == $weeks_diff.' Week') && $day_diff % 7 == 0)
                                     || ($remind_bef == $days_diff.' Days' || $remind_bef == $weeks_diff.' Day')) {
                                    
                                    //echo "send Email for remind before ".$remind_bef;
                                    $mail_subj = $val['property_name'] . ' | Reminder Before '.$remind_bef .' For '. $agm_types[$val['agm_type']];
                                    if($val3['email_staff'] == 1) {
                                        if(empty($staff_emails)) {
                                            $staff_emails = $this->agm_emails->getPropertyStaffs($val['property_id']);
                                        }
                                        if(!empty($staff_emails)) {
                                            $mail_msg = $this->agm_emails->send_email($staff_emails,$mail_subj,$val3['email_content'],$val['email_addr']);
                                            if(!$mail_msg) {
                                    			$mail_subj .= " is not send";
                                                $mail_to = array(array('email_addr'=>'naguwin@gmail.com','first_name'=>'Nagarajan'));
                                    			$mail_msg = $this->agm_emails->send_email($mail_to,$mail_subj,$val3['email_content'],$val['email_addr']);
                                    		}
                                        }
                                    }
                                    
                                    if($val3['email_jmb'] == 1) {
                                        if(empty($jmb_emails)) {
                                            $jmb_emails = $this->agm_emails->getPropertyJmb($val['property_id']);
                                        }
                                        if(!empty($jmb_emails)) {
                                            $mail_msg = $this->agm_emails->send_email($jmb_emails,$mail_subj,$val3['email_content'],$val['email_addr']);
                                            if(!$mail_msg) {
                                    			$mail_subj .= " is not send";
                                                $mail_to = array(array('email_addr'=>'naguwin@gmail.com','first_name'=>'Nagarajan'));
                                    			$mail_msg = $this->agm_emails->send_email($mail_to,$mail_subj,$val3['email_content'],$val['email_addr']);
                                    		}
                                        }
                                    }
                                    //echo "<pre>";print_r($staff_emails);print_r($jmb_emails);echo "</pre>"; 
                                }
                            }
                        }
                    }
                }
            }
        }
        
    }
    
    function testCronJob () {
        $mail_subj = 'Testing Cron Job 5 | Reminder Before Notice for AGM';
        $to_emails = array (array('email_addr'=>'naguwin@gmail.com','first_name'=>'Nagarajan P'));
        $email_content = " This is test email for cron job setup";
        $from_addr = 'from@cron.com';
        $mail_msg = $this->agm_emails->send_email($to_emails,$mail_subj,$email_content,$from_addr);
        echo $mail_msg ? ' Mail send successfully' : 'Mail send Failed';
    }
    
    function cny_grettings () {
        //CNY_2019_Greetings.png
        ini_set("allow_url_fopen", 1);
        
        $mail_subj = 'HAPPY CHINESE NEW YEAR 2019';
        //$to_emails = array (array('email_addr'=>'jasonlim81@gmail.com','first_name'=>'HOCK WAH LIM, JASON'));
        //$to_emails = array (array('email_addr'=>'naguwin@gmail.com','first_name'=>'Nagarajan P'));
        $email_content = " <img src='https://www.tpaccbms.com/CNY_2019_Greetings.png' />";
        $from_addr = 'admin@tpaccbms.com';
        $custom_error_folder = base_url().'bms_uploads'.DIRECTORY_SEPARATOR.'custom_error_log'.DIRECTORY_SEPARATOR;
        $invalid_email_file = $custom_error_folder.'invalid_email_addr.txt';
        $email_not_send_file = $custom_error_folder.'email_not_send.txt';
        $unit_emails = $this->bms_cron_jobs_model->get_unit_email();
        $count = 0;
        foreach($unit_emails as $key=>$val) {
            if (filter_var($val['email_addr'], FILTER_VALIDATE_EMAIL)) {
                $to_emails = array (array('email_addr'=>$val['email_addr'],'first_name'=>''));
                $mail_msg = $this->agm_emails->send_email($to_emails,$mail_subj,$email_content,$from_addr);
                if(!$mail_msg) {
                    $content = array('unit_id'=>$val['unit_id'], 'property_id'=>$val['property_id'],'email_addr'=>$val['email_addr']);
                    //file_put_contents($email_not_send_file,$content,FILE_APPEND);
                    $this->bms_cron_jobs_model->set_email_not_send($content);                    
                } 
            } else {
                //$content = "Unit Id: ".$val['unit_id']." Property_id: ".$val['property_id']. " Email Address: ".$val['email_addr'];
                //file_put_contents($invalid_email_file,$content,FILE_APPEND);
                $content = array('unit_id'=>$val['unit_id'], 'property_id'=>$val['property_id'],'email_addr'=>$val['email_addr']);
                $this->bms_cron_jobs_model->set_email_addr_invalid($content);                
            }
            if(++$count % 100 == 0) {
                sleep(10);
            }
        }
        
        //if (filter_var($email, FILTER_VALIDATE_EMAIL))
        //file_put_contents($email_not_send_file,$content,FILE_APPEND);
        
        //$mail_msg = $this->agm_emails->send_email($to_emails,$mail_subj,$email_content,$from_addr);
        //echo $mail_msg ? ' Mail send successfully' : 'Mail send Failed';
        echo "List completed";
    }

    
    
}