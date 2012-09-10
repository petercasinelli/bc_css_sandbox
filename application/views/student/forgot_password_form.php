<?php
$this->load->helper('form');

$email = array(
    'name' 	=> 'email',
    'value' => set_value('email'),
    'id' => 'field'
);


$submit_button = array(
    'name'	=> 'submit',
    'value' => 'Reset Password',
    'type'  => 'submit'
);

echo form_open('reset_password');
echo form_label('E-Mail Address:', 'email'); echo form_input($email);
echo form_submit($submit_button);
echo form_close(); ?>