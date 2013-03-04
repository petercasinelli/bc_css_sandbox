<?php

function profile_completed($student_info) {
	$total = 0;
	$score = 0;
	//set up point system with relevant fields
    $point_map = array(
    'first' => 1, 
    'last' => 1, 
    'school_id' => 1, 
    'year' => 1, 
    'major_id' => 1, 
    'bio' => 1, 
    'picture' => 1, 
    'skills' => 1,
     //add point if profile includes any of the listed networks
    'social_media' => array('points' => 1, 'found' => false, 'fields' => array('twitter', 'facebook', 'linkedin', 'dribbble', 'github')));
	//FB users always have a picture. If one isn't uploaded, add to keep total consistent.
	if(!empty($student_info->oauth_uid) && empty($student_info->picture)) { 
		$score += 1;
    }
	//get total points
	foreach($point_map as $key=>$value) {
		$total += (is_array($value)) ? $value['points'] : $value;
    }
	//tally up score
	foreach($student_info as $key=>$value) {
		if(array_key_exists($key, $point_map) && !empty($value)) {
			$score += $point_map[$key];
		} elseif(in_array($key, $point_map['social_media']['fields']) 
		          && !$point_map['social_media']['found'] 
		          && !empty($value)) {
			$score += $point_map['social_media']['points'];
			$point_map['social_media']['found'] = true;
        }
	}
	//get result
	$result = number_format(($score / $total)*100);
	//keep it a factor of 5
	$percent = $result - ($result % 5);
	return $percent . '%';
}

function profile_fill_notification($data, $current_student){
    $CI = &get_instance();
    
    if ($CI->session->userdata('check_profile_completion')) {
        $profile_missing = array();
        
        if(empty($current_student->bio)) {
            array_push($profile_missing, 'bio');
        }
        
        if(empty($current_student->skills)) {
            array_push($profile_missing, 'skills');
        }
        
        if(!empty($profile_missing)) {
            $data["profile_missing"] = $profile_missing;
        }
        
        $CI->session->set_userdata('check_profile_completion', false);
    }
    
    return $data;
}

function get_user_skill_list($student_skills, $keep_trailing_comma = false){
    $skills = "";
    
    foreach($student_skills as $skill) {
        $skills .= $skill->skill . ', ';
    }
    
    if($keep_trailing_comma) {
        return $skills;
    }
    
    if(!empty($skills)) {
        $skills = substr($skills, 0, -2);
    }

    return $skills;
}
/*End of helpers/studentprofile_helper.php*/ 