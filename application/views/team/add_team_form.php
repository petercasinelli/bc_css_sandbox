<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('includes/header');

	$team_name = array(
				'name' 	=> 'team_name',
				'value' => set_value('team_name')
				 );	

	$team_description = array(
				'name' 	=> 'team_description',
				'value' => set_value('team_description')
				 );												
						
	$submit_button = array(
							'name'	=> 'submit',
							'value' => 'Add Your Team',
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
				<h1>Create A Team on BC Skills</h1>
				<h2>Add your team and start recruiting co-founders or co-workers.</h2>
			</hgroup>
		</div>
			<?php echo validation_errors('<p class="red-alert">', '</p>'); ?>
			<?php echo form_open('team/add', array("id" => "add-team")); ?>
			
			<?php echo form_label('Team Name:', 'team_name'); echo form_input($team_name); ?>
			<?php echo form_label('Team Description:', 'team_description'); echo form_textarea($team_description); ?>

			<?php echo form_submit($submit_button); ?>

			<?php echo form_close(); ?>
			</div>
		
	</div>
	
<?php $this->load->view('includes/footer'); ?>