<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("team_model");
        $this->load->library('message');
        $this->load->helper("image_helper");
        $this->load->helper("team_helper");
    }

    public function index($record_offset = 0)
    {
        $this->load->helper("image_helper");
        $this->load->library('pagination');
        $this->load->helper('pagination_helper');

        $data["current_page"] = 'team';
        $data["student_logged_in"] = $this->current_student_info;
        $data['teams'] = $this->team_model->get_teams($record_offset);
        $data = $this->set_notification($data, $this->current_student_id);
        $this->pagination->initialize(PaginationSettings::set( $this->team_model->get_total_team_count(), "team/index"));
        $this->load->view('team/home', $data);
    }

    /**
     * Individual team page view
     */
    public function view($team_id)
    {
        $this->load->helper("image_helper");

        if (empty($team_id)){
            redirect('team/');
        }
        
        $data["current_page"] = 'team';
        $data["student_logged_in"] = $this->current_student_info;
        $permission = $this->team_model->get_student_permission($team_id, $this->current_student_id);

        if (empty($permission)){
            $student_has_requested_to_join = $this->team_model->get_join_request($team_id, $this->current_student_id);

            if (empty($student_has_requested_to_join)){
                $data["student_has_requested_to_join"] = false;
            } else{
                $data["student_has_requested_to_join"] = true;
            }

        }

        $data["permission"] = $permission;
        $data['team_data'] = $this->team_model->get_team($team_id);
        $data['team_data']->team_members = $this->team_model->get_team_members($team_id);
        $data['team_updates'] = $this->team_model->get_updates($team_id);
        $data = $this->set_notification($data, $this->current_student_id);

        $this->load->view('team/view_team', $data);
    }

    public function add_form()
    {
        $data["current_page"] = 'team';
        $data["student_logged_in"] = $this->current_student_info;
        $data = $this->set_notification($data, $this->current_student_id);

        $this->load->view('team/add_team_form', $data);
    }

    public function add()
    {
        $this->load->library('form_validation');
        $data["current_page"] = 'team';
        $data = $this->set_notification($data, $this->current_student_id);

        $team_data['team_name'] = $this->input->post('team_name', TRUE);
        $team_data['bcvc_team'] = $this->input->post('bcvc_team', TRUE);
        $team_data['team_description'] = $this->input->post('team_description', TRUE);
        $team_data['team_needs'] = $this->input->post('team_needs', TRUE);
        
        //If form does not validate according to rules above, load form view with error messages
        if (!$this->form_validation->valid_team()){
            $data["student_logged_in"] = $this->current_student_info;
            $this->load->view('team/add_team_form', $data);
        } else{ //display students according to search term
            $this->load->model('team_model');
            //This automatically adds team with the current student being the administrator
            $team_id = $this->team_model->add_team($team_data, $this->current_student_id);
            if ($team_id > 0){
                $this->message->set("You have successfully added your team", "success", TRUE);
                $path = 'team/view/'.$team_id;
                redirect($path);
            } else{
                $this->message->set("Your team could not be added. Please try again.", "error", TRUE);
                redirect("team/add_form");
            }

       }

    }

    public function edit_form($team_id)
    {
        $this->load->helper('team_helper');
        //Check to see if this student is administrator and can access this page
        $permission = student_is_team_admin($team_id, $this->current_student_id);
        $data["current_page"] = 'team';
        $data["student_logged_in"] = $this->current_student_info;
        $data["team_data"] = $this->team_model->get_team($team_id);
        array_push($data, array("team_id" => $team_id));
        $data = $this->set_notification($data, $this->current_student_id);
        $this->load->view('team/edit_team_form', $data);
    }

    //Action of edit form to edit a team
    public function edit($team_id)
    {
        $this->load->helper('team_helper');
        $this->load->library('form_validation');
        //Check to see if this student is administrator and can access this page
        $permission = student_is_team_admin($team_id, $this->current_student_id);
        $data["current_page"] = 'team';
        $data = $this->set_notification($data, $this->current_student_id);
        
        $team_data['team_name'] = $this->input->post('team_name', TRUE);
        $team_data['bcvc_team'] = $this->input->post('bcvc_team', TRUE);
        $team_data['team_description'] = $this->input->post('team_description', TRUE);
        $team_data['team_needs'] = $this->input->post('team_needs', TRUE);

        //If form does not validate according to rules above, load form view with error messages
        if (!$this->form_validation->valid_team()){
            $data["student_logged_in"] = $this->current_student_info;
            $data["team_data"] = $this->team_model->get_team($team_id);
            array_push($data, array("team_id" => $team_id));
            $this->load->view('team/edit_team_form', $data);
        } else{
            $update_team = $this->team_model->update_team($team_id, $team_data, $this->current_student_id);
            
            if ($team_id > 0){
                $this->message->set("You have successfully edited your team", "success", TRUE);
                $path = 'team/view/'.$team_id;
                redirect($path);
            } else{
                $this->message->set("Your team could not be edited. Please try again.", "error", TRUE);
                redirect("team/edit_form");
            }
        }

    }

    public function add_update_form($team_id)
    {
        $this->load->helper('team_helper');
        //Check to see if this student is administrator and can access this page
        $permission = student_is_team_admin($team_id, $this->current_student_id);

        $data["current_page"] = 'team';
        $data["student_logged_in"] = $this->current_student_info;
        $data["team_data"] = $this->team_model->get_team($team_id);
        $data = $this->set_notification($data, $this->current_student_id);

        $this->load->view('team/add_team_update_form', $data);
    }

    //Need to validate that this student has appropriate permissions!
    public function add_update($team_id)
    {
        $this->load->helper('team_helper');
        $this->load->library('form_validation');
        //Check to see if this student is administrator and can access this page
        $permission = student_is_team_admin($team_id, $this->current_student_id);
        $data["current_page"] = 'team';
        $data = $this->set_notification($data, $this->current_student_id);
        $team_update = $this->input->post('team_update', TRUE);

        //If form does not validate according to rules above, load form view with error messages
        if (!$this->form_validation->valid_team_update()){
            $data["student_logged_in"] = $this->current_student_info;
            $data["team_data"] = $this->team_model->get_team($team_id);
            $this->load->view('team/add_team_update_form', $data);
        } else{
            $add_team_update = $this->team_model->add_update($team_id, $team_update, $this->current_student_id);

            if ($add_team_update > 0){
                $this->message->set("You have successfully added your team update.", "success", TRUE);
                $path = 'team/view/'.$team_id;
                redirect($path);
            } else{
                $this->message->set("Your team update could not be added. Please try again.", "error", TRUE);
                redirect("team/add_team_update_form");
            }
            
        }
    }

    public function delete_update($team_id, $team_update_id)
    {
        $this->load->helper('team_helper');
        //Check to see if this student is administrator and can access this page
        $permission = student_is_team_admin($team_id, $this->current_student_id);
        $delete_update = $this->team_model->delete_update($team_update_id);
        
        if ($delete_update > 0){
            $this->message->set("You have successfully deleted your team update.", "success", TRUE);
            redirect("team/view/".$team_id);
        } else{
            $this->message->set("Your team update could not be deleted.", "error", TRUE);
            redirect("team/view/".$team_id);
        }
        
    }

    //Request to join a team
    public function join($team_id)
    {
        $join_team = $this->team_model->join_request($team_id, $this->current_student_id);
        if ($join_team > 0){
            $this->message->set("You have requested to join this team. The team administrator has been notified.", "success", TRUE);
            redirect("team/view/".$team_id);
        } else{
            $this->message->set("Your request was not sent. Please try again.", "error", TRUE);
            redirect("team/view/".$team_id);
        }
    }

    public function accept_request($team_id, $student_id)
    {
        $this->load->helper('team_helper');
        //Check to see if this student is administrator and can access this page
        $permission = student_is_team_admin($team_id, $this->current_student_id);
        $accept_request = $this->team_model->accept_request($team_id, $student_id);
        
        if ($accept_request > 0){
            $this->message->set("You have accepted the student to this team!", "success", TRUE);
            redirect("team/view/".$team_id);
        } else{
            $this->message->set("You could not accept the student to the team. Please try again:", "error", TRUE);
            redirect("notification/");
        }

    }

    public function deny_request($team_id, $student_id)
    {
        $this->load->helper('team_helper');
        //Check to see if this student is administrator and can access this page
        $permission = student_is_team_admin($team_id, $this->current_student_id);
        $deny_request = $this->team_model->deny_request($team_id, $student_id);

        if ($deny_request > 0){
            $this->message->set("You have denied the student from joining your team.", "success", TRUE);
            redirect("team/view/".$team_id);
        } else{
            $this->message->set("You could not deny the student to the team. Please try again:", "error", TRUE);
            redirect("notification/");
        }
        
    }

    public function confirm_leave($team_id)
    {
        $data["team_id"] = $team_id;
        $data = $this->set_notification($data, $this->current_student_id);
        $data["current_page"] = "team";
        $this->load->view("team/confirm_leave", $data);
    }

    public function leave($team_id)
    {
        $leave_team = $this->team_model->remove_team_member($this->current_student_id, $team_id);

        if ($leave_team > 0){
            $this->message->set("You have left this team.", "success", TRUE);
            redirect("team/view/".$team_id);
        } else{
            $this->message->set("You could not leave this team. Please try again:", "error", TRUE);
            redirect("team/view/".$team_id);
        }

    }

}

/* End of file student.php */
/* Location: ./application/controllers/student.php */