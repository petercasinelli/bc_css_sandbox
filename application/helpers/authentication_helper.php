<?php

function student_is_logged_in(){
	$CI = & get_instance();
	return $CI->session->userdata('student_id') ? TRUE: FALSE;
}

//end of authentication_helper.php