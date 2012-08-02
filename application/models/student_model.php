<?php
class Student_model extends CI_Model {
		
		public function get_all_students()
		{
			
			$query = $this->db->get('students');
			$result = $query->result();
			
			return $result;
			
		}
		
		public function get_student($student_id)
		{
			$this->db->join('majors','majors.major_id = students.major_id', 'left');
			$this->db->join('schools','schools.school_id = students.school_id', 'left');
			
			$query = $this->db->get_where('students', array('student_id'=>$student_id));
	
			$result = $query->row();
			//Since we are only returning one student in get_student, point result to first element
			//of array
			//$result = $result[0]; 
			
			return $result;	
		}		
		
		public function get_student_skills($student_id)
		{
			$query = $this->db->get_where('student_skills', array('student_id'=>$student_id));
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
				//echo "mufuka he ain't exist";exit(4);
			
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
		
}