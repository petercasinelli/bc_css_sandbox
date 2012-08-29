<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');
$this->load->view('team/includes/back_to_team');

	$team_update = array(
				'name' 	=> 'team_update',
				'value' => set_value('update')
				 );	

						
	$submit_button = array(
							'name'	=> 'submit',
							'value' => 'Add Update',
							'type'  => 'submit'
						  );
?>
<section>
	
		<?php echo $this->message->display(); ?>
		
			<hgroup>		
				<h1>Add A Team Update</h1>
				<h2>Team updates provide the latest insight and news about your start-up to the BC Skills community.</h2>
			</hgroup>
			<?php echo validation_errors('<p class="error-message">', '</p>'); ?>
			<?php echo form_open('team/add_update/'.$team_data->team_id, array("id" => "add-team")); ?>
			
			<?php echo form_label('Team Update:', 'team_name'); echo form_textarea($team_update); ?>

			<?php echo form_submit($submit_button); ?>

			<?php echo form_close(); ?>

</section>		
	
<?php $this->load->view('includes/footer'); ?>