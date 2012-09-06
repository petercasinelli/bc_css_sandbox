<?php
class Student_model extends CI_Model {


    public function get_all_students($record_offset)
    {
        $this->load->helper('pagination_helper');
        $this->db->order_by('first', 'asc');
        $this->db->join('schools', 'schools.school_id = students.school_id', 'left');
        $this->db->join('majors', 'majors.major_id = students.major_id', 'left');

        $query = $this->db->get('students', PaginationSettings::per_page(), $record_offset);
        $result = $query->result();

        return $result;
    }

    public function get_total_student_count()
    {
        $rows = $this->db->count_all('students');
        return $rows;
    }

    public function get_student($student_id)
    {
        $this->db->join('majors','majors.major_id = students.major_id', 'left');
        $this->db->join('schools','schools.school_id = students.school_id', 'left');

        $query = $this->db->get_where('students', array('students.student_id'=>$student_id));

        $result = $query->row();

        return $result;
    }

    public function add_student_skill($student_id, $skill_id){

        $students_skills_query = $this->db->select('student_skills.skill_id')->from('student_skills')->where(array('student_id'=>$student_id, 'skill_id' => $skill_id))->get();
        $student_skills = $students_skills_query->result();

        if (empty($student_skills)):

            $query = $this->db->insert('student_skills', array('student_id' => $student_id, 'skill_id' => $skill_id));
            $affected_rows = $this->db->affected_rows();
            return $affected_rows;

        else:

            return 0;
        endif;

    }

    public function get_student_skills($student_id)
    {

        $this->db->select('skills.skill_id, skill');
        $query = $this->db->join("skills", "skills.skill_id = student_skills.skill_id")->get_where('student_skills', array('student_id'=>$student_id));
        $result = $query->result();

        return $result;
    }
	
	function parse_skills($skills){
		$new_array = explode(",", $skills);

		foreach($new_array as $key=>$item):
			$new_array[$key] = trim($item);
		endforeach;
		
		$skills = array_filter($new_array);
	
		return $skills;
	}
	
	public function update_student_skills($student_id, $skills){
		$original_skills = $this->student_model->get_student_skills($student_id);
		$skills_value = "";
		$rows_affected = 0;
		
		foreach($original_skills as $row){
			$skills_value .= $row->skill . ",";
		}
		//parse the string and filter null and empty values
		$skill_array= $this->parse_skills($skills_value);
		$new_skill_array = $this->parse_skills($skills);
		
		//find difference between new and original tag list
		$added = array_diff($new_skill_array, $skill_array);
		$deleted = array_diff($skill_array, $new_skill_array);

		if(!empty($added) || empty($skill_array)):
			$this->student_model->add_skills($student_id, $added);
			$rows_affected += $this->db->affected_rows();
		endif;
		
		if(!empty($deleted) || empty($new_skill_array)):
			$this->student_model->delete_skills($student_id, $deleted);
			$rows_affected += $this->db->affected_rows();
		endif;
		
		return $rows_affected;
	}

    public function add_student($student_data)
    {
        $this->db->insert('students', $student_data);

        //Return student_id
        return $this->db->insert_id();
    }

    public function edit_student($student_id, $student_data)
    {
        $this->db->where('student_id', $student_id);
        $this->db->update('students', $student_data);
			
        $affected_rows = $this->db->affected_rows();
        //Return # of affected rows
        return $affected_rows;
    }

    public function search_students($query)
    {

        $this->db->join('student_skills', 'student_skills.student_id = students.student_id', 'left');
        $this->db->join('skills', 'skills.skill_id = student_skills.skill_id', 'left');
        $this->db->join('schools', 'schools.school_id = students.school_id', 'left');
        $this->db->join('majors', 'majors.major_id = students.major_id', 'left');

        $this->db->like('first', $query);
        $this->db->or_like('last', $query);
        $this->db->or_like('school', $query);
        $this->db->or_like('major', $query);
        $this->db->or_like('skill', $query);

        $this->db->distinct('students.student_id');

        $this->db->select('first, last, email, oauth_uid, students.school_id, students.major_id, students.student_id, picture, schools.school, year, majors.major, bio, status, twitter, facebook, linkedin, dribbble, github');
        $query = $this->db->get('students');
        $result = $query->result();

        return $result;

    }

    public function get_majors()
    {
        $this->db->order_by('major', 'asc');
        $query = $this->db->get('majors');
        $result = $query->result();
        return $result;
    }

    public function get_schools()
    {
        $this->db->order_by('school', 'asc');
        $query = $this->db->get('schools');
        $result = $query->result();
        return $result;
    }

    public function authenticate($email, $password){

        $login_information = array('email' => $email,
            'password' => sha1($password)
        );
        $this->db->limit(1);
        $query = $this->db->get_where('students', $login_information);

        $result = $query->row();

        //Return student with student information
        return $result;

    }

