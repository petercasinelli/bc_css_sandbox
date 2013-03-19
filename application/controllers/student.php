<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 /**
  * Extend MY_Controller for authentication/current student logged in built in
  * @version 0.1
  */
class Student extends MY_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("image_helper");
        $this->load->helper('studentprofile_helper');
    }

    public function index()
    {
        $this->load->model("student_model");
        $this->load->model("team_model");
        
        $data["current_page"] = 'index';
        $data["student_logged_in"] = $this->current_student_info;

        //Retrieve 2 new students/teams and send to view
        $data["new_students"] = $this->student_model->get_new_students(5);
        $data["new_teams"] = $this->team_model->get_new_teams(5);
        
        foreach($data["new_teams"] as $new_team) {
            $new_team->team_members = $this->team_model->get_team_members($new_team->team_id);
        }
        
        $data['profile_completion'] = profile_completed($this->current_student_info);
        //If this is the first time the user has logged in, check if bio or skills filled
        $data = profile_fill_notification($data, $this->current_student_info);
        $data = $this->set_notification($data, $this->current_student_id);
        $this->load->view('student/home', $data);
    }
	
	public function search($query=null, $record_offset=0)
	{
		$this->load->library('pagination');
        $this->load->helper('pagination_helper');
		
		if(empty($query)){
			$data["empty_search"] = "Please enter a search term";
			$data["current_page"] = 'student';
			$data["search_query"] = "";
            $data = $this->set_notification($data, $this->current_student_id);

			$data["students"] = array();
            $this->load->view('student/search_students', $data);
			return;
		}
		
        $data["current_page"] = 'student';
		$decoded_query = urldecode($query);
		$search_results = $this->student_model->search_students($decoded_query, $record_offset);
        $data["students"] = $search_results["result"];
        
        foreach($data["students"] as $student) {
            $student->skills = get_user_skill_list($this->student_model->get_student_skills($student->student_id));
        }

        $data["student_logged_in"] = $this->current_student_info;
        $data["search_query"] = $decoded_query;
        $data = $this->set_notification($data, $this->current_student_id);
	    $data["search_results"] = $search_results["result_count"];
		$this->pagination->initialize(PaginationSettings::set($data["search_results"], "student/search/$query"));
        $this->load->view('student/search_students', $data);
	}

    public function submit_query($record_offset = 0)
    {
        $query = $this->input->post('query', TRUE);
		redirect("student/search/$query");
    }

    public function edit_form()
    {
        $data["current_page"] = 'edit_profile';
        $data["student_logged_in"] = $this->current_student_info;
        //Create list of majors for view
        $data["majors"] = $this->student_model->get_majors();
        //Create list of schools view
        $data["schools"] = $this->student_model->get_schools();
        $data = $this->set_notification($data, $this->current_student_id);
        $data["upload_errors"] = '';
		$data["this_students_skills"] = get_user_skill_list($this->student_model->get_student_skills($this->current_student_id), true);
        $this->load->view('student/edit_student_form', $data);
    }

    public function edit()
    {
        $this->load->library('message');
        $this->load->library('form_validation');
        
        $data["current_page"] = 'edit_profile';
        $data = $this->set_notification($data, $this->current_student_id);

        $student_id = $this->current_student_id;
        //Currently, email address cannot be changed
        $student_data['first'] = $this->input->post('first', TRUE);
        $student_data['last'] = $this->input->post('last', TRUE);
        $student_data['email'] = $this->input->post('email', TRUE);
        $password = $this->input->post('password',TRUE);
        $confirm_password = $this->input->post('confirm_password', TRUE);
        $student_data['year' ] = $this->input->post('year', TRUE);
        $student_data['school_id'] = $this->input->post('school', TRUE);
        $student_data['major_id'] = $this->input->post('major', TRUE);
        $student_data['status'] = $this->input->post('status', TRUE);
        $student_data['bio'] = $this->input->post('bio', TRUE);
        $skills = $this->input->post('as_values', TRUE);
        $student_data['twitter'] = $this->input->post('twitter', TRUE);
        $student_data['facebook'] = $this->input->post('facebook', TRUE);
        $student_data['linkedin'] = $this->input->post('linkedin', TRUE);
        $student_data['dribbble'] = $this->input->post('dribbble', TRUE);
        $student_data['github'] = $this->input->post('github', TRUE);

        if (!$this->form_validation->valid_profile_edit($password)) {
            $data["student_logged_in"] = $this->current_student_info;
            $data["majors"] = $this->student_model->get_majors();
            $data["schools"] = $this->student_model->get_schools();
            $data["this_students_skills"] = get_user_skill_list($this->student_model->get_student_skills($student_id), true);
            $data["upload_errors"] = '';
            $this->load->view('student/edit_student_form', $data);
        } else {
            $update = $this->student_model->update_student_profile($student_id, $password, $skills, $student_data);        
            if ($update) {
                $this->message->set("You have successfully edited your account profile", "success", TRUE);
                redirect("student/edit_form");
            } else {
                //this also gets called when user doesn't make any changes.
                $this->message->set("Your profile could not be edited. Please try again.", "error", TRUE);
                redirect("student/edit_form");
            }

        }

    }

    public function ajax_edit()
    {
        $student_id = $this->current_student_id;
        $bio 	= $this->input->post('bio', TRUE);
        $skills = $this->input->post('skills', TRUE);
        if (!empty($skills)) {
            $skills_affected = $this->student_model->update_student_skills($student_id, $skills);
            if (!$skills_affected) {
                echo 'false';
            }
        }
        
        if (!empty($bio)) {
            $rows_affected = $this->student_model->edit_student($student_id, array("bio" => $bio));
            if (!$rows_affected){
                echo 'false';
            }
        }

        echo 'true';
        
    }

    public function upload_profile_pic()
    {
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
        if (!$this->upload->do_upload()) {
            $data["student_logged_in"] = $this->current_student_info;
            $data["majors"] = $this->student_model->get_majors();
            $data["schools"] = $this->student_model->get_schools();
            $data["upload_errors"] =  $this->upload->display_errors();

            $this->load->view('student/edit_student_form', $data);
        } else {
            $this->load->library('s3');
            $uploaded_data = $this->upload->data();
            $file = $this->s3->inputFile($uploaded_data['full_path']);
            $bucket = 'bcskills-profile-pictures';
            $uri = $uploaded_data['file_name'];
            $s3_put_object = $this->s3->putObject($file, $bucket, $uri, 'public-read');
            $status = FALSE;
            
            if ($s3_put_object) {
                $status = $this->student_model->update_profile_picture($this->current_student_id, $uploaded_data['file_name']);
            }
            
            $this->load->library('message');
            
            if ($status) {
                $this->message->set("Picture updated successfully", "success", TRUE);
                redirect("student/edit_form");
            } else {
                $this->message->set("Picture update failed", "error", TRUE);
                redirect("student/edit_form");
            }
            
        }
    }

    public function remove_profile_pic($uri)
    {
        $this->load->library('message');
        $this->load->library("s3");

        $delete_object = FALSE;
        $status = FALSE;
        $bucket = 'bcskills-profile-pictures';

        //Make sure student is removing their own profile picture
        if (strcmp($uri, $this->current_student_info->picture) == 0) {
            $delete_object = $this->s3->deleteObject($bucket, $uri);
        }

        //If Amazon S3 object was delete, update database
        if ($delete_object) {
            $status = $this->student_model->delete_profile_picture($this->current_student_id);
        }
        
        //If database is updated, redirect
        if ($status) {
            $this->message->set("Picture deleted successfully", "success", TRUE);
            redirect("student/edit_form");
        } else {
            $this->message->set("Picture delete failed", "error", TRUE);
            redirect("student/edit_form");
        }

    }

    public function view_student($id=null)
    {
        $data['student'] = $this->student_model->get_student($id);
        if($data['student'] && !is_null($id)) {
            $data["current_page"] = 'student';
            $data = $this->set_notification($data, $this->current_student_id);
            $data['student']->skills = get_user_skill_list($this->student_model->get_student_skills($id));
            $this->load->view('student/view_student', $data);
        } else {
            $data["current_page"] = 'student';
            $data["student"] = null;
            $data['notifications'] = null;
            $this->load->view('student/view_student', $data);
        }
    }

    public function view_all($record_offset = 0)
    {
        $this->load->library('pagination');
        $this->load->helper('pagination_helper');   
        $data["current_page"] = 'student';
        $data = $this->set_notification($data, $this->current_student_id);
        $data["students"] = $this->student_model->get_all_students($record_offset);
        $this->pagination->initialize(PaginationSettings::set($this->student_model->get_total_student_count(), "student/view_all"));
        $this->load->view('student/view_all_students', $data);
    }

    public function autosuggest_skills()
    {
        $input = $this->input->get("q");
        $data = array();
        $skills = $this->student_model->find_skill($input);
        
        foreach ($skills as $skill) {
            $skill_data = array(
                'value' => $skill->skill_id, 
                'name'  => $skill->skill
            );
            array_push($data, $skill_data);
        }
        
        header("Content-type: application/json");
        echo json_encode($data);
    }

    public function tutorial()
    {
        $data["current_page"] = 'tutorial';
        $data = $this->set_notification($data, $this->current_student_id);
        $this->load->view('student/tutorial', $data);
    }

}

/* End of file student.php */
/* Location: ./application/controllers/student.php */