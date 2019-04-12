<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mailersend {
    
    function __construct() {

       $this->CI = & get_instance(); // get the CodeIgniter object
    	
    }

    function send_email($recipients, $subject, $message, $from, $from_name='') {

        //echo $recipient;
        
        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
                    <title>' . html_escape($subject) . '</title>
                    <style type="text/css">
                        body {
                            font-family: Arial, Verdana, Helvetica, sans-serif;
                            font-size: 16px;
                        }
                    </style>
                </head>
                <body>
                ' .$message. '
                </body>
                </html>';
                
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->CI->load->library('email');
        
        $this->CI->email
                    ->from($from,($from_name != '' ? $from_name : 'TRANSPACC BMS'))
                    ->reply_to($from,($from_name != '' ? $from_name : 'TRANSPACC BMS'));    // Optional, an account where a human being reads.
        
        /*$this->CI->email->to('naguwin@gmail.com','Nagarajan')                    
                    ->to('email@transpacc.com.my','Transpacc Emails');*/
                    
        foreach ($recipients as $key=>$val) {
            $this->CI->email->to($val['email_addr'],($val['first_name'].(!empty($val['last_name']) ? ' '.$val['last_name'] :'')));
        }             //->to($to,$r_name)
        $this->CI->email->bcc('naguwin@gmail.com','Nagarajan');
        /*            //->bcc('tanbenghwa@gmail.com')
                    ->bcc('email@transpacc.com.my','Transpacc Emails') */
        $this->CI->email->subject($subject)
                    ->message($message);
                    
        $result = $this->CI->email->send();
        
        if(!$result) {
                       //echo "Mailer Error: " . $mail->ErrorInfo;
                       return false;
        } else {
                       return true;
        }

    }
}

?>