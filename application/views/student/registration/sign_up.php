<?php $this->load->view('includes/header'); ?>

<?php $this->load->library('message'); ?>
	<?php $this->load->view('includes/leftsidebar'); ?>
	
	<div id="right-column">
		<?php $this->load->view("includes/navigation"); ?>
		<div>
			
		<?php echo $this->message->display(); ?>
		
		<div class="item non-user-item">
			<hgroup>		
				<h1>Create A Profile on BC Skills</h1>
				<h2>You must be a student at Boston College in order to register.</h2>
			</hgroup>
		</div>
		<?php echo validation_errors('<p class="red-alert">', '</p>'); ?>
		<?php $this->load->view('student/registration/includes/regular_registration_form'); ?>
		<?php $this->load->view('student/registration/includes/fb_registration_form'); ?>
		</div>
		
	</div>

<?php $this->load->view('includes/footer'); ?>