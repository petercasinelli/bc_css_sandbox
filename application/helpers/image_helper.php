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
			return "http://i0.kym-cdn.com/photos/images/original/000/074/586/tumblr_l7l1nqA5va1qdsweso1_1280.jpg?1318992465"; //dummy image
		endif;
	endif;
	
}

//end of image_helper.php