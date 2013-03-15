<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
        $this->load->helper('authentication_helper');
        if(student_is_logged_in())
            redirect('student');
    }

    public function index()
    {
        $data["majors"] = $this->student_model->get_majors();
        $data["schools"] = $this->student_model->get_schools();
        $data['current_page'] = 'register';
        
        $this->load->view('student/registration/sign_up', $data);
    }

    //Need to create sets of rules so I can redirect to login page rather than register page if user already has an account
    public function register()
    {
        $this->load->library('form_validation');
        $first = $this->input->post('first', TRUE);
        $last = $this->input->post('last', TRUE);
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);
        //If form does not validate according to rules above, load form view with error messages
        if (!$this->form_validation->valid_new_user()){
            $data['current_page'] = 'home';
            $this->load->view('student/registration/sign_up', $data);
        } else{
            $this->load->library('message');
            $student_data = array(
                'first' 	=> $first,
                'last'	 	=> $last,
                'email' 	=> $email,
                'password' => sha1($password),
            );

            $student_id = $this->student_model->add_student($student_data);
            $this->message->set("Welcome to BC Skills! To network the best, we recommend you complete your profile below.", "success", TRUE);
            //Log student in automatically and redirect to student logged in page
            $session_data = array('student_id'               => $student_id,
                                  'check_profile_completion' => true
                            );
            $this->session->set_userdata($session_data);
            redirect('student/');
        }
        
    }

}

/* End of file authentication/student.php */
/* Location: ./application/controllers/registration/student.php */