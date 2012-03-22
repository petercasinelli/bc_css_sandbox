<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('includes/header');

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
	
	//Settings for form
	$first = array(
					'name' 	=> 'first',
					'value' => set_value('first'),
					
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
				'name' 	=> 'password'
				 );
				 
	$confirm_password = array(
				'name' 	=> 'confirm_password'
				 );			
				 				 
	$year = array(
				'name' 	=> 'year',
				'value' => set_value('year'),
				'maxlength' => 4
				 );
				 
	$school = array(
				'name' 	=> 'school',
				'value' => set_value('school'),
				'options' => $schools_dropdown
				 );
				 
	$major = array(
				'name' 	=> 'major',
				'value' => set_value('major'),
				'options' => $major_dropdown
				 );
				 
	$bio = array(
				'name' 	=> 'bio',
				'value' => set_value('bio'),
				'title' => 'Tell us a little bit about yourself. Are your recruiting a technical or business co-founder? Are you looking to get involved in a startup? What are you passionate about?'
				 );
	$skills = array(
					'name' => 'skills',
					'value' => set_value('skills'),
					'title' => 'What programming languages do you know? What business skills do you have? Any skills are welcome! Comma separated if multiple'
					); 		
	$software = array(
					'name' => 'software',
					'value' => set_value('software'),
					'title' => 'What software do you use? Ie- Eclipse, XCode, Balsamiq, Excel, etc. Comma separated if multiple'
					);
					
	$twitter = array(
					'name' => 'twitter',
					'value' => set_value('twitter'),
					'title' => 'Just your username @username'
					);
					
	$facebook = array(
					'name' => 'facebook',
					'value' => set_value('facebook'),
					'title' => 'Full Facebook URL'
					);
					
	$linkedin = array(
					'name' => 'linkedin',
					'value' => set_value('linkedin'),
					'title' => 'Full LinkedIn Public Profile URL'
					);
					
	$dribbble = array(
					'name' => 'dribbble',
					'value' => set_value('dribbble'),
					'title' => 'Full Dribbble Profile URL'
					);
										
	$github = array(
					'name' => 'github',
					'value' => set_value('github'),
					'title' => 'Full GitHub Profile URL'
					);
												

	$submit_button = array(
							'name'	=> 'submit',
							'value' => 'Register',
							'type'  => 'submit'
						  );
?>
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
			<?php echo validation_errors('<p>', '</p>'); ?>
			<?php echo form_open('register/student/register', array("id" => "edit-profile")); ?>
			<h2>Personal Information</h2>
			<?php echo form_label('First Name:', 'first'); echo form_input($first);?>
			<?php echo form_label('Last Name:', 'last'); echo form_input($last); ?>
			<?php echo form_label('School:', 'school'); echo form_dropdown('school', $schools_dropdown); ?>
			<?php echo form_label('Graduation Year:', 'year'); echo form_input($year); ?>
			<?php echo form_label('Major:', 'major'); echo form_dropdown('major', $major_dropdown); ?>
			
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
			<h2>Social Media</h2>
			<?php echo form_label('Twitter:', 'twitter'); echo form_input($twitter); ?>
			<?php echo form_label('Facebook:', 'facebook'); echo form_input($facebook); ?>
			<?php echo form_label('LinkedIn:', 'linkedin'); echo form_input($linkedin); ?>
			<?php echo form_label('Dribbble:', 'dribbble'); echo form_input($dribbble); ?>
			<?php echo form_label('GitHub:', 'github'); echo form_input($github); ?>
			<?php echo form_submit($submit_button); ?>

			<?php echo form_close(); ?>
			</div>
		
	</div>
	
<?php $this->load->view('includes/footer'); ?>