<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('includes/header');
?>
<section>
	<h1>Sign In To BC Skills</h1>
	<?php
		if (strcmp($this->message->display(), "") != FALSE):
	echo $this->message->display();
	endif;
	?>
	<a href="<?php echo base_url(); ?>index.php/authentication/student/fb_login" id="facebookButton"><img src="<?php echo base_url(); ?>assets/images/facebook_button.png"></a>
	<hr style="width:400px;">
	<div style="width:200px; margin:auto;">
	<a href="javascript:;" onclick="toggleExpand(0)" id="sign-in-without-fb">Sign in without Facebook</a>
	</div>
	<div id="item0" style="display:none; width:200px; margin:auto">
			<?php echo form_open('authentication/student/login', array("id" => "edit-profile")); ?>
			<?php 
			
			$email = array(
							'name' 	=> 'email',
							'value' => set_value('email'),
							'id' => 'field'
						  );
								
			$password = array(
							'name' 	=> 'password',
							'id' => 'field'
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
<br />
</section>

<?php $this->load->view('includes/footer'); ?>