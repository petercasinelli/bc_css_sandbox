<div id="left-column">
		<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png"></a>
			
		<?php echo form_open('student/search/', 'id="search"'); ?>
		<form action="" method="" id="search">
			<!--no space between inputs for presentational reasons-->
			<input type="text" name="query" placeholder="Search names, skills, majors..."><input type="submit" name="submit" value="Search">
		<?php echo form_close(); ?>
		
		Signed in as <b><?php echo $student_logged_in->first . ' ' . $student_logged_in->last ?></b>. <?php echo anchor('authentication/student/logout', "Sign Out"); ?>.

</div>