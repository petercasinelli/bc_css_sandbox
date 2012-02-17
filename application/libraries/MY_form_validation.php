<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_form_validation extends CI_form_validation {

    function valid_url($str){

           $pattern = "/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i";
            if (!preg_match($pattern, $str))
            {
                return FALSE;
            }

            return TRUE;
    }
	

    /**
     * Real URL
     *
     * @access    public
     * @param    string
     * @return    string
     */
    function url_exists($url)
    {
       	$fp = fsockopen($url, 80, $errno, $errstr, 30);
		if (!$fp):
			$this->set_message('url_exists', 'The URL you entered is not accessible.');
			return FALSE;
		else:
			fclose($fp);
			return TRUE;
		endif;
		
    }
	
	function valid_date($date)
	{
		//Make sure a valid expiration date was entered
		$expiration_date = explode('/',$data);
		$month_expire = $expiration_date[0];
		$day_expire = $expiration_date[1];
		$year_expire = $expiration_date[2];
		
		if (checkdate($month_expire, $day_expire, $year_expire) == FALSE):		
        	$this->validation->set_message('valid_date', 'The %s field is invalid.');
        	return FALSE;
		endif;
	} 
	
}