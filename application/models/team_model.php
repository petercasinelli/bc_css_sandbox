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
			$add_team_member = $this->add_team_member($student_id, $team_id);
			
			//If team member has been added, add a permission
			if ($this->db->affected_rows()):
				//Add administrator
				$add_team_member_permission = $this->add_member_permission($student_id, 1, $team_id);
				
				$affected_rows = $this->db->affected_rows();
			endif;
			
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
	
	public function add_team_member($student_id, $team_id){
	
		$member_data = array("student_id" => $student_id,
							 "team_id" => $team_id
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
		
		return $query;
		
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

    public function get_teams(){
    	$query = $this->db->from('teams')->get();
    	$result = $query->result();
    	return $result;
    }
    
    public function get_team_members($team_id){
    	$query = $this->db->from('students')->join('team_members', 'students.student_id = team_members.student_id')->where('team_id', $team_id)->get();
    	$result = $query->result();
    	return $result;
    }

	public function get_student_permission($team_id, $student_id)
	{
		$this->db->select('permission_id');
		$query = $this->db->get_where('team_permissions',array('student_id' => $student_id, 'team_id' => $team_id));
		$result = $query->row();
		return $result;
	}
}
