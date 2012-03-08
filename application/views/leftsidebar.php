<div id="left-column">
		<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png"></a>
		
		
		<form action="" method="" id="search">
			<!--no space between inputs for presentational reasons-->
			<input type="text" name="query" placeholder="Search names, skills, majors..."><a href="<?php echo base_url(); ?>index.php/authentication/student"><input type="submit" name="submit" value="Search"></a>
		</form>
		
		
	<br />
	<?php echo anchor('register/student', '<b>Sign up</b> to add your profile and get recruited for your talents', array('title' => 'Sign up as a student', 'id' => 'sign-up')); ?>
		
		<div id="sign-in">Already have an account? <a href=""></a><?php echo anchor('authentication/student', 'Sign in', 'title="Sign in as a student"'); ?>.</div>
</div>