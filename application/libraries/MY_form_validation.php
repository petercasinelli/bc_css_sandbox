<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation 
{
    private $ci;
    
    public function __construct() 
    {
        $this->ci = &get_instance();
        parent::__construct();
    }
    
    public function valid_profile_edit($password)
    {
        $this->set_rules('first', 'first name',                    'trim|required|htmlspecialchars|xss_clean');
        $this->set_rules('last', 'last name',                      'trim|required|htmlspecialchars|xss_clean');
        $this->set_rules('email', 'e-mail address',                'trim|required|htmlspecialchars|xss_clean');
        
        if (!empty($password)){
            $this->set_rules('password', 'password',                   'trim|required|htmlspecialchars|xss_clean|matches[confirm_password]');
            $this->set_rules('confirm_password', 'confirmed password', 'trim|required|htmlspecialchars|xss_clean');
        }

        $this->set_rules('year', 'year of graduation',             'trim|htmlspecialchars|xss_clean|numeric|max_length[4]|valid_graduation_date');
        $this->set_rules('school', 'school',                       'trim|htmlspecialchars|xss_clean|numeric');
        $this->set_rules('major', 'major',                         'trim|htmlspecialchars|xss_clean|numeric');
        $this->set_rules('status', 'status',                       'trim|htmlspecialchars|xss_clean');
        $this->set_rules('bio', 'bio',                             'trim|htmlspecialchars|xss_clean');
        $this->set_rules('skills', 'skills',                       'trim|htmlspecialchars|xss_clean');
        $this->set_rules('software', 'software',                   'trim|htmlspecialchars|xss_clean');
        $this->set_rules('twitter', 'twitter',                     'trim|htmlspecialchars|xss_clean');
        $this->set_rules('facebook', 'facebook',                   'trim|htmlspecialchars|xss_clean|valid_url');
        $this->set_rules('linkedin', 'linkedin',                   'trim|htmlspecialchars|xss_clean|valid_url');
        $this->set_rules('dribbble', 'dribbble',                   'trim|htmlspecialchars|xss_clean|valid_url');
        $this->set_rules('github', 'github',                       'trim|htmlspecialchars|xss_clean|valid_url');
        
        return $this->run();
    }
	
	public function bc_email($email)
	{
		//Separate email domain from username in email address
		$matched = preg_match("/[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@bc\.edu/", $email);	
		if ($matched) {
			return TRUE;
		} else {
			$this->set_message('bc_email', 'You must have a Boston College e-mail address');
			return FALSE;
	   }
        
	}
	
	public function valid_graduation_year($year)
	{
		$current_year = date("Y");
		if ($year < $current_year) {
			$this->set_message('valid_graduation_year', 'You must be a current Boston College student.');
			return FALSE;
		} else {
			return TRUE;
        }
        
	}
	
	public function valid_date($date)
	{
		//Make sure a valid expiration date was entered
		$expiration_date = explode('/',$data);
		$month_expire = $expiration_date[0];
		$day_expire = $expiration_date[1];
		$year_expire = $expiration_date[2];
		
		if (checkdate($month_expire, $day_expire, $year_expire) == FALSE){	
        	$this->set_message('valid_date', 'The %s field is invalid.');
        	return FALSE;
        }
        
	} 
	
}

/* End of file MY_form_validation.php */
/* Location: ./application/libraries/MY_form_validation.php */