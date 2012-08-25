<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');
?>

<section>
	<h1>View all students</h1>
    <?php
    if (empty($students)):
        ?>
        <h2>There are currently no students.</h2>
        <?php
    endif;
    ?>
	<?php 
	foreach($students as $student):
		$data["student"] = $student;
		$this->load->view('student/student_block', $data);
	endforeach;
	echo $this->pagination->create_links();
	?>

</section>
			
<?php $this->load->view('includes/footer'); ?>