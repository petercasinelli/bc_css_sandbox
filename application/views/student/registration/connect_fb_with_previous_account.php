<?php
$this->load->helper('form');


$password = array(
    'name' 	=> 'password'
);

$submit_button = array(
    'name'	=> 'submit',
    'value' => 'Connect Accounts',
    'type'  => 'submit'
);


$this->load->view('includes/header');
?>

<?php if (strlen($this->message->display()) > 0): ?>
<section>
    <?php echo $this->message->display(); ?>
</section>
<?php endif; ?>

<section>

    <hgroup>
        <h1>Create A Profile on BC Skills</h1>
        <h2>We think you may have already registered with BC Skills in the past:</h2>
    </hgroup>

    <div class="grid">
        <div class="half">
            <?php echo form_open('student/'); ?>
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
        <div style="position:absolute; left:575px; top:230px; color:#253f7a; font-size: 30px; font-weight: bold;">
            OR
        </div>
        <div class="half" style="text-align: center;">
            <br />If the the name and e-mail address don't look like yours, create a new account with Facebook
            <br />
            <a href="<?php echo base_url(); ?>" id="facebookButton"><img src="<?php echo base_url(); ?>assets/images/facebook_button.png"></a>
        </div>
    </div>

</section>


<?php $this->load->view('includes/footer'); ?>