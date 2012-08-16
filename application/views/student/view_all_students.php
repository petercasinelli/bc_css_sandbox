<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');
?>

<section>
	<h1>View all students</h1>

	<?php 
	foreach($students as $student):
		$data["student"] = $student;
		$this->load->view('student/student_block', $data);
	endforeach;
	?>

</section>
			
<?php $this->load->view('includes/footer'); ?>