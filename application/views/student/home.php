<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');
?>

<?php if (strlen($this->message->display()) > 0): ?>
<section>
    <?php echo $this->message->display(); ?>
</section>
<?php endif;?>

<?php $this->load->view('student/tutorial_slider'); ?>

<?php
$data["jquery"] = '
		$(function(){
			$("#slides").slides({
				preload: true,
				preloadImage: "img/loading.gif",
				play: 5000,
				pause: 5000,
				hoverPause: true,
				paginationClass: "slide_pagination"
			});

';
        if (!empty($profile_missing)):


        $data["jquery"] = $data["jquery"] . '
            $("#green_button").click(function(){
        var skillsVar = $(".as-values").val();
        var bioVar = $("#bio").val();
        if (!skillsVar && !bioVar){
            $("#modal_notice").html("<span style=\"color:#ff0000;\">You must enter skills and a bio.</span>");
        } else {
       $.ajax({
           url: "'.base_url().'/student/ajax_edit/",
            type: "POST",
            data: {skills: skillsVar, bio: bioVar},
           success: function(response, textStatus, jqXHR){
               // log a message to the console
               console.log("It worked!");
               console.log("Response was: " + response);
               $(".modal_close").click();
           },
           // callback handler that will be called on error
           error: function(jqXHR, textStatus, errorThrown){
               // log the error to the console
               console.log(
                   "The following error occured: "+
                       textStatus, errorThrown
               );
               console.log("Response was: " + response);
           },
           // callback handler that will be called on completion
           // which means, either on success or error
           complete: function(){
               // enable the inputs
               console.log("Completed");

           }
        });
        }
    });

        $("a[rel*=leanModal]").leanModal({closeButton: ".modal_close"});
        $("#loadModal").click();

		$("#skills").autoSuggest("'.base_url().'index.php/student/autosuggest_skills", {startText: "Enter skills here.", searchObjProps: "name", selectedItemProp: "name", selectedValuesProp: "name", minChars: 1, matchCase: false});

		$("#edit-profile [title]").tipsy({trigger:"focus", gravity:"w"});';

        endif;

$data["jquery"] = $data["jquery"] . '
		});';

?>
<?php if (!empty($profile_missing)): ?>

<a id="loadModal" rel="leanModal" name="signup" href="#signup"></a>
<div id="signup" class="rounded_corners">
<div class="grey_header" style="padding:10px;">
<span style="font-size:18px; font-weight:bold; text-shadow:0 1px 0 #ffffff;">Complete Your Profile</span>
    <br /><div style="width:80%">Add your skills and a personal bio to help other students get in touch with you!</div>
    <a class="modal_close" href="#"></a>
</div>
    <?php echo form_open('#', array("id" => "edit-profile")); ?>
    <?php

    $skills = array(
        'id'=>'skills',
        'name' => 'skills',
        'title' => 'ie- HTML, PHP, Marketing, PR, Accounting. Comma separated if multiple',
        'value' => set_value('skills'),
        'style' => 'width:340px;'
    );
    $bio = array(
        'id'    => 'bio',
        'name' 	=> 'bio',
        'value' => set_value('bio', $student_logged_in->bio),
        'title' => 'Tell us a little bit about yourself. Are you looking to get involved in a startup? Are you looking for co-founders? Or just looking to work on a project?',
        'style' => 'height:100px;'
    );

    $submit_button = array(
        'name'	=> 'submit',
        'value' => 'Save Profile',
        'type'  => 'button',
        'id'    => 'green_button',
        'style' => 'float:right;'
    );

    ?>
    <?php echo form_label('Skills:', 'skills'); echo form_input($skills);?>
    <?php echo form_label('Personal Bio:', 'bio'); echo form_textarea($bio); ?>
    <div style="float:left; width:250px; height:40px; font-size:12px;" id="modal_notice"></div>
    <?php echo form_submit($submit_button); ?>

    <?php echo form_close(); ?>
</div>
<?php endif; ?>

<?php if ($profile_completion != '100%'): ?>
<section>
    <div class="grid">
        <div class="quarter">
            <section>
                <header>
                    <h1>Complete Your Profile</h1>
                    <?php echo "Your profile is $profile_completion complete"; ?>
                </header>
            </section>
        </div>
        <div class="three-quarters">
            <section>
                <?php echo anchor('/student/edit_form', 'Complete My Profile Now', array('class' => 'blueButton', 'style' => 'width:182px;')); ?>
            </section>
        </div>
    </div>
</section>
<?php endif; ?>
<section>
    <div class="grid">
        <div class="half">
            <section>
                <header>
                    <h1>New Teams</h1>
                </header>
                <?php
                foreach($new_teams as $new_team):
                    $data["team"] = $new_team;
                    $this->load->view('team/new_team_block.php', $data);
                endforeach;
                ?>
                <?php echo anchor('/team', 'View All Teams'); ?>
            </section>
        </div>
        <div class="half">
            <section>
                <header>
                    <h1>New Students</h1>
                </header>
                <?php
                foreach($new_students as $new_student):
                    $data["student"] = $new_student;
                    $this->load->view('team/member_block.php', $data);
                endforeach;
                ?>
                <?php echo anchor('student/view_all', 'View All Students'); ?>

            </section>

        </div>
    </div>
</section>


<?php $this->load->view('includes/footer', $data); ?>