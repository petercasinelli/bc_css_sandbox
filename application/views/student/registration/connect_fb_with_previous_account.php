<?php
$this->load->helper('form');


$password = array(
    'name' 	=> 'password',
    'type' => 'password'
);

$submit_button = array(
    'name'	=> 'submit',
    'value' => 'Connect Accounts',
    'type'  => 'submit'
);


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
        <h1>Create A Profile on BC Skills</h1>
        <h2>We think you may have already registered with BC Skills in the past:</h2>
    </hgroup>
    <div style="position:relative; left:410px; top:100px; color:#253f7a; font-size: 30px; font-weight: bold; width:10px;">
        OR
    </div>
    <div class="grid">
        <div class="half">
            <?php echo form_open('authentication/student/login_to_merge_with_facebook'); ?>
            Simply sign in below if this information matches yours and you created an account on BC Skills in the past: <br /><br/>
            Name: <h2 style="display: inline;"><?php echo $student->first . ' ' . $student->last; ?></h2> <br />
            E-mail: <h2 style="display: inline;"><?php echo $student->email; ?></h2> <br />
            <?php
            echo form_label('Password:', 'password'); echo form_input($password);
            echo form_submit($submit_button);
            echo form_close();
            ?>
            <br />
            <?php
            echo anchor('/forgot_password', 'Forget your password?', array('target'=>'_blank'));
            ?>

        </div>

        <div class="half" style="text-align: center;">
            <br />If the the name and e-mail address don't look like yours, create a new account with Facebook
            <br />
            <a href="<?php echo base_url(); ?>/authentication/student/fb_login_confirmed" id="facebookButton"><img src="<?php echo base_url(); ?>assets/images/facebook_button_4.png"></a>
        </div>
    </div>

</section>


<?php $this->load->view('includes/footer'); ?>