<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Extend MY_Controller for authentication/current student logged in built in
class Team extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
        $this->load->model("team_model");
		
	}	

	public function index()
	{
		$data["student_logged_in"] = $this->current_student_info;
		$data['teams'] = $this->team_model->get_teams();
		foreach($data['teams'] as $team){
			$team_members[$team->team_id] = $this->team_model->get_team_members($team->team_id);
		}
		$data['team_members'] = $team_members;
		$this->load->view('team/home', $data);
	}

    //View an individual team $team_id
	public function view($team_id){
		
		if (empty($team_id)):
			redirect('team/');
		endif;
		
		$data["student_logged_in"] = $this->current_student_info;

        //TO DO ** Need to ping model to get team information and pass it to view_team view through $data array
        $data['team'] = $this->team_model->get_team($team_id);
        $data['team_members'] = $this->team_model->get_team_members($team_id);
        
		$this->load->view('team/view_team', $data);
	
	}
	
	/*public function index($team_id){
		echo "Team: $team_id";
	}*/
	
	public function add_form()
	{
		$data["student_logged_in"] = $this->current_student_info;
		$this->load->view('team/add_team_form', $data);	
	}

	public function add()
	{
				
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
			
			$this->load->library('message');
			
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

		$data["student_logged_in"] = $this->current_student_info;

        $data["team_data"] = $this->team_model->get_team($team_id);
        array_push($data, array("team_id" => $team_id));

		$this->load->view('team/edit_team_form', $data);
	}
	
	//Action of edit form to edit a team
	public function edit($team_id){		
		
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

            $this->load->library('message');

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
	
	
		
	/*Future feature to view individual profile page
	public function view($student_id)
	{
		
	}*/

}

/* End of file student.php */
/* Location: ./application/controllers/student.php */