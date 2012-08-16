<?php
$this->load->library('message');
$this->load->view('includes/header');
?>

<section>
<?php echo $this->message->display(); ?>
	
			<hgroup>		
				<h1>Create A Profile on BC Skills</h1>
				<h2>You must be a student at Boston College in order to register.</h2>
			</hgroup>
		<?php echo validation_errors('<p class="error-message">', '</p>'); ?>
		<?php echo $this->load->view('student/registration/forms/fb_registration_form'); ?>
		<hr style="width:400px;">
		<div style="width:200px; margin:auto;">
		<a href="javascript:;" onclick="toggleExpand(0)" id="sign-up-without-fb">Sign up without Facebook</a>
		</div>
		<div id="item0" style="display:none; width:200px; margin:auto">
		<?php $this->load->view('student/registration/forms/regular_registration_form'); ?>
		</div>
		<br />
</section>
		

<?php $this->load->view('includes/footer'); ?>