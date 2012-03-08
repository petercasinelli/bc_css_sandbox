<?php
class MY_Controller extends CI_Controller {
	
	protected $current_student_id;
	protected $current_student_info;
	
    function __construct()
    {
        parent::__construct();
		$this->load->model('student_model');
		
		$this->load->helper('authentication_helper');
		if(!student_is_logged_in()):
			redirect('/');
			exit(1);
		endif;
		
		$this->current_student_id = $this->session->userdata('student_id');
		$this->current_student_info = $this->student_model->get_student($this->current_student_id);
		

    }
	
}


?>