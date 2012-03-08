<div id="left-column">
		<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png"></a>
		<hgroup>
			<h1>Welcome, <?php echo $student_logged_in->first . ' ' . $student_logged_in->last ?></h1>
		</hgroup>
		<?php echo anchor('student/', 'BC Skills Home', array('title' => 'Home', 'id' => 'sign-up')); ?>
		<?php echo anchor('student/edit_form', '<b>Edit your profile</b> to add skills, edit your biography, and update your online presence!', array('title' => 'Edit your profile', 'id' => 'sign-up')); ?>
		<?php echo anchor('authentication/student/logout', 'Logout of BC Skills', array('title' => 'Logout', 'id' => 'sign-up')); ?>
		<br />
		<?php echo form_open('student/search/', 'id="search"'); ?>
		<form action="" method="" id="search">
			<!--no space between inputs for presentational reasons-->
			<input type="text" name="query" placeholder="Search names, skills, majors..."><input type="submit" name="submit" value="Search">
		<?php echo form_close(); ?>
		
	<br />
</div>