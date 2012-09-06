<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Extend MY_Controller for authentication/current student logged in built in
class Student extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper("image_helper");
    }

    public function index()
    {
        $this->load->model("student_model");
        $this->load->model("team_model");

        $this->load->helper('studentprofile_helper');
        $data["current_page"] = 'index';
        $data["student_logged_in"] = $this->current_student_info;

        //Retrieve 2 new students/teams and send to view
        $data["new_students"] = $this->student_model->get_new_students(2);
        $data["new_teams"] = $this->team_model->get_new_teams(2);
        foreach($data["new_teams"] as $new_team):
            $new_team->team_members = $this->team_model->get_team_members($new_team->team_id);
        endforeach;

        $data['profile_completion'] = profile_completed($this->current_student_info);

        //Get a count of all notifications for this user and pass count to student/includes/navigation view
        $data["notifications"] = $this->student_model->get_notifications($this->current_student_id);

        $this->load->view('student/home', $data);
    }

    public function search()
    {
        $data["current_page"] = 'student';

        $query = $this->input->post('query', TRUE);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('query', 'search terms', 'trim|required|htmlspecialchars|xss_clean');

        //If form does not validate according to rules above, load form view with error messages
       /* if ($this->form_validation->run() == FALSE):

            $data["student_logged_in"] = $this->current_student_info;
            $this->load->view('student/home', $data);

        //Else, display students according to search term
        else:*/
            /*
            if (strpos(",", $query) != FALSE)
                $query_exploded = explode(',', $query);
            else
                $query_exploded = explode(' ', $query);

            $search_string = '';
            $i = 0;
            foreach ($query_exploded AS $term):
                $search_string = $search_string . $term;
                if ($i != sizeof($query_exploded) - 1)
                    $search_string = $search_string . ' | ';
                $i++;
            endforeach;*/

            $data["students"] = $this->student_model->search_students($query);
            foreach($data["students"] as $student):

                $student_skills = $this->student_model->get_student_skills($student->student_id);
                $student->skills = '';

                foreach($student_skills as $skill):
                    $student->skills = $student->skills . $skill->skill . ', ';
                endforeach;

            endforeach;

            $data["student_logged_in"] = $this->current_student_info;
            $data["search_query"] = $query;
            $data["notifications"] = $this->student_model->get_notifications($this->current_student_id);

            $this->load->view('student/search_students', $data);

        //endif;

    }



    public function edit_form(){

        $data["current_page"] = 'edit_profile';
        $data["student_logged_in"] = $this->current_student_info;

        //Create list of majors for view
        $data["majors"] = $this->student_model->get_majors();

        //Create list of schools view
        $data["schools"] = $this->student_model->get_schools();

        $data["notifications"] = $this->student_model->get_notifications($this->current_student_id);

        $data["upload_errors"] = '';

        $student_skills = $this->student_model->get_student_skills($this->current_student_id);

        $data["this_students_skills"] = '';
        foreach($student_skills as $skill):
            $data["this_students_skills"] = $data["this_students_skills"] . $skill->skill . ',';
        endforeach;

        $this->load->view('student/edit_student_form', $data);
    }

    public function edit(){

        $data["current_page"] = 'edit_profile';
        $data["notifications"] = $this->student_model->get_notifications($this->current_student_id);

        $student_id = $this->current_student_id;

        //Currently, email address cannot be changed

        $first 	  		  = $this->input->post('first',    		   TRUE);
        $last  	  		  = $this->input->post('last',     		   TRUE);
        $password 		  = $this->input->post('password', 		   TRUE);
        $confirm_password = $this->input->post('confirm_password', TRUE);
        $year 	  		  = $this->input->post('year', 	  		   TRUE);
        $school 	  	  = $this->input->post('school',   		   TRUE);
        $major 	  		  = $this->input->post('major',    		   TRUE);
        $status			  = $this->input->post('status', 		   TRUE);
        $bio 	  		  = $this->input->post('bio', 	  		   TRUE);
        $skills 	  	  = $this->input->post('as_values', 	  	   TRUE);
        //$software 	  	  = $this->input->post('software', 	  	   TRUE);
        $twitter 	  	  = $this->input->post('twitter', 	  	   TRUE);
        $facebook 	  	  = $this->input->post('facebook', 	  	   TRUE);
        $linkedin	  	  = $this->input->post('linkedin', 	  	   TRUE);
        $dribbble 	  	  = $this->input->post('dribbble', 	  	   TRUE);
        $github 	  	  = $this->input->post('github', 	  	   TRUE);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('first', 'first name', 					'trim|required|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('last', 'last name', 						'trim|required|htmlspecialchars|xss_clean');
        if (!empty($password)):
            $this->form_validation->set_rules('password', 'password', 					'trim|required|htmlspecialchars|xss_clean|matches[confirm_password]');
            $this->form_validation->set_rules('confirm_password', 'confirmed password', 'trim|required|htmlspecialchars|xss_clean');
        endif;

        $this->form_validation->set_rules('year', 'year of graduation', 			'trim|htmlspecialchars|xss_clean|numeric|max_length[4]|valid_graduation_date');
        $this->form_validation->set_rules('school', 'school', 						'trim|htmlspecialchars|xss_clean|numeric');
        $this->form_validation->set_rules('major', 'major', 						'trim|htmlspecialchars|xss_clean|numeric');
        $this->form_validation->set_rules('status', 'status', 						'trim|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('bio', 'bio', 							'trim|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('skills', 'skills',						'trim|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('software', 'software',					'trim|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('twitter', 'twitter',						'trim|htmlspecialchars|xss_clean');
        $this->form_validation->set_rules('facebook', 'facebook',					'trim|htmlspecialchars|xss_clean|valid_url');
        $this->form_validation->set_rules('linkedin', 'linkedin',					'trim|htmlspecialchars|xss_clean|valid_url');
        $this->form_validation->set_rules('dribbble', 'dribbble',					'trim|htmlspecialchars|xss_clean|valid_url');
        $this->form_validation->set_rules('github', 'github',						'trim|htmlspecialchars|xss_clean|valid_url');

        //If form does not validate according to rules above, load form view with error messages
        if ($this->form_validation->run() == FALSE):

            $data["student_logged_in"] = $this->current_student_info;

            //Create list of majors for view
            $data["majors"] = $this->student_model->get_majors();
            //Create list of schools view
            $data["schools"] = $this->student_model->get_schools();
            //Load skills again
            $student_skills = $this->student_model->get_student_skills($this->current_student_id);

            $data["this_students_skills"] = '';
            foreach($student_skills as $skill):
                $data["this_students_skills"] = $data["this_students_skills"] . $skill->skill . ',';
            endforeach;


            $data["upload_errors"] = '';
            $this->load->view('student/edit_student_form', $data);

        //Else, add student to database
        else:

            $student_data = array(
                'first' 	=> $first,
                'last'	 	=> $last,
                'year'		=> $year,
                'major_id' => $major,
                'school_id'=> $school,
                'status'   => $status,
                'bio' 		=> $bio,
                'twitter'	=> $twitter,
                'facebook'	=> $facebook,
                'linkedin'	=> $linkedin,
                'dribbble'	=> $dribbble,
                'github'	=> $github
            );

            if (!empty($password)):
                $student_data["password"] = sha1($password);
            endif;

            $skills_affected = $this->student_model->update_student_skills($student_id, $skills);

            //Load message library for setting success/error messages
            $this->load->library('message');

            $rows_affected = $this->student_model->edit_student($student_id, $student_data);

            if ($rows_affected || $skills_affected):
                $this->message->set("You have successfully edited your account profile", "success", TRUE);
                redirect("student/edit_form");
            else:
                //this also gets called when user doesn't make any changes.
                $this->message->set("Your profile could not be edited. Please try again.", "error", TRUE);
                redirect("student/edit_form");
                //echo 'Your profile could not be edited. Please try again.';
            endif;

        endif;

    }


    public function upload_profile_pic(){

        //set the path to root
        $config['upload_path'] = './uploads/students/pictures';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = "studentpic_" . sha1($this->current_student_id);

        //2000kb and max image width and height
        $config['max_size']	= '2000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        //prevent users from uploading multiple images.
        $config['overwrite']  = TRUE;

        //load the upload lib with settings
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()):
            $data["student_logged_in"] = $this->current_student_info;
            $data["majors"] = $this->student_model->get_majors();
            $data["schools"] = $this->student_model->get_schools();
            $data["upload_errors"] =  $this->upload->display_errors();

            $this->load->view('student/edit_student_form', $data);
        else:
            $uploaded_data = $this->upload->data();
            $status = $this->student_model->update_profile_picture($this->current_student_id, $uploaded_data['file_name']);

            $this->load->library('message');
            if ($status):
                $this->message->set("Picture updated successfully", "success", TRUE);
                redirect("student/edit_form");
            else:
                $this->message->set("Picture update failed", "error", TRUE);
                redirect("student/edit_form");
            endif;
        endif;
    }


    public function remove_profile_pic(){
        $status = $this->student_model->delete_profile_picture($this->current_student_id);
        $this->load->library('message');
        if ($status):
            $this->message->set("Picture deleted successfully", "success", TRUE);
            redirect("student/edit_form");
        else:
            $this->message->set("Picture delete failed", "error", TRUE);
            redirect("student/edit_form");
        endif;
    }
    //view single student
    public function view_student($id=null){
        $data['student'] = $this->student_model->get_student($id);
        if($data['student'] && !is_null($id)):
            $data["current_page"] = 'student';
            $data["notifications"] = $this->student_model->get_notifications($id);
            $data['student']->skills = '';
            $student_skills = $this->student_model->get_student_skills($id);
            foreach($student_skills as $skill):
                $data['student']->skills = $data['student']->skills . $skill->skill . ', ';
            endforeach;
            $this->load->view('student/view_student', $data);
        else:
            $data["current_page"] = 'student';
            $data["student"] = null;
            $data['notifications'] = null;
            $this->load->view('student/view_student', $data);
        endif;
    }
    //View all students
    public function view_all($record_offset = 0){
        $this->load->library('pagination');
        $this->load->helper('pagination_helper');

        $data["current_page"] = 'student';


        $data["notifications"] = $this->student_model->get_notifications($this->current_student_id);

        $data["students"] = $this->student_model->get_all_students($record_offset);

        foreach($data["students"] as $student):

            $student_skills = $this->student_model->get_student_skills($student->student_id);
            $student->skills = '';

            foreach($student_skills as $skill):
                $student->skills = $student->skills . $skill->skill . ', ';
            endforeach;

        endforeach;


        $this->pagination->initialize(PaginationSettings::set( $this->student_model->get_total_student_count(), "/student/view_all"));

        $this->load->view('student/view_all_students', $data);
    }

    public function autosuggest_skills(){

        $input = $this->input->get("q");

        $data = array();

        $skills = $this->student_model->find_skill($input);
        foreach ($skills as $skill):
            array_push($data, array('value' => $skill->skill_id, 'name' => $skill->skill));
        endforeach;


        header("Content-type: application/json");
        echo json_encode($data);
    }


}

/* End of file student.php */
/* Location: ./application/controllers/student.php */