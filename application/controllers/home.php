<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('student_model');
		$this->load->helper('authentication_helper');
		
		if(student_is_logged_in())
			redirect('student');
	}	

	public function index()
	{
		$this->load->view('home');
	}


}

/* End of file home.php */
/* Location: ./application/controllers/home.php */