<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    
    function __construct () { parent::__construct (); }
    
    function index () {
        $this->pageTitle = "My Profile";
        $this->userdata = array('test inpunt','test input2');
        $this->userTool = array('test user tool','test user tool2');
        $this->load->view('test_view');
    }
    
    function geo_info () {
        $ip = $this->input->ip_address();
        /** $res = file_get_contents('http://www.geobytes.com/iplocator/?IpAddress='+$ip);
        */
        echo "<b> From getcitydetails.geobytes.com => </b>";
        $json = file_get_contents('http://getcitydetails.geobytes.com/GetCityDetails?fqcn='. $ip); 
        $data = json_decode($json);
        echo '<b>'. $ip .'</b> resolves to:' ;
        echo "<pre>";print_r($data); echo "</pre>";
        
        
        echo "<b> From www.netip.de => </b>";
        $json=file_get_contents('http://www.netip.de/search?query='.$ip);          
        $data = unserialize($json);
        echo '<b>'. $ip .'</b> resolves to:' ;
        echo "<pre>";print_r($data); echo "</pre>";
		echo "Welcome test content";
    }
    
    function date_diff () {
        $d1 = new DateTime(date('Y-m-d'));
        $d2 = new DateTime('2018-05-23');
        var_dump($d1 == $d2);
        var_dump($d1 >= $d2);
        var_dump($d1 < $d2);
    }
    
    function microsecond_test () {
        
        echo "<br />".$time_start = date("Y-m-d H:i:s.u");
        echo "<br />".$time_start = date("Y-m-d H:i:s").".".round(microtime(true) * 1000);
        echo "<br />".microtime(true);
        
        // another
        $time =microtime(true);
        $micro_time=sprintf("%06d",($time - floor($time)) * 1000000);
        $date=new DateTime( date('Y-m-d H:i:s.'.$micro_time,$time) );
        print "<br />Date with microseconds :<br> ".$date->format("Y-m-d H:i:s.u");
        
        // another
        list($ts,$ms) = explode(".",microtime(true));
        $tim = date("Y-m-d H:i:s.",$ts).$ms;
        echo "<br />".$tim. " - ".strtotime($tim);

        // Sleep for a while
        usleep(100);
        
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        
        echo "<br />Did nothing in $time seconds\n";
    }
    
    function assigntotest () {
        $this->load->model('bms_masters_model'); 
        $assign_to = $this->bms_masters_model->getAssignTo (151);
        echo "<pre>";
        
         $desi_arr = !empty($assign_to) ? array_column($assign_to,'desi_id') : array ();
         
         print_r($desi_arr);    
    }
    
}