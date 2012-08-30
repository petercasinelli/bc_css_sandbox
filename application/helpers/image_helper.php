<?php

function student_picture_src($student_id, $oauth_uid, $picture){
	
	$CI =& get_instance();
	$CI->load->helper("path_helper");
	$student_pic_url = student_picture_url();
	
	if($picture):
		return $student_pic_url . $picture;
	else:
		if($oauth_uid):
			return "https://graph.facebook.com/". $oauth_uid . "/picture?type=large"; //high resolution
		else:
			return base_url() . 'assets/images/blank_person.png'; //dummy image
		endif;
	endif;
	
}

//end of image_helper.php