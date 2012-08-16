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
		
		//Create list of schools
		$data["schools"] = $this->student_model->get_schools();
		
		$data['current_page'] = 'register';
		$this->load->view('student/registration/sign_up', $data);
	}
	
	public function register(){
		
		/*$first 	  		  = $this->input->post('first',    		   TRUE);
		$last  	  		  = $this->input->post('last',     		   TRUE);*/
		$name			  = $this->input->post('name',			   TRUE);
		$email 	  		  = $this->input->post('email',    		   TRUE);
		$password 		  = $this->input->post('password', 		   TRUE);
		/*$confirm_password = $this->input->post('confirm_password', TRUE);
		$year 	  		  = $this->input->post('year', 	  		   TRUE);
		$school	  		  = $this->input->post('school',   		   TRUE);
		$major 	  		  = $this->input->post('major',    		   TRUE);
		$bio 	  		  = $this->input->post('bio', 	  		   TRUE);
		$skills 	  	  = $this->input->post('skills', 	  	   TRUE);
		$software 	  	  = $this->input->post('software', 	  	   TRUE);
		$twitter 	  	  = $this->input->post('twitter', 	  	   TRUE);
		$facebook 	  	  = $this->input->post('facebook', 	  	   TRUE);
		$linkedin	  	  = $this->input->post('linkedin', 	  	   TRUE);
		$dribbble 	  	  = $this->input->post('dribbble', 	  	   TRUE);
		$github 	  	  = $this->input->post('github', 	  	   TRUE);*/

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name', 'full name', 					'trim|required|htmlspecialchars|xss_clean');
		
		//$this->form_validation->set_rules('first', 'first name', 					'trim|required|htmlspecialchars|xss_clean');
		//$this->form_validation->set_rules('last', 'last promo', 					'trim|required|htmlspecialchars|xss_clean');
		
		//Add custom validation for e-mail addresses so that only Boston College students can register
		$this->form_validation->set_rules('email', 'BC e-mail address', 			'trim|required|htmlspecialchars|xss_clean|valid_email|bc_email|is_unique[students.email]');
		$this->form_validation->set_rules('password', 'password', 					'trim|required|htmlspecialchars|xss_clean|'); //matches[confirm_password]');
		/*$this->form_validation->set_rules('confirm_password', 'confirmed password', 'trim|required|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('year', 'year of graduation', 			'trim|required|htmlspecialchars|xss_clean|numeric|max_length[4]|valid_graduation_year');
		$this->form_validation->set_rules('school', 'school', 						'trim|required|htmlspecialchars|xss_clean|numeric');
		$this->form_validation->set_rules('major', 'major', 						'trim|required|htmlspecialchars|xss_clean|numeric');
		$this->form_validation->set_rules('bio', 'bio', 							'trim|required|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('skills', 'skills',						'trim|required|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('software', 'software',					'trim|required|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('twitter', 'twitter',						'trim|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('facebook', 'facebook',					'trim|htmlspecialchars|xss_clean|valid_url');
		$this->form_validation->set_rules('linkedin', 'linkedin',					'trim|htmlspecialchars|xss_clean|valid_url');
		$this->form_validation->set_rules('dribbble', 'dribbble',					'trim|htmlspecialchars|xss_clean|valid_url');
		$this->form_validation->set_rules('github', 'github',						'trim|htmlspecialchars|xss_clean|valid_url');
*/
		//If form does not validate according to rules above, load form view with error messages
		if ($this->form_validation->run() == FALSE):
			/*//Create list of majors
			$data["majors"] = $this->student_model->get_majors();	
			$data["schools"] = $this->student_model->get_schools();	*/		
			$this->load->view('student/registration/sign_up');
		
		//Else, add student to database
		else:
			
			/****** Parse the first and last names ******/
			
			$name_parts = explode(" ", $name);
			$size_of_name_parts = count($name_parts);
			
			$first = $name_parts[0];
			$last = "";
			
			//If user entered First Last, then separate Last
			if ($size_of_name_parts == 2)
				$last = $name_parts[1];
			//If user entered First Middle Last, or any variation of First Name Name Name Name Last
			else if ($size_of_name_parts > 2){
				$last = $name_parts[$size_of_name_parts-1];
				
			for ($i = 1; $i < $size_of_name_parts - 1; $i++)
				$first = $first . ' ' . $name_parts[$i];
				
			}
			

			$student_data = array(
								 'first' 	=> $first,
								 'last'	 	=> $last,
								 'email' 	=> $email,
								 'password' => sha1($password),
								 /*'year'		=> $year,
								 'school_id'=> $school,
								 'major_id'	=> $major,
								 'bio' 		=> $bio,
								 'skills'	=> $skills,
								 'software'	=> $software,
								 'twitter'	=> $twitter,
								 'facebook'	=> $facebook,
								 'linkedin'	=> $linkedin,
								 'dribbble'	=> $dribbble,
								 'github'	=> $github*/
								 );
			
			$student_id = $this->student_model->add_student($student_data);
			
			$this->load->library('message');
			$this->message->set("You have successfully registered. Please login below:", "success", TRUE);
			redirect('authentication/student/');
			
		endif;
		
	}

	
}

/* End of file authentication/student.php */
/* Location: ./application/controllers/authentication/student.php */