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
			$query = $this->db->get_where('students', array('student_id'=>$student_id));
			$result = $query->result();
			//Since we are only returning one student in get_student, point result to first element
			//of array
			$result = $result[0];
			
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
			
			//Return # of affected rows
			return $this->db->affected_rows();
		}
		
		public function search_students($queries)
		{
			foreach($queries AS $query)
			{
				$this->db->or_like('skills', $query);
				$this->db->or_like('first', $query);
				$this->db->or_like('last', $query);
			}
			
			
			
			$this->db->join('majors','majors.major_id = students.major_id', 'left');
			$query = $this->db->get('students');
			
			$result = $query->result();

			return $result;
			
		}

		public function get_majors()
		{
			$query = $this->db->get('majors');
			
			$result = $query->result();
			
			return $result;
			
		}

		public function authenticate($email, $password){
			
			$login_information = array('email' => $email,
									   'password' => md5($password)
										);
			$this->db->limit(1);
			$query = $this->db->get_where('students', $login_information);
			
			$student = $query->result();
			
			//Return student with student information
			return $student;
			
		}
		
}