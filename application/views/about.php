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
        <h1>About BC Skills</h1>
        <h2>BC Skills allows you to find other students at Boston College working on start-ups or looking for a start-up team to join</h2>

    </header>
    <br />
    <h1>Who is it for?</h1>
    <p>
    <h2>Idea People</h2>
    <p>
        So you have an idea? One of the most difficult things that entrepreneur's face
        is building a team that can not only build your idea, but solve problems in the
        future. BC Skills attempts to make this recruitment and search easier by connecting BC students through skills.
        Let's say you need to create a web application- simply search BC Skills for students who have skills in
        PHP, Ruby on Rails, Python/Django, MySQL, PostgreSQL, etc! <?php echo anchor('register/student', 'Click here to create an account and get started!'); ?>
    </p>
    <h2>Developers</h2>
    <p>
        Do you have development skills but lack any ideas or projects you are working on? BC Skills makes it easy
        to collaborate and find other students working on start-up ideas. Search teams, view team members, get the latest
        team updates, get in touch and join a team! <?php echo anchor('register/student', 'Click here to create an account and get started!'); ?>

    </p>
    <h2>Anything In Between!</h2>
    <p>
        Maybe you have a talent for social media or marketing. Or, you may be waiting to co-found the next great idea. Either way, BC Skills
        is definitely for you. Stay up to date with the latest start-ups on Boston College's campus and view student profiles. When the opportunity
        presents itself, join a start-up and go for it! <?php echo anchor('register/student', 'Click here to create an account and get started!'); ?>
    </p>
</section>


<?php $this->load->view('includes/footer'); ?>