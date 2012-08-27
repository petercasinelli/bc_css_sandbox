<?php
class Student_model extends CI_Model {


    public function get_all_students($record_offset)
    {
        $this->load->helper('pagination_helper');
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

    /* This method needs a lot of improvement in terms of full text searching in postgreSQL */
    public function search_students($query)
    {

        //Escape query to protect against SQL injection, etc
        $query = $this->db->escape($query);

        //First attempt at Full Text search in postgreSQL
        $sql = "SELECT * FROM students
					LEFT JOIN majors ON majors.major_id = students.major_id
					LEFT JOIN schools ON schools.school_id = students.school_id
					WHERE to_tsvector(first || ' ' || last || ' ' || skills || ' ' || software || ' ' || major || ' ' || school) @@ to_tsquery($query)
					";

        $query = $this->db->query($sql);

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
        $this->db->where('student_id', $student_id);
        $this->db->update('students', $data);

        $rows_affected = $this->db->affected_rows();

        if($rows_affected > 0)
            return TRUE;
        else
            return FALSE;

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
}