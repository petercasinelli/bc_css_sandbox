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
                <h2 style="font-size:20px; line-height:25px;">Create an account and find a co-founder, team member, or a team in seconds!</h2>
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

<section>
    <div class="grid">
        <div class="half">
            <h1 style="font-size:20px; line-height:25px;">BCVC Team Registration</h1>
            <p>Are you competing in the Boston College Venture Competition? Easily register on BC Skills, add your current team members, and start recruiting other team members. It only takes 30 seconds to set up a profile, team, and presence on BC Skills. Get started now!</p>
            <a href="#"><button style="font-size:14px;">Register for BCVC &raquo;</button></a>
        </div>
        <div class="half">
            <h1 style="font-size:20px; line-height:25px;">BC Skills Testimonial</h1>
            <h2>Matthew Keemon (A&S 2013)</h2>
            <img src="https://s3.amazonaws.com/bcskills-profile-pictures/keemon-testimonial.jpg" height="65" width="65" style="float:left; padding:5px;" />
            <p><small>"BCSkills empowers startups and developers to connect seamlessly. Through my use of the service, I have been approached with numerous employment opportunities. A startup dress.me reached out to me through BCSkills, which led to valuable work experience..."</small></p>
            <a href="#" class=""><button style="font-size:14px;">Read the Full Testimonial &raquo;</button></a>
        </div>
    </div>
</section>


<hr>


</div>

<?php $this->load->view('includes/footer'); ?>