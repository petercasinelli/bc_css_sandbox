<div id="left-column">
		<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png"></a>
		
		
	<?php echo anchor('register/student', '<b>Sign up</b> to add your profile and get recruited for your talents', array('title' => 'Sign up as a student', 'id' => 'sign-up')); ?>
		
		<div id="sign-in">Already have an account? <a href=""></a><?php echo anchor('authentication/student', 'Sign in', 'title="Sign in as a student"'); ?>.</div>
</div>