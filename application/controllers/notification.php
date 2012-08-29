<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Extend MY_Controller for authentication/current student logged in built in
class Notification extends MY_Controller {

    public function __construct(){
        parent::__construct();

    }

    public function index()
    {
        $data["current_page"] = 'notification';
        $data["student_logged_in"] = $this->current_student_info;

        //Get a count of all notifications for this user and pass count to student/includes/navigation view
        $data["notifications"] = $this->student_model->get_notifications($this->current_student_id);

        $this->load->view('notification/home', $data);
    }

}

/* End of file notification.php */
/* Location: ./application/controllers/notification.php */