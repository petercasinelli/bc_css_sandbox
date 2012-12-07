<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Explore extends CI_Controller {

    public function __construct(){
    	parent::__construct();
		$this->load->model('student_model');
    }

    public function index()
    {
        $data['current_page'] = 'index';
        $this->load->view('explore/index', $data);
    }
	
	public function get_skill_distribution(){
		
		$skills_distribution =  $this->student_model->get_student_skill_distribution();
		$skill_array = array();
		array_push($skill_array, array("Skill", "Students")); //push domain columns
		foreach($skills_distribution as $row){
			$skill = $row->skill;
			$num = $row->num_students;
			array_push($skill_array, array($skill, $num + 0)); //cast as int
		}

		header("Content-type: application/json");
		echo json_encode($skill_array);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */