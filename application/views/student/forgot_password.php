<?php
$this->load->helper('form');
$this->load->view('includes/header');
?>
<?php if (strlen($this->message->display()) > 0): ?>
<section>
    <?php echo $this->message->display(); ?>
</section>
<?php endif;
?>
<section>
    <h1>Reset Your Password</h1>
    <h2>Enter your e-mail address below and we will send you a new password</h2>
    <?php echo validation_errors('<p class="error-message">', '</p>'); ?>
    <?php
    $this->load->view('student/forgot_password_form');
    ?>


    </div>
    <br />
</section>

<?php $this->load->view('includes/footer'); ?>