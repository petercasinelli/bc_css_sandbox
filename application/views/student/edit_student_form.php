<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('includes/header');
//$student_logged_in = $student_logged_in[0];

$this->load->view('student/includes/leftsidebar');

/**** FORM MANAGEMENT *****/

//Create majors dropdown from data sent in from controller
$major_dropdown = array();
foreach($majors AS $major):
	$major_dropdown[$major->major_id] = $major->major;
endforeach;

//Create schools dropdown
$schools_dropdown = array();
foreach($schools AS $school):
	$schools_dropdown[$school->school_id] = $school->school;
endforeach;
	
//Settings for form elements

	$first = array(
					'name' 	=> 'first',
					'value' => set_value('first', $student_logged_in->first)
				  );
						
	$last = array(
					'name' 	=> 'last',
					'value' => set_value('last', $student_logged_in->last)
				);

	$email = array(
				'name' 	=> 'email',
				'value' => $student_logged_in->email,
				'disabled' => 'disabled'
				 );												
						
	$password = array(
				'name' 	=> 'password',
				'title' => 'Only enter a new password if you would like to change it'
				 );
				 
	$confirm_password = array(
				'name' 	=> 'confirm_password',
				 );			
				 				 
	$year = array(
				'name' 	=> 'year',
				'value' => set_value('year', $student_logged_in->year),
				'maxlength' => 4
				 );
				 
	$school = array(
				'name' 	=> 'school',
				'value' => set_value('school', $student_logged_in->school_id),
				'options' => $schools_dropdown
				 );
				 
	$major = array(
				'name' 	=> 'major',
				'value' => set_value('major', $student_logged_in->major_id),
				'options' => $major_dropdown
				 );
				 
	$bio = array(
				'name' 	=> 'bio',
				'value' => set_value('bio', $student_logged_in->bio),
				'title' => 'Tell us a little bit about yourself. Are you looking to get involved in a startup? What are you passionate about?'
				 );
	$skills = array(
					'name' => 'skills',
					'title' => 'Comma separated if multiple',
					'value' => set_value('skills', $student_logged_in->skills)
					); 		
	$software = array(
					'name' => 'software',
					'title' => 'Comma separated if multiple',
					'value' => set_value('software', $student_logged_in->software)
					);
					
	$twitter = array(
					'name' => 'twitter',
					'title' => '@username',
					'value' => set_value('twitter', $student_logged_in->twitter)
					);
					
	$facebook = array(
					'name' => 'facebook',
					'title' => 'Full Facebook Profile URL',
					'value' => set_value('facebook', $student_logged_in->facebook)
					);
					
	$linkedin = array(
					'name' => 'linkedin',
					'title' => 'Full LinkedIn Public Profile URL',
					'value' => set_value('linkedin', $student_logged_in->linkedin)
					);
					
	$dribbble = array(
					'name' => 'dribbble',
					'title' => 'Full Dribbble Profile URL',
					'value' => set_value('dribbble', $student_logged_in->dribbble)
					);
										
	$github = array(
					'name' => 'github',
					'title' => 'Full GitHub Profile URL',
					'value' => set_value('github', $student_logged_in->github)
					);
					
	$submit_button = array(
							'name'	=> 'submit',
							'value' => 'Edit Profile',
							'type'  => 'submit'
						  );

?>
	
	<div id="right-column">
		<?php $this->load->view("student/includes/navigation"); ?>

	<div class="item non-user-item">
		<hgroup>		
			<h1>Manage Your Profile on BC Skills</h1>
			<h2>Edit your profile information, skills, experience, and online presence.</h2>
		</hgroup>
	</div>	
	
			<?php $this->message->display(); ?>
	
			<?php echo form_open('student/edit/' . $student_logged_in->student_id, array("id" => "edit-profile")); ?>
			<?php echo validation_errors('<div class="redAlert">', '</div>'); ?>
			<br />
			<h2>Personal Information</h2>
			<?php echo form_label('First Name:', 'first'); echo form_input($first);?>
			<?php echo form_label('Last Name:', 'last'); echo form_input($last); ?>
			<?php echo form_label('School:', 'school'); echo form_dropdown('school', $schools_dropdown, $student_logged_in->school_id); ?>
			<?php echo form_label('Graduation Year:', 'year'); echo form_input($year); ?>
			<?php echo form_label('Major:', 'major'); echo form_dropdown('major', $major_dropdown, $student_logged_in->major_id); ?>
			
			<div class="form-spacing"></div>
			<h2>Login Information</h2>
			<?php echo form_label('BC E-mail Address:', 'email'); echo form_input($email); ?>
			<?php echo form_label('Password:', 'password'); echo form_password($password); ?>
			<?php echo form_label('Confirm Password:', 'confirm-password'); echo form_password($confirm_password); ?>
			
			<div class="form-spacing"></div>
			<h2>BC Skills Profile</h2>
			<?php echo form_label('Bio:', 'bio'); echo form_textarea($bio); ?>
			<?php echo form_label('Skills:', 'skills'); echo form_input($skills); ?>
			<?php echo form_label('Software:', 'software'); echo form_input($software); ?>
			
			<div class="form-spacing"></div>
			<h2>Social Meda</h2>
			<?php echo form_label('Twitter:', 'twitter'); echo form_input($twitter); ?>
			<?php echo form_label('Facebook:', 'facebook'); echo form_input($facebook); ?>
			<?php echo form_label('LinkedIn:', 'linkedin'); echo form_input($linkedin); ?>
			<?php echo form_label('Dribbble:', 'dribbble'); echo form_input($dribbble); ?>
			<?php echo form_label('GitHub:', 'github'); echo form_input($github); ?>
			<?php echo form_submit($submit_button); ?>
</div>


<?php $this->load->view('includes/footer'); ?>