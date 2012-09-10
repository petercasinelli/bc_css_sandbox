<?php
$this->load->helper('form');
echo form_open('authentication/student/login', array("id" => "edit-profile")); ?>
<?php

$email = array(
    'name' 	=> 'email',
    'value' => set_value('email'),
    'id' => 'field'
);

$password = array(
    'name' 	=> 'password',
    'id' => 'field'
);


$submit_button = array(
    'name'	=> 'submit',
    'value' => 'Login',
    'type'  => 'submit'
);

?>
<?php echo form_label('E-Mail Address:', 'email'); echo form_input($email);?>
<?php echo form_label('Password:', 'password'); echo form_password($password); ?>
<?php echo form_submit($submit_button); ?>
<?php echo form_close(); ?>