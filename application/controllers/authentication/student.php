<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('student_model');
	}	
	
	
	public function index(){
		
		$this->load->view('student/student_login_form');
	}
	
	public function login(){
		
		$email = $this->input->post('email', TRUE);
		$password = $this->input->post('password', TRUE);
		
		$student = $this->student_model->authenticate($email, $password);
		
		if (empty($student)):
			echo 'You have entered incorrect login information. Please try again:';
			$this->load->view('student/student_login_form');
		else:
			//We only want one result (and should only be passed one result)
			$student = $student[0];
			
			$session_data = array('student_id' => $student->student_id
								  );
			
			$this->session->set_userdata($session_data);
			//echo 'Logged in as ' . $this->session->userdata('student_id');
			redirect('student/');
			
		endif;
		
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
	
}

/* End of file authentication/student.php */
/* Location: ./application/controllers/authentication/student.php */