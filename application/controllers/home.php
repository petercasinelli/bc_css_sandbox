<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('student_model');
        $this->load->helper('authentication_helper');
        $this->load->library('message');
        if(student_is_logged_in())
            redirect('student');
    }

    public function index()
    {
        $data['current_page'] = 'index';
        $this->load->library('message');
        $this->load->view('home', $data);
    }

    public function about()
    {
        $data['current_page'] = 'about';
        $this->load->view('about', $data);
    }

    public function contact()
    {
        $data['current_page'] = 'contact';
        $this->load->view('contact', $data);
    }

    public function forgot_password(){

        $data["current_page"] = 'student';

        $this->load->view('student/forgot_password', $data);
    }

    public function reset_password(){

        $data["current_page"] = 'student';
        $email = $this->input->post('email', TRUE);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'e-mail address', 'trim|required|htmlspecialchars|xss_clean');


        //If form does not validate according to rules above, load form view with error messages
        if ($this->form_validation->run() == FALSE):

            $this->load->view('student/forgot_password', $data);

        else:
            $this->load->helper('string');
            $new_password = random_string('alnum', 10);

            //Attempt to reset password
            $reset_password = $this->student_model->reset_password($email, sha1($new_password));

            switch($reset_password):
                //0 means no e-mail was found
                case 0:
                    $this->message->set('You have entered an e-mail address that does not belong to any of our users. Please try again:', 'error', TRUE);
                    $this->load->view('student/forgot_password', $data);
                    break;
                //1 means pass was changed
                case 1:
                    //Send an e-mail


                    $this->load->library('email');
                    $this->email->set_newline("\r\n").
                    $this->email->from('bccss.development@gmail.com', 'BC Skills');
                    $this->email->to($email);

                    $this->email->subject('BC Skills Password Reset');
                    $this->email->message('Hello,

                    You recently requested to reset your password on BCSkills.com.

                    Here is your new password: ' . $new_password . '

                    Please let us know if you have any issues,

                    BC CSS Team');

                    if ($this->email->send()):
                        $this->message->set('We just sent '. $email .' a new password', 'success', TRUE);
                        redirect('home');
                    else:
                        echo $this->email->print_debugger();
                        exit;
                        $this->message->set('Your password could not be reset. Please try again. If this problem persists, please contact BC Skills.', 'error', TRUE);
                        redirect('/forgot_password');
                    endif;

                    break;
                //Some error
                default:
                    $this->message->set('There was an error when you tried to reset your password. Please try again:', 'error', TRUE);
                    $this->load->view('student/forgot_password', $data);
                    break;
            endswitch;

        endif;



    }

    public function register_and_add_team(){
        $data["current_page"] = 'add_team';
        $this->load->view('team/add_team', $data);
    }


}

/* End of file home.php */
/* Location: ./application/controllers/home.php */