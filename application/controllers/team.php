<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Extend MY_Controller for authentication/current student logged in built in
class Team extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("team_model");
        $this->load->library('message');
        $this->load->helper("image_helper");
    }

    public function index($record_offset = 0)
    {

        $this->load->helper("image_helper");

        $this->load->library('pagination');
        $this->load->helper('pagination_helper');

        $data["current_page"] = 'team';
        $data["student_logged_in"] = $this->current_student_info;
        $data['teams'] = $this->team_model->get_teams($record_offset);

        foreach($data['teams'] as $key => $team):
            $team->team_members = $this->team_model->get_team_members($team->team_id);
            //$data['teams'][$key]->teams = $this->team_model->get_team_members($team->team_id);
        endforeach;

        $data["notifications"] = $this->student_model->get_notifications($this->current_student_id);

        $this->pagination->initialize(PaginationSettings::set( $this->team_model->get_total_team_count(), "/team/index"));
        $this->load->view('team/home', $data);
    }

    //View an individual team $team_id
    public function view($team_id){

        $this->load->helper("image_helper");

        if (empty($team_id)):
            redirect('team/');
        endif;

        $data["current_page"] = 'team';
        $data["student_logged_in"] = $this->current_student_info;

        $permission = $this->team_model->get_student_permission($team_id, $this->current_student_id);

        if (empty($permission)):
            //Student logged in is not a member
            //Check to see if this student has requested to join this team
            $student_has_requested_to_join = $this->team_model->get_join_request($team_id, $this->current_student_id);

            if (empty($student_has_requested_to_join)):
                $data["student_has_requested_to_join"] = false;
            else:
                $data["student_has_requested_to_join"] = true;
            endif;

        endif;

        $data["permission"] = $permission;


        $data['team_data'] = $this->team_model->get_team($team_id);
        $data['team_data']->team_members = $this->team_model->get_team_members($team_id);


        foreach($data['team_data']->team_members as $student):

            $student_skills = $this->student_model->get_student_skills($this->current_student_id);
            $student->skills = '';

            foreach($student_skills as $skill):
                $student->skills = $student->skills . $skill->skill . ', ';
            endforeach;

        endforeach;

        $data['team_updates'] = $this->team_model->get_updates($team_id);

        $data["notifications"] = $this->student_model->get_notifications($this->current_student_id);

        $this->load->view('team/view_team', $data);

    }

    public function add_form()
    {
        $data["current_page"] = 'team';
        $data["student_logged_in"] = $this->current_student_info;

        $data["notifications"] = $this->student_model->get_notifications($this->current_student_id);

        $this->load->view('team/add_team_form', $data);
    }

    public function add()
    {

        $data["current_page"] = 'team';
        $data["notifications"] = $this->student_model->get_notifications($this->current_student_id);

        $team_name = $this->input->post('team_name', TRUE);
        $team_description = $this->input->post('team_description', TRUE);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('team_name', 'team name', 'trim|required|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('team_description', 'team description', 'trim|required|htmlspecialchars|xss_clean');

        //If form does not validate according to rules above, load form view with error messages
        if ($this->form_validation->run() == FALSE):

            $data["student_logged_in"] = $this->current_student_info;
            $this->load->view('team/add_team_form', $data);

        //Else, display students according to search term
        else:

            $this->load->model('team_model');

            $team_data = array('team_name' => $team_name,
                'team_description' => $team_description
            );

            //This automatically adds team with the current student being the administrator
            $team_id = $this->team_model->add_team($team_data, $this->current_student_id);

            if ($team_id > 0):
                $this->message->set("You have successfully added your team", "success", TRUE);
                $path = 'team/view/'.$team_id;

                redirect($path);
            else:
                $this->message->set("Your team could not be added. Please try again.", "error", TRUE);
                redirect("team/add_form");
            endif;

        endif;

    }


    //Form displayed to edit a team
    public function edit_form($team_id){
        $this->load->helper('team_helper');

        //Check to see if this student is administrator and can access this page
        $permission = student_is_team_admin($team_id, $this->current_student_id);

        $data["current_page"] = 'team';
        $data["student_logged_in"] = $this->current_student_info;

        $data["team_data"] = $this->team_model->get_team($team_id);
        array_push($data, array("team_id" => $team_id));

        $data["notifications"] = $this->student_model->get_notifications($this->current_student_id);

        $this->load->view('team/edit_team_form', $data);
    }

    //Action of edit form to edit a team
    public function edit($team_id){

        $this->load->helper('team_helper');

        //Check to see if this student is administrator and can access this page
        $permission = student_is_team_admin($team_id, $this->current_student_id);

        $data["current_page"] = 'team';
        $data["notifications"] = $this->student_model->get_notifications($this->current_student_id);

        $team_name = $this->input->post('team_name', 			   TRUE);
        $team_description = $this->input->post('team_description', TRUE);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('team_name', 'team name', 'trim|required|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('team_description', 'team description', 'trim|required|htmlspecialchars|xss_clean');

        //If form does not validate according to rules above, load form view with error messages
        if ($this->form_validation->run() == FALSE):

            $data["student_logged_in"] = $this->current_student_info;
            $this->load->view('team/edit_team_form', $data);

        else:

            $team_data = array('team_name' => $team_name,
                'team_description' => $team_description
            );

            $update_team = $this->team_model->update_team($team_id, $team_data, $this->current_student_id);

            if ($team_id > 0):
                $this->message->set("You have successfully edited your team", "success", TRUE);
                $path = 'team/view/'.$team_id;

                redirect($path);
            else:
                $this->message->set("Your team could not be edited. Please try again.", "error", TRUE);
                redirect("team/edit_form");
            endif;


        endif;

    }

    public function add_update_form($team_id){
        $this->load->helper('team_helper');
        //Check to see if this student is administrator and can access this page
        $permission = student_is_team_admin($team_id, $this->current_student_id);

        $data["current_page"] = 'team';
        $data["student_logged_in"] = $this->current_student_info;
        $data["team_data"] = $this->team_model->get_team($team_id);

        $data["notifications"] = $this->student_model->get_notifications($this->current_student_id);

        $this->load->view('team/add_team_update_form', $data);
    }

    //Need to validate that this student has appropriate permissions!
    public function add_update($team_id){
        $this->load->helper('team_helper');
        //Check to see if this student is administrator and can access this page
        $permission = student_is_team_admin($team_id, $this->current_student_id);

        $data["current_page"] = 'team';
        $data["notifications"] = $this->student_model->get_notifications($this->current_student_id);

        $team_update = $this->input->post('team_update', TRUE);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('team_update', 'team update', 'trim|required|htmlspecialchars|xss_clean');

        //If form does not validate according to rules above, load form view with error messages
        if ($this->form_validation->run() == FALSE):

            $data["student_logged_in"] = $this->current_student_info;
            $data["team_data"] = $this->team_model->get_team($team_id);

            $this->load->view('team/add_team_update_form', $data);

        else:

            $add_team_update = $this->team_model->add_update($team_id, $team_update, $this->current_student_id);


            if ($add_team_update > 0):
                $this->message->set("You have successfully added your team update.", "success", TRUE);
                $path = 'team/view/'.$team_id;

                redirect($path);
            else:
                $this->message->set("Your team update could not be added. Please try again.", "error", TRUE);
                redirect("team/add_team_update_form");
            endif;


        endif;
    }

    public function delete_update($team_id, $team_update_id){
        $this->load->helper('team_helper');
        //Check to see if this student is administrator and can access this page
        $permission = student_is_team_admin($team_id, $this->current_student_id);

        $delete_update = $this->team_model->delete_update($team_update_id);
        if ($delete_update > 0):
            $this->message->set("You have successfully deleted your team update.", "success", TRUE);
            redirect("team/view/".$team_id);
        else:
            $this->message->set("Your team update could not be deleted.", "error", TRUE);
            redirect("team/view/".$team_id);
        endif;
    }

    //Request to join a team
    public function join($team_id){

        $join_team = $this->team_model->join_request($team_id, $this->current_student_id);

        if ($join_team > 0):
            $this->message->set("You have requested to join this team. The team administrator has been notified.", "success", TRUE);
            redirect("team/view/".$team_id);
        else:
            $this->message->set("Your request was not sent. Please try again.", "error", TRUE);
            redirect("team/view/".$team_id);
        endif;
    }

    public function accept_request($team_id, $student_id){
        $this->load->helper('team_helper');
        //Check to see if this student is administrator and can access this page
        $permission = student_is_team_admin($team_id, $this->current_student_id);

        $accept_request = $this->team_model->accept_request($team_id, $student_id);

        if ($accept_request > 0):
            $this->message->set("You have accepted the student to this team!", "success", TRUE);
            redirect("team/view/".$team_id);
        else:
            $this->message->set("You could not accept the student to the team. Please try again:", "error", TRUE);
            redirect("notification/");
        endif;


    }

    public function deny_request($team_id, $student_id){
        $this->load->helper('team_helper');
        //Check to see if this student is administrator and can access this page
        $permission = student_is_team_admin($team_id, $this->current_student_id);

        $deny_request = $this->team_model->deny_request($team_id, $student_id);

        if ($deny_request > 0):
            $this->message->set("You have denied the student from joining your team.", "success", TRUE);
            redirect("team/view/".$team_id);
        else:
            $this->message->set("You could not deny the student to the team. Please try again:", "error", TRUE);
            redirect("notification/");
        endif;
    }

    public function confirm_leave($team_id){

        $data["team_id"] = $team_id;
        $data["notifications"] = $this->student_model->get_notifications($this->current_student_id);
        $data["current_page"] = "team";
        $this->load->view("team/confirm_leave", $data);

    }

    public function leave($team_id){

        $leave_team = $this->team_model->remove_team_member($this->current_student_id, $team_id);

        if ($leave_team > 0):
            $this->message->set("You have left this team.", "success", TRUE);
            redirect("team/view/".$team_id);
        else:
            $this->message->set("You could not leave this team. Please try again:", "error", TRUE);
            redirect("team/view/".$team_id);
        endif;

    }

}

/* End of file student.php */
/* Location: ./application/controllers/student.php */