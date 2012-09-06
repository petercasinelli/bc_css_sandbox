<?php
$this->load->helper('form');

$search = array(
    'name' => 'query',
    'id' => 'search',
    'placeholder' => 'ie- PHP',
    'style' => 'width:550px; float:left; margin-right:10px;');

$submit_button = array(
    'name'	=> 'submit',
    'value' => 'Search',
    'type'  => 'submit'
);

echo form_open('/student/search');
echo form_input($search);
echo form_submit($submit_button);
echo form_close();

?>