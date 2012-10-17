<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');

	$team_name = array(
				'name' 	=> 'team_name',
				'value' => set_value('team_name')
				 );	

	$team_description = array(
				'name' 	=> 'team_description',
				'value' => set_value('team_description')
				 );

    $team_needs = array(
        'name' => 'team_needs',
        'value' => set_value('team_needs')
    );
						
	$submit_button = array(
							'name'	=> 'submit',
							'value' => 'Add Your Team',
							'type'  => 'submit'
						  );
?>

<section class="no-background no-borders">
    <div class="float-right">
        <?php echo anchor('team/','<button><< Back To Teams</button>'); ?>
    </div>
</section>

<section>
	
		<?php echo $this->message->display(); ?>
		
			<hgroup>		
				<h1>Create A Team on BC Skills</h1>
				<h2>Add your team and start recruiting co-founders or co-workers.</h2>
			</hgroup>
			<?php echo validation_errors('<p class="error-message">', '</p>'); ?>
			<?php echo form_open('team/add', array("id" => "add-team")); ?>
			
			<?php echo form_label('Team Name:', 'team_name'); echo form_input($team_name); ?>
			<?php echo form_label('Team Description:', 'team_description'); echo form_textarea($team_description); ?>
            <?php echo form_label('What does your team need? What are you looking for?:', 'team_needs'); echo form_textarea($team_needs); ?>
			<?php echo form_submit($submit_button); ?>

			<?php echo form_close(); ?>

</section>		
	
<?php $this->load->view('includes/footer'); ?>