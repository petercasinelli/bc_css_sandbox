<?php
$this->load->helper('form');
?>

	<?php echo validation_errors('<div class="redAlert">', '</div>'); ?>
			
	<?php echo form_open('authentication/student/login'); ?>
	<?php 
	
	$email = array(
					'name' 	=> 'email',
					'value' => set_value('email')
				  );
						
	$password = array(
					'name' 	=> 'password'
					);
	

	$submit_button = array(
							'name'	=> 'submit',
							'value' => 'Login',
							'type'  => 'submit'
						  );
	
			?>
<div><?php echo form_label('E-Mail Address:', 'email-input'); echo form_input($email);?></div>
<div><?php echo form_label('Confirm Password:', 'password-input'); echo form_password($password); ?></div>
<div><?php echo form_submit($submit_button); ?></div>

<?php echo form_close(); ?>