<div id="left-column">
		<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png"></a>
		
		Signed in as <b><?php echo $student_logged_in->first . ' ' . $student_logged_in->last ?></b>. <?php echo anchor('authentication/student/logout', "Sign Out"); ?>.

</div>