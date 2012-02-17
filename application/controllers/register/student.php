<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('student_model');
		
		$this->load->helper('authentication_helper');
		
		if(student_is_logged_in())
			redirect('student');
	}	
	
	
	public function index(){
		
		//Create list of majors
		$data["majors"] = $this->student_model->get_majors();
		//$data["majors"] = $majors[0];
		//print_r($data["majors"]);
		$this->load->view('student/register_student_form', $data);
	}
	
	public function register(){
			
		$first 	  		  = $this->input->post('first',    		   TRUE);
		$last  	  		  = $this->input->post('last',     		   TRUE);
		$email 	  		  = $this->input->post('email',    		   TRUE);
		$password 		  = $this->input->post('password', 		   TRUE);
		$confirm_password = $this->input->post('confirm_password', TRUE);
		$year 	  		  = $this->input->post('year', 	  		   TRUE);
		$major 	  		  = $this->input->post('major',    		   TRUE);
		$bio 	  		  = $this->input->post('bio', 	  		   TRUE);
		$skills 	  	  = $this->input->post('skills', 	  	   TRUE);
		$programs 	  	  = $this->input->post('skills', 	  	   TRUE);
		$twitter 	  	  = $this->input->post('skills', 	  	   TRUE);
		$facebook 	  	  = $this->input->post('skills', 	  	   TRUE);
		$linkedin	  	  = $this->input->post('skills', 	  	   TRUE);
		$dribbble 	  	  = $this->input->post('skills', 	  	   TRUE);
		$github 	  	  = $this->input->post('skills', 	  	   TRUE);

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('first', 'first name', 					'trim|required|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('last', 'last promo', 					'trim|required|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('email', 'BC e-mail address', 			'trim|required|htmlspecialchars|xss_clean|valid_email|is_unique[students.email]');
		$this->form_validation->set_rules('password', 'password', 					'trim|required|htmlspecialchars|xss_clean|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'confirmed password', 'trim|required|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('year', 'year of graduation', 			'trim|required|htmlspecialchars|xss_clean|numeric|max_length[4]');
		$this->form_validation->set_rules('major', 'major', 						'trim|required|htmlspecialchars|xss_clean|numeric');
		$this->form_validation->set_rules('bio', 'bio', 							'trim|required|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('skills', 'skills',						'trim|required|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('programs', 'programs',					'trim|required|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('twitter', 'twitter',						'trim|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('facebook', 'facebook',					'trim|htmlspecialchars|xss_clean|valid_url');
		$this->form_validation->set_rules('linkedin', 'linkedin',					'trim|htmlspecialchars|xss_clean|valid_url');
		$this->form_validation->set_rules('dribbble', 'dribbble',					'trim|htmlspecialchars|xss_clean|valid_url');
		$this->form_validation->set_rules('github', 'github',						'trim|htmlspecialchars|xss_clean|valid_url');

		//If form does not validate according to rules above, load form view with error messages
		if ($this->form_validation->run() == FALSE):
			//Create list of majors
			$data["majors"] = $this->student_model->get_majors();				
			$this->load->view('student/register_student_form', $data);
		
		//Else, add student to database
		else:
			
			$student_data = array(
								 'first' 	=> $first,
								 'last'	 	=> $last,
								 'email' 	=> $email,
								 'password' => md5($password),
								 'year'		=> $year,
								 'major_id'	=> $major,
								 'bio' 		=> $bio,
								 'skills'	=> $skills,
								 'programs'	=> $programs,
								 'twitter'	=> $twitter,
								 'facebook'	=> $facebook,
								 'linkedin'	=> $linkedin,
								 'dribbble'	=> $dribbble,
								 'github'	=> $github
								 );
			
			$student_id = $this->student_model->add_student($student_data);
			
			redirect('authentication/student/login');
			
		endif;
		
	}
	
}

/* End of file authentication/student.php */
/* Location: ./application/controllers/authentication/student.php */