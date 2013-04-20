<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');
?>

<section>
	<h1>View Student</h1>
	<?php if(!is_null($student)): ?>
	<?php 
	   $data['skills'] = get_student_skills($student->student_id);
	   $this->load->view('student/student_block', $data);?>
	<?php endif; ?>
</section>
			
<?php $this->load->view('includes/footer'); ?>