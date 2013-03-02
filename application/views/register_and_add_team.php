<?php

$this->load->view('includes/header');
$this->load->helper('form');
?>

<?php if (strlen($this->message->display()) > 0 || strlen(validation_errors()) > 0): ?>
<section>
    <?php echo $this->message->display();
    echo validation_errors('<p class="error-message">', '</p>');    ?>
</section>
<?php endif; ?>

<section>
    <hgroup>
        <h1 style="font-size:24px;">Add Your Team To BC Skills</h1>
        <h2 style="font-size:18px;">Connect With Facebook</h2>
    </hgroup>
    <p>If you already have an account or you need to create a new account, login with Facebook. After logging in,
        you will be able to create your team, invite team members, and recruit other students.</p>
   
            <a href="<?php echo base_url(); ?>/authentication/student/fb_login_and_redirect/add_team" id="facebookButton"><img src="<?php echo base_url(); ?>assets/images/facebook_button.png"></a>
            <div style="width:290px; margin:auto;">
	<a href="javascript:;" onclick="toggleExpand(0)" id="sign-in-without-fb">Sign in without Facebook</a>
        | <?php echo anchor('/forgot_password', 'Forget password?'); ?>
	</div>
    	<div id="item0" style="display:none; width:200px; margin:auto">
			<?php echo form_open('authentication/student/login/team_registration', array("id" => "edit-profile")); ?>
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