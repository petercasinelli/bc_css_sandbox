<?php
$this->load->helper('form');
?>

	<?php echo validation_errors('<div class="redAlert">', '</div>'); ?>
			
	<?php echo form_open('student/add'); ?>
	<?php 
	
	$first = array(
					'name' 	=> 'first',
					'value' => set_value('first')
				  );
						
	$last = array(
					'name' 	=> 'last',
					'value' => set_value('last')
				);

	$email = array(
				'name' 	=> 'email',
				'value' => set_value('email')
				 );												
						
	$password = array(
				'name' 	=> 'password',
				 );
				 
	$confirm_password = array(
				'name' 	=> 'confirm_password',
				 );			
				 				 
	$year = array(
				'name' 	=> 'year',
				'value' => set_value('year')
				 );
				 
	$major = array(
				'name' 	=> 'major',
				'value' => set_value('major')
				 );
				 
	$bio = array(
				'name' 	=> 'bio',
				'value' => set_value('bio')
				 );
	$skills = array(
					'name' => 'skills',
					'value' => set_value('skills')
					); 			

	$submit_button = array(
							'name'	=> 'submit',
							'value' => 'Add student',
							'type'  => 'submit'
						  );
	
			?>
<div><?php echo form_label('First Name:', 'first-input'); echo form_input($first);?></div>
<div><?php echo form_label('Last Name:', 'last-input'); echo form_input($last); ?></div>
<div><?php echo form_label('BC E-mail Address:', 'email-input'); echo form_input($email); ?></div>
<div><?php echo form_label('Password:', 'password-input'); echo form_password($password); ?></div>
<div><?php echo form_label('Confirm Password:', 'confirm-password-input'); echo form_password($confirm_password); ?></div>
<div><?php echo form_label('Year:', 'year-input'); echo form_input($year); ?></div>
<div><?php echo form_label('Major:', 'major-input'); echo form_input($major); ?></div>
<div><?php echo form_label('Bio:', 'bio-input'); echo form_textarea($bio); ?></div>
<div><?php echo form_label('Skills (separate with commas):', 'skills-input'); echo form_input($skills); ?></div>
<div><?php echo form_submit($submit_button); ?></div>

<?php echo form_close(); ?>