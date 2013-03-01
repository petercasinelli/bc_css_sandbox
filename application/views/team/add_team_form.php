<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');

	$team_name = array(
				'name' 	=> 'team_name',
				'value' => set_value('team_name')
				 );

    $bcvc_team = array(
                'name' => 'bcvc_team',
                'value' => set_value('bcvc_team', 1)
    );

	$team_description = array(
				'name' 	=> 'team_description',
				'value' => set_value('team_description'),
                'id' => 'team-description',
                'title' => 'What is your start-up working on? It is better to give potential co-founders and students
                an idea of what you are working on, rather than saying \'Contact me for more information\''
				 );

    $team_needs = array(
        'name' => 'team_needs',
        'value' => set_value('team_needs'),
        'id'    => 'team-needs',
        'title' => 'Try to explain specific needs rather than saying you need a marketer or a coder. What experience
        should they have? What programming languages should they know or be familiar with?'
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
    <p>The first step to building a successful company is building the right team. BC Skills allows you to build your
    start-up presence within BC's entrepreneurial community. Your team's page can be a starting point for students to
    learn about what you are working on.</p>
</section>
<section>
    <?php echo validation_errors('<p class="error-message">', '</p>'); ?>
    <?php echo form_open('team/add', array("id" => "add-team")); ?>
    <div class="grid">
        <div class="half">
            <header>
                <h1>Team Information</h1>
            </header>
            <?php echo form_label('Team Name:', 'team_name'); echo form_input($team_name); ?>
        </div>
        <div class="half">
            <header>
                <h1>Boston College Venture Competition</h1>
                <h2>Will you be entering BCVC this year?</h2>
            </header>
            <?php echo form_label('Yes', 'bcvc_team'); echo form_checkbox($bcvc_team); ?>
        </div>
    </div>

</section>

<section>
    <hgroup>
        <h1>What You Are Working On</h1>
        <h2>What is your start-up working on?</h2>
    </hgroup>

<div class="grid">

    <div class="half">
        <?php echo form_label('Start-Up Description:', 'team_description'); echo form_textarea($team_description); ?>
    </div>
    <div class="half">
        <?php echo form_label('What does your team need? What are you looking for?:', 'team_needs'); echo form_textarea($team_needs); ?>
    </div>
    <div class="half">
        <?php echo form_submit($submit_button); ?>
        <?php echo form_close(); ?>
    </div>

</div>



</section>


<?php
$data["jquery"] = '
$(function(){
    $("#team-description").tipsy({gravity:"w", trigger:"focus"});
    $("#team-needs").tipsy({gravity:"w", trigger:"focus"});
});';
$this->load->view('includes/footer', $data); ?>