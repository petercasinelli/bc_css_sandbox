<?php
class Team_Model extends CI_Model {


    /*function add_team($team_data, $student_id)
      *@param $team_data
      *@param $student_id
      */
    //Add a team, add the $student_id as a member and administrator
    public function add_team($team_data, $student_id){

        $query = $this->db->insert('teams', $team_data);
        $affected_rows = $this->db->affected_rows();

        //If the team was successfully added, add a team member and permissions
        if ($affected_rows):
            $team_id = $this->db->insert_id();
            $add_team_member = $this->add_team_member($student_id, $team_id, 1);

        endif;

        if (empty($team_id))
            return 0;
        else
            return $team_id;


    }
	
    public function update_team($team_id, $team_data){

        $this->db->where('team_id', $team_id);
        $query = $this->db->update('teams', $team_data);

        $affected_rows = $this->db->affected_rows();
        return $affected_rows;
    }

    public function add_team_member($student_id, $team_id, $account_type = 0){

        $member_data = array("student_id" => $student_id,
            "team_id" => $team_id,
            "account_type" => $account_type
        );
        $this->db->insert('team_members', $member_data);

        $affected_rows = $this->db->affected_rows();
        return $affected_rows;
    }

    public function remove_team_member($student_id, $team_id){

        $member_data = array("student_id" => $student_id,
            "team_id" => $team_id
        );
        $query = $this->db->delete('team_members', $member_data);
        $affected_rows = $this->db->affected_rows();

        return $affected_rows;

    }

    public function add_member_permission($student_id, $permission_id = 1, $team_id){

        $member_data = array("student_id" 	=> $student_id,
            "permission_id" => $permission_id,
            "team_id"		=> $team_id
        );

        $query = $this->db->insert('team_permissions', $member_data);

        $affected_rows = $this->db->affected_rows();
        return $affected_rows;
    }

    public function get_team($team_id){

        $query = $this->db->get_where('teams', array('team_id' => $team_id));

        $result = $query->row();

        return $result;

    }

    public function get_teams($record_offset){
    	$this->load->helper('pagination_helper');
		$query = $this->db->get('teams', PaginationSettings::per_page(), $record_offset);
        // $query = $this->db->from('teams')->get();
        $result = $query->result();
        return $result;
    }
	
		public function get_total_team_count() {
        $rows = $this->db->count_all('teams');
        return $rows;
    }

    public function get_team_members($team_id){
        $query = $this->db->from('students')->join('team_members', 'students.student_id = team_members.student_id')->join('schools', 'schools.school_id = students.school_id', 'left')->join('majors', 'majors.major_id = students.major_id','left')->where('team_id', $team_id)->get();
        $result = $query->result();
        return $result;
    }

    public function get_student_permission($team_id, $student_id)
    {
        $this->db->select('account_type');
        $query = $this->db->get_where('team_members',array('student_id' => $student_id, 'team_id' => $team_id));
        $result = $query->row();
        return $result;
    }

    public function add_update($team_id, $team_update, $student_id){

        $update_data = array(
            'team_id' => $team_id,
            'team_update' => $team_update,
            'student_id' => $student_id
        );
        $query = $this->db->insert('team_updates', $update_data);
        $affected_rows = $this->db->affected_rows();

        return $affected_rows;
    }

    public function delete_update($team_update_id){

        $query = $this->db->delete('team_updates', array('team_update_id' => $team_update_id));
        $affected_rows = $this->db->affected_rows();
        return $affected_rows;
    }

    public function get_updates($team_id){
        $query = $this->db->get_where('team_updates', array('team_id' => $team_id));
        $result = $query->result();

        return $result;
    }

    public function get_join_request($team_id, $student_id){

        $query = $this->db->get_where('join_team_requests', array('team_id' => $team_id,
                'student_id' => $student_id)
        );
        $result = $query->result();

        return $result;
    }

    //Make sure there is not a member request already
    public function join_request($team_id, $student_id){

        $join_request_data = array(
            'team_id' => $team_id,
            'student_id' => $student_id
        );

        $query = $this->db->insert('join_team_requests', $join_request_data);
        $affected_rows = $this->db->affected_rows();

        return $affected_rows;
    }

    public function accept_request($team_id, $student_id){

        $query = $this->db->select('join_team_request_id')->from('join_team_requests')->where(array('team_id' => $team_id, 'student_id' => $student_id))->get();
        $result = $query->row();

        if (empty($result)):
            return $result;
        else:
            //Request existed so delete join request and add team member to team

            $add_team_member = $this->add_team_member($student_id, $team_id);
            $affected_rows = $this->db->affected_rows();
            if ($affected_rows == 0):
                return $affected_rows;
            else:
                $delete_request = $this->db->delete('join_team_requests', array('join_team_request_id' => $result->join_team_request_id));
                $delete_affected_rows = $this->db->affected_rows();
                return $delete_affected_rows;
            endif;


        endif;
    }

    public function deny_request($team_id, $student_id){
        $query = $this->db->select('join_team_request_id')->from('join_team_requests')->where(array('team_id' => $team_id, 'student_id' => $student_id))->get();
        $result = $query->row();

        if (empty($result)):
            return $result;
        else:

            $delete_request = $this->db->delete('join_team_requests', array('join_team_request_id' => $result->join_team_request_id));
            $affected_rows = $this->db->affected_rows();
            return $affected_rows;


        endif;
    }

    public function get_new_teams($limit){

        $this->db->limit($limit);
        $query = $this->db->get('teams');
        $results = $query->result();

        return $results;
    }

}
