<?php $student = $student[0]; ?>
<a href="javascript:;" class="expand" id="expand1">Expand</a>
<hgroup id="expand">
	<h1><?php echo $student->first . ' ' . $student->last; ?></h1>
<?php 
	if ($student->student_id == $student_id)
		echo anchor('student/edit_form/'. $student->student_id, 'Edit Profile'); 
?>
	<h2><?php echo 'Graduating: ' . $student->year . ' Major: ' . $student->major; ?></h2>
</hgroup>
<p><br /><br />
	<strong>Skills</strong>: <?php echo $student->skills; ?>
<br /><br />
</p>
<p id="item1" style="display:none;">
	<p><?php echo $student->bio; ?></p>
	<a href="mailto:user@example.com" class="fancy-button">Contact</a>
	<span class="social-links">
		<a href="" class="twitter" title="Twitter"></a>
		<a href="" class="facebook" title="Facebook"></a>
		<a href="" class="linkedin" title="LinkedIn"></a>
		<a href="" class="dribbble" title="Dribbble"></a>
		<a href="" class="github" title="Github"></a>
	</span>
</p>