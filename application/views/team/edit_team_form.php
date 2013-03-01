<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');
$this->load->view('team/includes/back_to_team');
	$team_name = array(
				'name' 	=> 'team_name',
				'value' => set_value('team_name', $team_data->team_name)
				 );

    $bcvc_team = array(
        'name' => 'bcvc_team',
        'value' => set_value('bcvc_team', 1),
        'checked' => $team_data->bcvc_team
    );

	$team_description = array(
				'name' 	=> 'team_description',
				'value' => set_value('team_description', $team_data->team_description)
				 );

    $team_needs = array(
        'name' => 'team_needs',
        'value' => set_value('team_needs', $team_data->team_needs)
    );
						
	$submit_button = array(
							'name'	=> 'submit',
							'value' => 'Edit Your Team',
							'type'  => 'submit'
						  );
?>

<section>
		<?php echo $this->message->display(); ?>
		
			<hgroup>		
				<h1><?php echo $team_data->team_name; ?></h1>
				<h2>Edit your team information.</h2>
			</hgroup>

			<?php echo validation_errors('<p class="red-alert">', '</p>'); ?>
			<?php echo form_open('team/edit/'.$team_data->team_id, array("id" => "edit-team")); ?>
			
			<?php echo form_label('Team Name:', 'team_name'); echo form_input($team_name); ?>
            <h2>Are you competing in BCVC this year?</h2>
            <?php echo form_label('Yes', 'bcvc_team'); echo form_checkbox($bcvc_team); ?>
			<?php echo form_label('Team Description:', 'team_description'); echo form_textarea($team_description); ?>
            <?php echo form_label('What does your team need? What are you looking for?:', 'team_needs'); echo form_textarea($team_needs); ?>

    <?php echo form_submit($submit_button); ?>

			<?php echo form_close(); ?>	
</section>			

	
<?php $this->load->view('includes/footer'); ?>