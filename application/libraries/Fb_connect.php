<?php
class Fb_connect{
	
	public $CI;
	public $config;
	
	public function __construct(){
		$this->CI = &get_instance();
		$this->config = array(
  			'appId'  => '158785734227653',
  			'secret' => 'd8dcb9f6d5e8ac274d75d24526156be6',
		);
		$this->CI->load->library('facebook-php-sdk/src/facebook', $this->config, 'facebook');
	}

	public function get_user_id(){
		return $this->CI->facebook->getUser();
	}
	
	public function get_login_url(){
	  	return $this->CI->facebook->getLoginUrl();
	}
	
	public function get_user_info($user_id){
		if ($user_id):
  			try{
    			// Proceed knowing you have a logged in user who's authenticated.
			    $user_profile = $this->CI->facebook->api('/me');
				return $user_profile;
  			} catch (FacebookApiException $e) {
   			 	error_log($e);
    			$user_id = null;
				return False;
  			}
		endif;
	}
}



?>