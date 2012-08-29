<?php
	$name = array(
				'name' 	=> 'name',
				'value' => set_value('name')
				 );	

	$email = array(
				'name' 	=> 'email',
				'value' => set_value('email')
				 );												

	$password = array(
				'name' 	=> 'password'
				 );
					
	$submit_button = array(
							'name'	=> 'submit',
							'value' => 'Register',
							'type'  => 'submit'
						  );
?>
			<?php echo form_open('register/student/register', array("id" => "edit-profile")); ?>
			
			<?php echo form_label('Full Name:', 'name'); echo form_input($name); ?>
			<!--<h2>Personal Information</h2>-->
			<?php //echo form_label('First Name:', 'first'); echo form_input($first);?>
			<?php //echo form_label('Last Name:', 'last'); echo form_input($last); ?>
			<?php //echo form_label('School:', 'school'); echo form_dropdown('school', $schools_dropdown); ?>
			<?php //echo form_label('Graduation Year:', 'year'); echo form_input($year); ?>
			<?php //echo form_label('Major:', 'major'); echo form_dropdown('major', $major_dropdown); ?>
			
			<!--<div class="form-spacing"></div>
			<h2>Login Information</h2>-->
			<?php echo form_label('BC E-mail Address:', 'email'); echo form_input($email); ?>
			<?php echo form_label('Password:', 'password'); echo form_password($password); ?>
			<?php //echo form_label('Confirm Password:', 'confirm-password'); echo form_password($confirm_password); ?>
			
			<!--<div class="form-spacing"></div>
			<h2>BC Skills Profile</h2>-->
			<?php //echo form_label('Bio:', 'bio'); echo form_textarea($bio); ?>
			<?php //echo form_label('Skills:', 'skills'); echo form_input($skills); ?>
			<?php //echo form_label('Software:', 'software'); echo form_input($software); ?>
			
			<!--<div class="form-spacing"></div>
			<h2>Social Media</h2>-->
			<?php //echo form_label('Twitter:', 'twitter'); echo form_input($twitter); ?>
			<?php //echo form_label('Facebook:', 'facebook'); echo form_input($facebook); ?>
			<?php //echo form_label('LinkedIn:', 'linkedin'); echo form_input($linkedin); ?>
			<?php //echo form_label('Dribbble:', 'dribbble'); echo form_input($dribbble); ?>
			<?php //echo form_label('GitHub:', 'github'); echo form_input($github); ?>
			<?php echo form_submit($submit_button); ?>

			<?php echo form_close(); ?>
	