<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bms_e_notice extends CI_Controller {
    
    function __construct () { 
        parent::__construct ();
        if(!isset($_SESSION['bms']['is_logged_in']) || $_SESSION['bms']['is_logged_in'] == false ) {
	       redirect('index.php/bms_index/login?return_url='.($_SERVER['SERVER_NAME'] == 'www.tpaccbms.com' ? 'https://www.tpaccbms.com' : 'http://127.0.0.1').$_SERVER['REQUEST_URI']);	       
	    }
        //if(!in_array($this->uri->segment(2), array('get_unit_list','check_email')))
        //    $this->user_access_log->user_access_log_insert(); // create user access log
        // load necessary models
        $this->load->model('bms_masters_model');
        $this->load->model('bms_e_notice_model');         
    }

    public function notice_list($offset=0, $per_page = 25) {
        //echo "<pre>";print_r($_SESSION);echo "</pre>";
		$data['browser_title'] = 'Transpacc | BMS | e-Notice List';
        $data['page_header'] = '<i class="fa fa-exclamation-triangle"></i> e-Notice <i class="fa fa-angle-double-right"></i> e-Notice List';
                
        /*parse_str($_SERVER['QUERY_STRING'], $output);
        if(isset($output['doc_type']))  unset($output['doc_type']);
        $data['query_str'] = http_build_query($output);*/
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        $data ['property_id'] = isset($_GET['property_id']) && trim($_GET['property_id']) != '' ? trim($_GET['property_id']) : (isset($_SESSION['bms_default_property']) && $_SESSION['bms_default_property'] != '' ? $_SESSION['bms_default_property'] : (isset($data['properties'][0]['property_id']) ? $data['properties'][0]['property_id'] : ''));
        
        $data['offset'] = $offset;
        $data['per_page'] = $per_page;        
        
        $this->load->view('e_notice/e_notice_list_view',$data);
	}
    
    function notice_details ($notice_id) {
        $data['notice_details'] = $this->bms_e_notice_model->get_notice_details ($notice_id);
        if(!empty($data['notice_details']['unit_ids']) && $data['notice_details']['unit_ids'] != 'All' ) {
            $data['unit_info'] = $this->bms_e_notice_model->getUnitsInfo ($data['notice_details']['unit_ids']); 
        }
        $this->load->view('e_notice/e_notice_details_view',$data);
    }
    
    public function get_notice_list() {        
        
        header('Content-type: application/json');        
        
        $units = array();
        if (isset($_POST['offset']) && is_numeric($_POST['offset']) && $_POST['offset'] >= 0 && isset($_POST['rows']) && is_numeric($_POST['rows']) && $_POST['rows'] >= 0 && $_POST['rows'] <= 100 && isset($_POST['property_id']) && $_POST['property_id'] != '') {
            $search_txt = $this->input->post('search_txt');
            $search_txt = $search_txt ? strtolower($search_txt) : $search_txt;
            $units = $this->bms_e_notice_model->get_notice_list ($_POST['offset'], $_POST['rows'], $this->input->post('property_id'), $search_txt);
        }       
        echo json_encode($units);
	}
    
    public function create_notice($unit_id = '') {
        
        //$type = $unit_id != '' ? 'Edit' : 'Add';    
		$data['browser_title'] = 'Transpacc | BMS | Create e-Notice';
        $data['page_header'] = '<i class="fa fa-exclamation-triangle"></i> e-Notice <i class="fa fa-angle-double-right"></i> Create e-Notice';
        $data['unit_id'] = $unit_id;
        $data['properties'] = $this->bms_masters_model->getMyProperties ();
        /*if($unit_id != '') {
            $data['unit_info'] = $this->bms_e_notice_model->get_unit_details($unit_id);
            if(empty($data['unit_info'])) {
                redirect('index.php/bms_dashboard/index'); 
            }                     
        }  */      
        //echo "<pre>";print_r($data);echo "</pre>"; exit;
        $this->load->view('e_notice/create_e_notice_view',$data);
	}     
        
    function create_e_notice_submit () {
        //echo "<pre>";print_r($_POST);echo "</pre>"; exit;
        
        $notice_info = $this->input->post('notice');
        
        if(isset($notice_info['property_id']) && trim($notice_info['subject']) !='') {
            
            $notice_info['start_date'] = !empty($notice_info['start_date']) ? date('Y-m-d', strtotime($notice_info['start_date'])) : '';
            $notice_info['end_date'] = !empty($notice_info['end_date']) ? date('Y-m-d', strtotime($notice_info['end_date'])) : '';
            //str_replace ('<br>' , '\r\n', $notice_info['message']);
            $notice_info['message'] = $notice_info['message'];
            
            if(isset($_POST['unit_all']) && $_POST['unit_all'] == 'unit_all') {
                $notice_info['unit_ids'] = 'All';
            } else {
                if(!empty($_POST['notice_unit']))
                    $notice_info['unit_ids'] = implode(',',$_POST['notice_unit']); 
            }
            
            // attachment
            $data['upload_err'] =  array ();
            if(!empty($_FILES)){
                
                $e_notice_attach_upload = $this->config->item('e_notice_attach_upload');                
                $this->load->library('upload');
                $e_notice_attach_upload['upload_path'] = $e_notice_attach_upload['upload_path'].'/'.date('Y'); 
                if(!is_dir($e_notice_attach_upload['upload_path']));
                    @mkdir($e_notice_attach_upload['upload_path'], 0777);
                
                $e_notice_attach_upload['upload_path'] = $e_notice_attach_upload['upload_path'].'/'.date('m'); 
                if(!is_dir($e_notice_attach_upload['upload_path']));
                    @mkdir($e_notice_attach_upload['upload_path'], 0777);                    
                
                $time =microtime(true);
                $micro_time=sprintf("%06d",($time - floor($time)) * 1000000);
                $date=new DateTime( date('Y-m-d H:i:s.'.$micro_time,$time) );
                $e_notice_attach_upload['file_name'] = $date->format("YmdHisu");
                
                $this->upload->initialize($e_notice_attach_upload);                
                if ( ! $this->upload->do_upload('attach')) {                    
                    array_push($data['upload_err'],$this->upload->display_errors());                        
                }
                if(empty($data['upload_err'])){
                    $notice_info['attachment_name'] = $this->upload->data('file_name');                    
                } 
            }
            
            $this->bms_e_notice_model->insert_notice($notice_info);
                
            if(!empty($notice_info['unit_ids'])) {
                if($notice_info['unit_ids'] == 'All')
                    $unit_info = $this->bms_masters_model->getUnit ($notice_info['property_id'],$notice_info['block_id']);
                   else 
                    $unit_info = $this->bms_e_notice_model->getUnitsInfo ($notice_info['unit_ids']);  
            }
            
            $this->load->library('email');

            $subject = $notice_info['subject'];               
            
            // Get full html:
            $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
                <title>' . html_escape($notice_info['subject']) . '</title>
                <style type="text/css">
                    body {
                        font-family: Arial, Verdana, Helvetica, sans-serif;
                        font-size: 16px;
                    }
                </style>
            </head>
            <body>
            ' . $notice_info['message']. '
            </body>
            </html>';
            // Also, for getting full html you may use the following internal method:
            //$body = $this->email->full_html($subject, $message);
            $count = 0;
            foreach($unit_info as $key=>$val) {
                if (filter_var($val['email_addr'], FILTER_VALIDATE_EMAIL)) {
                    $this->email
                        ->from('admin@tpaccbms.com','TRANSPACC BMS')
                        ->reply_to('admin@tpaccbms.com','TRANSPACC BMS')    // Optional, an account where a human being reads.
                        ->to($val['email_addr'],$val['owner_name'])
                        ->bcc('naguwin@gmail.com','Nagarajan')
                        //->bcc('tanbenghwa@gmail.com')
                        ->bcc('email@transpacc.com.my','Transpacc Emails')
                        ->subject($subject)
                        ->message($body);
                    if(!empty($notice_info['attachment_name']))    
                        $this->email->attach($e_notice_attach_upload['upload_path'].'/'.$notice_info['attachment_name']);
                        // ->send();
                    $result = $this->email->send();
                        //$this->email->bcc($val['email_addr'],$val['owner_name']);    
                        //$result = $this->email->send();
                    if(++$count % 100 == 0) {
                        sleep(5);
                    }
                }
            }            
            $_SESSION['flash_msg'] = 'e-Notice Created Successfully!';
        }
        //$_SESSION['flash_msg'] = 'e-Notice Created Successfully!';
        //echo "<pre>";print_r($_POST);echo "</pre>"; exit;
        redirect('index.php/bms_e_notice/notice_list/0/25?property_id='.$notice_info['property_id']);
        
    } 
    
}