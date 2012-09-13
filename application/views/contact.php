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
        <h1>Contact BC Skills</h1>
    </header>
    <p>
        If you have any questions, comments, or suggestions for BC Skills, please send an e-mail to <a href="mailto:bccss.development@gmail.com">bccss.development@gmail.com</a>.
    </p>
</section>


<?php $this->load->view('includes/footer'); ?>