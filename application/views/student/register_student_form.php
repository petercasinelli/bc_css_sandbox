<?php
$this->load->helper('form');
$this->load->view('includes/header');

	//Create majors dropdown from data sent in from controller
$major_dropdown = array();
foreach($majors AS $major):
	$major_dropdown[$major->major_id] = $major->major;
endforeach;
	
	//Settings for form
	$first = array(
					'name' 	=> 'first',
					'value' => set_value('first')
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
				'name' 	=> 'password',
				 );
				 
	$confirm_password = array(
				'name' 	=> 'confirm_password',
				 );			
				 				 
	$year = array(
				'name' 	=> 'year',
				'value' => set_value('year')
				 );
				 
	$major = array(
				'name' 	=> 'major',
				'value' => set_value('major'),
				'options' => $major_dropdown
				 );
				 
	$bio = array(
				'name' 	=> 'bio',
				'value' => set_value('bio')
				 );
	$skills = array(
					'name' => 'skills',
					'value' => set_value('skills')
					); 		
	$software = array(
					'name' => 'software',
					'value' => set_value('software')
					);
					
	$twitter = array(
					'name' => 'twitter',
					'value' => set_value('twitter')
					);
					
	$facebook = array(
					'name' => 'facebook',
					'value' => set_value('facebook')
					);
					
	$linkedin = array(
					'name' => 'linkedin',
					'value' => set_value('linkedin')
					);
					
	$dribbble = array(
					'name' => 'dribbble',
					'value' => set_value('dribbble')
					);
										
	$github = array(
					'name' => 'github',
					'value' => set_value('github')
					);
												

	$submit_button = array(
							'name'	=> 'submit',
							'value' => 'Add student',
							'type'  => 'submit'
						  );
?>
	<?php $this->load->view('leftsidebar.php'); ?>
	
	<div id="right-column">
		
		<div class="item">
			<hgroup>		
				<h1>Create A Profile on BC Skillz</h1>
				<h2>You must be a student at Boston College in order to register.</h2>
			</hgroup>
			<?php echo validation_errors('<div class="redAlert">', '</div>'); ?>
			<?php echo form_open('register/student/register'); ?>
			<div><?php echo form_label('First Name:', 'first-input'); echo form_input($first);?></div>
			<div><?php echo form_label('Last Name:', 'last-input'); echo form_input($last); ?></div>
			<div><?php echo form_label('BC E-mail Address:', 'email-input'); echo form_input($email); ?></div>
			<div><?php echo form_label('Password:', 'password-input'); echo form_password($password); ?></div>
			<div><?php echo form_label('Confirm Password:', 'confirm-password-input'); echo form_password($confirm_password); ?></div>
			<div><?php echo form_label('Year:', 'year-input'); echo form_input($year); ?></div>
			<div><?php echo form_label('Major:', 'major-input'); echo form_dropdown('major', $major_dropdown); ?></div>
			<div><?php echo form_label('Bio:', 'bio-input'); echo form_textarea($bio); ?></div>
			<div><?php echo form_label('Skills (separate with commas):', 'skills-input'); echo form_input($skills); ?></div>
			<div><?php echo form_label('software (separate with commas):', 'software-input'); echo form_input($software); ?></div>
			<div><?php echo form_label('Twitter (@username):', 'twitter-input'); echo form_input($twitter); ?></div>
			<div><?php echo form_label('Facebook:', 'facebook-input'); echo form_input($facebook); ?></div>
			<div><?php echo form_label('LinkedIn (public profile):', 'linkedin-input'); echo form_input($linkedin); ?></div>
			<div><?php echo form_label('Dribbble:', 'dribbble-input'); echo form_input($dribbble); ?></div>
			<div><?php echo form_label('GitHub:', 'github-input'); echo form_input($github); ?></div>
			<div><?php echo form_submit($submit_button); ?></div>

			<?php echo form_close(); ?>
		</div>
		
	</div>
	
<?php $this->load->view('includes/footer'); ?>