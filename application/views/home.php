<?php $this->load->view('includes/header'); ?>

<?php
if (strlen($this->message->display()) > 0):
    ?>
<section><?php echo $this->message->display(); ?></section>

<?php
endif;

?>

<div class="container">

    <div class="hero-unit" style="padding-top:5px; padding-bottom:25px; margin-top:10px; margin-bottom:15px;">

        <h2>Start-Ups At Boston College</h2>
        <h4 style="color:#636363; text-transform: none;">Create an account and find a co-founder, team member, or a team in seconds!</h4>
        <p>Starting or joining a start-up can be difficult when you don't know where to look for co-founders and team members. BC Skills abstracts this process and allows you to directly contact other students who you can work with. It doesn't matter if you are in the business school or a developer, BC Skills is for you!
        </p>
        <div class="row">

            <div class="span5">
                <p><h3 style="color:#636363; text-transform: none;">Need an account?</h3></p>
                <a href="#" class="btn btn-primary btn-large">Create An Account With Facebook &raquo;</a>
            </div>
            <div class="span5">
                <p><h3 style="color:#636363; text-transform: none;">Already have an account?</h3></p>
                <a href="#" class="btn btn-success btn-large">Login With Facebook&raquo;</a>
            </div>
        </div>
    </div>

    <!-- Example row of columns -->
    <div class="row">

        <div class="span6 hero-unit" style="padding:10px 20px 20px 20px;">
            <h2>BCVC Team Registration</h2>
            <p>Are you competing in the Boston College Venture Competition? Easily register on BC Skills, add your current team members, and start recruiting other team members. It only takes 30 seconds to set up a profile, team, and presence on BC Skills. Get started now!</p>
            <p><a class="btn btn-primary .btn-large" href="#">Register for BCVC &raquo;</a></p>
        </div>
        <div class="span5 hero-unit" style="padding:10px 20px 20px 20px;">
            <h2>Testimonial</h2>
            <b>Matthew Keemon A&S 2013</b>
            <br />
            <img src="<?php echo base_url(); ?>assets/images/testimonials/keemon-testimonial.jpg" height="65" width="65" class="img-polaroid" style="float:left;" />
            <p><small>"BCSkills empowers startups and developers to connect seamlessly. Through my use of the service, I have been approached with numerous employment opportunities. A startup dress.me reached out to me through BCSkills, which led to valuable work experience..."</small></p>
            <p><a class="btn btn-primary .btn-large" href="#">Read the Full Testimonial &raquo;</a></p>
        </div>
    </div>



    <hr>

    <footer>
        <p>&copy; Company 2013</p>
    </footer>

</div>

<?php $this->load->view('includes/footer'); ?>