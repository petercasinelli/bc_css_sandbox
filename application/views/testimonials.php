<?php $this->load->view('includes/header'); ?>

<?php
if (strlen($this->message->display()) > 0):
    ?>
<section><?php echo $this->message->display(); ?></section>

<?php
endif;

?>

<section>
    <header>
        <h1>BC Skills Testimonials</h1>
        <h2>See how we've helped both students and start-ups across the country!</h2>
    </header>
<br/>
    <h1>Matthew Keemon</h1>
    <h2>A&S 2013</h2>
    <p>
        <img src="https://s3.amazonaws.com/bcskills-profile-pictures/keemon-testimonial.jpg" height="65" width="65" style="float:left; padding:5px;" />
        BC Skills empowers startups and developers to connect seamlessly. Through my use of the service, I have been approached with numerous employment opportunities. In March of 2012, the Michigan based fashion startup dress.me reached out to me through BCSkills, which led to valuable work experience.  In the Fall of 2012, it led to another development position with Jebbit, 2010 BCVC winner and alumnus of Summer@Highland.  The simplicity and ease of use of BCSkills promotes a community of growing entrepreneurship to all those with ties to Boston College.</p>
</section>


<?php $this->load->view('includes/footer'); ?>