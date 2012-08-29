<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    private $ci;

    public function __construct() {
        $ci = &get_instance();
        parent::__construct();
    }
	
	public function bc_email($email){
		
		//Separate email domain from username in email address
		$matched = preg_match("/[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@bc\.edu/", $email);	
		if ($matched):
			return TRUE;
		else:
			$this->set_message('bc_email', 'You must have a Boston College e-mail address');
			return FALSE;
		endif;
	}
	
	public function valid_graduation_year($year)
	{
		
		$current_year = date("Y");
		
		if ($year < $current_year):
			$this->set_message('valid_graduation_year', 'You must be a current Boston College student.');
			return FALSE;
		else:
			return TRUE;
		endif;
	}
	
	public function valid_date($date)
	{
		//Make sure a valid expiration date was entered
		$expiration_date = explode('/',$data);
		$month_expire = $expiration_date[0];
		$day_expire = $expiration_date[1];
		$year_expire = $expiration_date[2];
		
		if (checkdate($month_expire, $day_expire, $year_expire) == FALSE):		
        	$this->set_message('valid_date', 'The %s field is invalid.');
        	return FALSE;
		endif;
	} 
	
	
	
}