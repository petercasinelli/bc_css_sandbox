<?php
$this->load->helper('form');
$this->load->view('includes/header');
?>

	<?php $this->load->view('leftsidebar.php'); ?>
	
	<div id="right-column">
		<div class="item">
			<hgroup>
				<h1>Sign In As A Student:</h1>
				<h2>You must be a Boston College student in order to create a profile.</h2>
			</hgroup>
			<?php echo validation_errors(); ?>
			<?php if (isset($error))
					echo $error; ?>
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
		</div>
		
	</div>
	
<?php $this->load->view('includes/footer'); ?>