<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('includes/header');
?>

	<?php $this->load->view('includes/leftsidebar'); ?>
	
	<div id="right-column">
		
		<?php $this->load->view("includes/navigation"); ?>
		
		<div class="item non-user-item">
			<hgroup>
				<h1>Sign In To BC Skills</h1>
				<h2>To search student profiles and manage your own, enter your login information below.</h2>
			</hgroup>
		</div>
		
			<?php
				if (strcmp($this->message->display(), "") != FALSE):
			?>
			
			<?php echo $this->message->display(); ?>	
			
			<?php
				endif;
			?>
			
			<?php echo form_open('authentication/student/login', array("id" => "edit-profile")); ?>
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
			<?php echo form_label('E-Mail Address:', 'email'); echo form_input($email);?>
			<?php echo form_label('Password:', 'password'); echo form_password($password); ?>
			<?php echo form_submit($submit_button); ?>
		
			<?php echo form_close(); ?>
		
		
	</div>
	
<?php $this->load->view('includes/footer'); ?>