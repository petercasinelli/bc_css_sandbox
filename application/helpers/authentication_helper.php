<?php

function student_is_logged_in(){
	$CI = & get_instance();
	return $CI->session->userdata('student_id' ) ? TRUE: FALSE;
}

class Authen
{
    public static function send_password($email, $new_password)
    {
        $CI = & get_instance();
        
        $CI->load->library('email');
        $CI->email->set_newline("\r\n").
        $CI->email->from('bccss.development@gmail.com', 'BC Skills');
        $CI->email->to($email);
        $CI->email->subject('BC Skills Password Reset');
        $CI->email->message('Hello,

        You recently requested to reset your password on BCSkills.com.

        Here is your new password: ' . $new_password . '

        Please let us know if you have any issues,

        BC CSS Team');
        
        return $CI->email->send();
    }
}
    //end of authentication_helper.php