    public function oauth_authenticate($oauth_id, $email="None", $first_name, $last_name){
        //check if the uid exists in database, if so, return TRUE
        $query = $this->db->get_where('students', array('oauth_uid'=>$oauth_id));
        $rows = $query->num_rows();
        $result = $query->row();

        if($rows > 0):
            return $result;
        else:
            $data = array(
                'oauth_uid' => $oauth_id,
                'first' => $first_name ,
                'last' => $last_name,
                'email' => $email,
            );

            $this->db->insert('students', $data);
            $user_id = $this->db->insert_id();
            $rows_affected = $this->db->affected_rows();

            //fetch the user
            if($rows_affected > 0):
                $query = $this->db->get_where('students', array('student_id'=>$user_id));
                $rows = $query->num_rows();
                $result = $query->row();
                return $result;
            endif;
        endif;
    }

    public function update_profile_picture($student_id, $file_name){
        //update student set picture = blah where id = blah
        $data = array(
            'picture' => $file_name,
        );
		
		try{
        	$this->db->where('student_id', $student_id);
        	$this->db->update('students', $data);
			return TRUE;
		} catch (Exception $e) {
    		//echo 'Update failed: ',  $e->getMessage(), "\n";
			return FALSE;
		}
    }

    public function delete_profile_picture($student_id){
        $data = array(
            'picture' => NULL,
        );

        $this->db->where('student_id', $student_id);
        $this->db->update('students', $data, FALSE);

        $rows_affected = $this->db->affected_rows();

        if($rows_affected > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function get_notifications($student_id){

        //Check to see if this student is an administrator for any team
        $this->db->select("team_id");
        $query = $this->db->get_where("team_members", array("student_id" => $student_id, "account_type" => 1));
        $results = $query->result();

        if (empty($results)):
            return $results;
        else:
            $notifications = array();

            foreach($results as $result):

                $join_request_query = $this->db->select("first, last, team_id, students.student_id, join_team_requests.timestamp")->from("students")->join("join_team_requests", "students.student_id = join_team_requests.student_id")->where("team_id", $result->team_id)->get();
                $team_request = $join_request_query->row();
                if (!empty($team_request)):
                    $team_request->type = 'join_team';
                    array_push($notifications, $team_request);
                endif;

            endforeach;

            return $notifications;

        endif;
    }

    public function add_skill($skill){

        $skill_data = array('skill' => $skill);
        $add_skill = $this->db->insert('skills', $skill_data);
        $skill_id = $this->db->insert_id();

        return $skill_id;



    }

    public function find_skill($skill){

        $this->db->from("skills")->like("skill", $skill);
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    public function get_all_skills(){

        $query = $this->db->get('skills');
        $results = $query->result();

        return $results;
    }
	
	
	public function add_skills($student_id, $skills){
		
		foreach($skills as $value):

			$this->db->select('skill_id');
			$this->db->from('skills');
			$this->db->where('skill', $value);
			$search_result = $this->db->get();
			$rows = $search_result->num_rows();
			
			//If tag already exists
			if($rows > 0):
				$skill_id = $search_result->row()->skill_id;
				//Now check for primary key violation
				$this->db->select('*');
				$this->db->from('student_skills');
				$this->db->where('student_id', $student_id);
				$this->db->where('skill_id', $skill_id);
				$duplicate_check_result = $this->db->get();
				$duplicate_rows = $duplicate_check_result->num_rows();
				
				//If question not yet associated with tag
				if($duplicate_rows == 0):
					$this->db->set('student_id', $student_id);
					$this->db->set('skill_id', $skill_id);
					$this->db->insert('student_skills');
			 	endif;
			//If tag does not exist	
			else:
					$this->db->set('skill', $value);
					$this->db->insert('skills');	
					
					$skill_id = $this->db->insert_id();
					
					$this->db->set('student_id', $student_id);
					$this->db->set('skill_id', $skill_id);
					$this->db->insert('student_skills');
			endif;
				
	 endforeach;	
	}

	public function delete_skills($student_id, $skills){

		foreach($skills as $value):
			//unsupported by active record
			$delete_query = "DELETE 
							 FROM student_skills
							 USING student_skills
							 JOIN skills ON student_skills.skill_id = skills.skill_id 
							 WHERE student_id = $student_id 
							 AND skill = '$value'";
				 
			$this->db->query($delete_query);
	
			$this->db->select('student_id');
			$this->db->from("student_skills");
			$this->db->join("skills", "student_skills.skill_id = skills.skill_id");
			$this->db->where("skill",$value);
			$num_exists = $this->db->count_all_results();
			
			if($num_exists == 0):
				$this->db->from("skills");
				$this->db->where("skill", $value);
				$this->db->delete("skills");
			endif;
			
		endforeach;
	}

    public function get_new_students($limit){

        $this->db->limit($limit);
        $this->db->join('majors','majors.major_id = students.major_id', 'left');
        $this->db->join('schools','schools.school_id = students.school_id', 'left');
        $this->db->order_by('student_id', 'DESC');
        $query = $this->db->get('students');
        $results = $query->result();

        return $results;

    }

}