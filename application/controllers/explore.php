<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 /**
  * Renders the data on BCSkills in a meaningful way
  * through visualizations.
  * @version 0.1
  */
class Explore extends MY_Controller 
{
    
    public function __construct() 
    {
        parent::__construct();
        $this -> load -> model('student_model');
    }

    public function index() 
    {
        $data['current_page'] = 'student';
        $data["notifications"] = $this->student_model->get_notifications($this->current_student_id);
        $this -> load -> view('explore/index', $data);
    }
    
    /**
     * Gets the distribution of user skills. For example:
     * Python - 25 users, PHP - 3 users.
     * @return JSON encoded string
     */
    public function get_skill_distribution() 
    {
        $skills_distribution = $this -> student_model -> get_student_skill_distribution();
        $skill_array = array();
        //push column name and value name
        array_push($skill_array, array("Skill", "Students"));
        foreach ($skills_distribution as $row) {
            $skill = $row -> skill;
            $num = $row -> num_students;
            array_push($skill_array, array($skill, $num + 0));
        }
        header("Content-type: application/json");
        echo json_encode($skill_array);
    }
    
}
/* End of file home.php */
/* Location: ./application/controllers/explore.php */
