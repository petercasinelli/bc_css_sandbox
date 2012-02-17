<div id="left-column">
		<hgroup>
			<h1>Welcome, <?php echo $student_logged_in->first . ' ' . $student_logged_in->last ?></h1>
			<?php echo anchor('student/', 'Home'); ?>
			<?php echo anchor('authentication/student/logout', 'Logout'); ?>
		</hgroup>
		<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png"></a>
		<?php echo anchor('student/edit_form', '<b>Edit your profile</b> to add skills, edit your biography, and update your online presence!', array('title' => 'Edit your profile', 'id' => 'sign-up')); ?>
		<br />
		<form action="" method="" id="search">
			<!--no space between inputs for presentational reasons-->
			<input type="text" name="query" placeholder="Search names, skills, majors..."><input type="submit" name="submit" value="Search">
		</form>
		
	<br />
</div>