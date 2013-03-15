<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
        $this->load->library('message');
    }

    public function index()
    {
        $data['current_page'] = 'login';
        $this->load->view('student/student_login_form', $data);
    }

    public function login($redirect_uri = NULL)
    {
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);
        $student = $this->student_model->authenticate($email, $password);

        if (empty($student)){
            $data['current_page'] = "index";
            $this->message->set("You have entered incorrect login information. Please try again:", "error");
            $this->load->view('student/student_login_form', $data);
        } else{
            //Set last login to now
            $this->student_model->set_last_login($student->student_id);

            $session_data = array('student_id'               => $student->student_id,
                                  'check_profile_completion' => true
                                  );

            $this->session->set_userdata($session_data);
            if($redirect_uri == "team_registration")
            	redirect("/team/add_form");
			else 
				redirect('/student');
        }
        
    }

    public function fb_login($redirect_uri = NULL)
    {
        $data["current_page"] = 'login';
        if (!is_null($redirect_uri))
            $redirect_uri = site_url($redirect_uri);

        $this->load->library('fb_connect');
        $user_id = $this->fb_connect->get_user_id();

        if(!$user_id):
            $login = $this->fb_connect->get_login_url($redirect_uri);
            redirect($login);
        endif;

        $user_profile = $this->fb_connect->get_user_info($user_id);

        if($user_profile):
            $uid = $user_profile['id'];
            $first_name = $user_profile['first_name'];
            $last_name = $user_profile['last_name'];
            $email = $user_profile['email'];
            $education = $user_profile['education'];

            //Check valid bc student
            $is_bc_student = strstr(json_encode($education), "Boston College");
            if(!$is_bc_student):
                $this->message->set("Sorry, You're not a BC student", "error");
                $data['current_page'] = "index";
                $this->load->view('student/student_login_form', $data);
                return;
            endif;

			$fb_login_confirmation = $this->session->userdata('fb_login_confirmed');

			if(!empty($fb_login_confirmation)):
				$student = $this->student_model->oauth_authenticate($uid, $email, $first_name, $last_name);
                if($student):
                    //Set last login to now
                    $this->student_model->set_last_login($student->student_id);

                    $session_data = array('student_id' => $student->student_id,
                                          'check_profile_completion' => true
                                        );
                    $this->session->set_userdata($session_data);
                    //In case the user is already logged into Facebook, set redirect_uri
                    if (!is_null($redirect_uri))
                        redirect($redirect_uri);
                    else
                        redirect('student/');
                endif;

			else:
            	//If there is an existing student NORMAL Account AND the student FB login is UNCONFIRMED, ask if they would like to connect the accounts
            	$existing_student = $this->student_model->check_for_existing_student($first_name, $last_name, $email, 'facebook');
           		if (!empty($existing_student)):
                	$this->session->set_userdata(array('temp_student_id' => $existing_student->student_id, 'oauth_uid' => $uid));
                	redirect('authentication/student/connect_fb_with_previous_account/');
            	else:
					$this->session->set_userdata(array('fb_login_confirmed' => TRUE));
                    if (!is_null($redirect_uri))
                        $this->fb_login(uri_string($redirect_uri));
                    else
                        $this->fb_login('authentication/student/fb_login');
            	endif;
			endif;
		endif;
		
		$this->message->set("We were unable to authenticate you through Facebook", "error");
        $this->load->view('student/student_login_form', $data);
    }
	
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }

    public function connect_fb_with_previous_account()
    {
        $data["current_page"] = 'student';
        $student_id = $this->session->userdata('temp_student_id');
        $data["student"] = $this->student_model->get_previous_student($student_id);

        if (empty($data["student"])){
            redirect('home');
        }

        $this->load->view('student/registration/connect_fb_with_previous_account', $data);
    }

    //Student has not tried to merge previous account with Facebook and wants to create a new Facebook account
    public function fb_login_confirmed()
    {
        $this->session->set_userdata(array('fb_login_confirmed' => TRUE));
        redirect('authentication/student/fb_login');
    }

    //A user has recognized they had a previous account and are attempting to login to merge with their Facebook account
    public function login_to_merge_with_facebook()
    {
        //Oauth_uid and student_id were set as flash session variables to hide from user for security reasons
        $oauth_uid = $this->session->userdata('oauth_uid');
        $student_id = $this->session->userdata('temp_student_id');
        $student = $this->student_model->get_previous_student($student_id);

        //If there is no student, redirect out
        if (empty($student)):
            $this->message->set('There was an error trying to process your request. Please contact BC Skills with this error.', 'error', TRUE);
            redirect('/');
            exit(1);
        //Else, check this student's login information
        else:
            $email = $student->email;
            $password = $this->input->post('password', TRUE);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('password', 'password', 'trim|required|htmlspecialchars|xss_clean');

            //If form does not validate according to rules above, load form view with error messages
            if ($this->form_validation->run() == FALSE):
                $data['current_page'] = "login";
                $student_id = $this->session->userdata('temp_student_id');

                $data["student"] = $this->student_model->get_previous_student($student_id);

                $this->load->view('student/registration/connect_fb_with_previous_account', $data);
            else:

                $logged_in_student = $this->student_model->authenticate($email, $password);

                if (empty($logged_in_student)):

                    $this->message->set("You have entered incorrect login information. Please try again:", "error", TRUE);
                    redirect('authentication/student/connect_fb_with_previous_account');
                else:

                    //Add FB oauth_uid to this account
                    $merge_account = $this->student_model->merge_with_fb_account($logged_in_student->student_id, $oauth_uid);

                    $session_data = array('student_id' => $logged_in_student->student_id
                    );

                    $this->session->set_userdata($session_data);
                    $this->message->set('You have successfully merged your Facebook account. Now you can log in with Facebook in the future!', 'success', TRUE);
                    redirect('student/');

                endif;
            endif;
        endif;
    }

    /*Redirect back from Facebook to a given page
    Ie- student wants to create an account to add a team; they login with Facebook
    and are redirected to the add team page
    */
    public function fb_login_and_redirect($redirect_uri)
    {
        switch($redirect_uri){
            case "add_team":
                $this->fb_login(array('team','add_form'));
                break;
            default:
                $this->fb_login();
                break;
        }
        
    }

}

/* End of file authentication/student.php */
/* Location: ./application/controllers/authentication/student.php */