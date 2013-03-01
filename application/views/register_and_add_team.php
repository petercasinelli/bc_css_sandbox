<?php

$this->load->view('includes/header');
?>

<?php if (strlen($this->message->display()) > 0 || strlen(validation_errors()) > 0): ?>
<section>
    <?php echo $this->message->display();
    echo validation_errors('<p class="error-message">', '</p>');    ?>
</section>
<?php endif; ?>

<section>
    <hgroup>
        <h1 style="font-size:24px;">Add Your Team To BC Skills</h1>
        <h2 style="font-size:18px;">Connect With Facebook</h2>
    </hgroup>
    <p>If you already have an account or you need to create a new account, login with Facebook. After logging in,
        you will be able to create your team, invite team members, and recruit other students.</p>
    <div class="grid">
            <a href="<?php echo base_url(); ?>/authentication/student/fb_login_and_redirect/add_team" id="facebookButton"><img src="<?php echo base_url(); ?>assets/images/facebook_button.png"></a>
    </div>
<br />
</section>

<?php $this->load->view('includes/footer'); ?>