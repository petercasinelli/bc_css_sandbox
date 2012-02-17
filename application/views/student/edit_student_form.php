<?php
$this->load->helper('form');
$this->load->view('includes/header');
//$student = $student[0];
?>
	
	<?php $this->load->view('student/leftsidebar.php'); ?>
	
	<div id="right-column">
		
	<?php echo validation_errors('<div class="redAlert">', '</div>'); ?>
			
	<?php echo form_open('student/edit/' . $student->student_id); ?>
	<?php 
	
	$first = array(
					'name' 	=> 'first',
					'value' => set_value('first', $student->first)
				  );
						
	$last = array(
					'name' 	=> 'last',
					'value' => set_value('last', $student->last)
				);

	$email = array(
				'name' 	=> 'email',
				'value' => set_value('email', $student->email)
				 );												
						
	$password = array(
				'name' 	=> 'password',
				 );
				 
	$confirm_password = array(
				'name' 	=> 'confirm_password',
				 );				 
				 
	$year = array(
				'name' 	=> 'year',
				'value' => set_value('year', $student->year)
				 );
				 
	$major = array(
				'name' 	=> 'major',
				'value' => set_value('major', $student->major)
				 );
				 
	$bio = array(
				'name' 	=> 'bio',
				'value' => set_value('bio', $student->bio)
				 );		
				 	
	$skills = array(
					'name' => 'skills',
					'value' => set_value('skills', $student->skills)
					); 	

	$submit_button = array(
							'name'	=> 'submit',
							'value' => 'Edit my profile',
							'type'  => 'submit'
						  );
	
			?>
	<div class="item">
		<hgroup>		
			<h1>Manage Your Profile on BC Skillz</h1>
			<h2>Edit your profile information, skillz, experience, and online presence.</h2>
		</hgroup>
					
		<div><?php echo form_label('First Name', 'first-input'); echo form_input($first);?></div>
		<div><?php echo form_label('Last Name', 'last-input'); echo form_input($last); ?></div>
		<div><?php echo form_label('BC E-mail Address', 'email-input'); echo form_input($email); ?></div>
		<div><?php echo form_label('Password', 'password-input'); echo form_password($password); ?></div>
		<div><?php echo form_label('Confirm Password', 'confirm-password-input'); echo form_password($confirm_password); ?></div>
		<div><?php echo form_label('Year', 'year-input'); echo form_input($year); ?></div>
		<div><?php echo form_label('Major', 'major-input'); echo form_input($major); ?></div>
		<div><?php echo form_label('Bio', 'bio-input'); echo form_textarea($bio); ?></div>
		<div><?php echo form_label('Skills (separate with commas):', 'skills-input'); echo form_input($skills); ?></div>
		<div><?php echo form_submit($submit_button); ?></div>
	</div>
	
	<?php echo form_close(); ?>

</div>


<?php $this->load->view('includes/footer'); ?>