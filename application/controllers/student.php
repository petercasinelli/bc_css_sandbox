<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('student_model');
		$this->load->helper('authentication_helper');
		
		if(!student_is_logged_in()):
			redirect('/');
			exit(1);
		endif;
		
	}	

	public function index()
	{
		//Get the student's information (who is currently logged in)
		$student_logged_in = $this->session->userdata('student_id');
		$data["student_logged_in"] = $this->student_model->get_student($student_logged_in);
		
		//Retrieve all students information to send to view
		$data["students"] = $this->student_model->get_all_students();
		
		$this->load->view('student/home', $data);
	}
	
	public function view($student_id)
	{
		$data["student_id"] = $this->session->userdata("student_id");
		$data["student"] = $this->student_model->get_student($student_id);
		$this->load->view('student/view_student', $data);
		
	}

	public function search_form()
	{

		$this->load->view('student/search_student_form');

	}
	
	public function search()
	{
		
		
		$query = $this->input->post('query', TRUE);
		
		if (strpos(",", $query) != FALSE)
			$query_exploded = explode(',', $query);
		else
			$query_exploded = explode(' ', $query);

		$data["students"] = $this->student_model->search_students($query_exploded);
		
		$student_logged_in = $this->session->userdata('student_id');
		$data["student_logged_in"] = $this->student_model->get_student($student_logged_in);
		
		$data["search_query"] = $query;
		
		$this->load->view('student/view_students', $data);
	}
	

	
	public function edit_form(){
		
		$student_logged_in = $this->session->userdata('student_id');
		$data["student_logged_in"] = $this->student_model->get_student($student_logged_in);
		
		$data["student"] = $this->student_model->get_student($student_logged_in);
		
		$this->load->view('student/edit_student_form', $data);
	}
	
	public function edit(){
		
		$student_id = $this->session->userdata('student_id');		
		
		$first 	  		  = $this->input->post('first',    		   TRUE);
		$last  	  		  = $this->input->post('last',     		   TRUE);
		$email 	  		  = $this->input->post('email',    		   TRUE);
		$password 		  = $this->input->post('password', 		   TRUE);
		$confirm_password = $this->input->post('confirm_password', TRUE);
		$year 	  		  = $this->input->post('year', 	  		   TRUE);
		$major 	  		  = $this->input->post('major',    		   TRUE);
		$bio 	  		  = $this->input->post('bio', 	  		   TRUE);
		$skills 	  	  = $this->input->post('skills', 	  	   TRUE);

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('first', 'first name', 					'trim|required|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('last', 'last promo', 					'trim|required|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('email', 'BC e-mail address', 			'trim|required|htmlspecialchars|xss_clean|valid_email');
		$this->form_validation->set_rules('password', 'password', 					'trim|required|htmlspecialchars|xss_clean|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'confirmed password', 'trim|required|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('year', 'year of graduation', 			'trim|required|htmlspecialchars|xss_clean|numeric|max_length[4]');
		$this->form_validation->set_rules('major', 'major', 						'trim|required|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('bio', 'bio', 							'trim|required|htmlspecialchars|xss_clean');

		//If form does not validate according to rules above, load form view with error messages
		if ($this->form_validation->run() == FALSE):	
				
			$data["student"] = $this->student_model->get_student($student_id);
			$this->load->view('student/edit_student_form', $data);
		
		//Else, add student to database
		else:
			
			$student_data = array(
								 'first' 	=> $first,
								 'last'	 	=> $last,
								 'email' 	=> $email,
								 'password' => $password,
								 'year'		=> $year,
								 'major' 	=> $major,
								 'bio' 		=> $bio,
								 'skills'	=> $skills
								 );
			
			$rows_affected = $this->student_model->edit_student($student_id, $student_data);
			if ($rows_affected):
				echo 'Student edited successfully';
			else:
				echo 'This student could not be edited';
			endif;
			
		endif;
		
	}
	

}

/* End of file student.php */
/* Location: ./application/controllers/student.php */