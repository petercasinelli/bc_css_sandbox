<?php $student = $student[0]; ?>
<h1><?php echo $student->first . ' ' . $student->last; ?></h1>
<?php 
	if ($student->student_id == $student_id)
		echo anchor('student/edit_form/'. $student->student_id, 'Edit Profile'); 
?>
<h2><?php echo 'Graduating: ' . $student->year . ' Major: ' . $student->major; ?></h2>
<p><?php echo $student->bio; ?>
<br /><br />
	<strong>Skills</strong>: <?php echo $student->skills; ?>
<br /><br />
</p>