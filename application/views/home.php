<?php $this->load->view('includes/header'); ?>

<?php
if (strlen($this->message->display()) > 0):
    ?>
<section><?php echo $this->message->display(); ?></section>

<?php
endif;

?>

<section>
    <div class="grid">
        <div class="half">
            <header>
                <h1 style="font-size:28px; line-height:30px;">Find Students Working On Start-ups At Boston College</h1>
                <hr>
                <h2 style="font-size:20px; line-height:25px;">Create an account in seconds and find a co-founder, team member, or a team!</h2>
            </header>
            <br />
            <p>
                Starting or joining a start-up can be difficult when you don't know where to look for co-founders and team members. BC Skills abstracts this process and allows you to directly contact other students who you can work with. It doesn't matter if you are in the business school or a developer, BC Skills is for you!
            </p>
        </div>
        <div class="half">
            <section>
                <header>

                </header>
                <?php echo validation_errors('<p class="error-message">', '</p>'); ?>
                <?php echo $this->load->view('student/registration/forms/fb_registration_form'); ?>
            </section>
            <hr style="width:400px;">
            <section class="listing">
                <div style="width:90%; text-align: center;">
                    <a href="javascript:;" onclick="toggleExpand(0)" id="sign-up-without-fb">Sign up without Facebook</a>
                </div>
                <div id="item0" style="display:none; margin:auto;">
                    <?php $this->load->view('student/registration/forms/regular_registration_form'); ?>
                </div>
            </section>
        </div>
    </div>
</section>


<?php $this->load->view('includes/footer'); ?>