<?php
$this->load->helper('form');

$search = array(
    'name' => 'query',
    'class' => 'typeahead',
    'id' => 'search',
    'placeholder' => 'ie- Python',
    'style' => 'float:left; margin-right:10px;');

$submit_button = array(
    'name'	=> 'submit',
    'value' => 'Search',
    'type'  => 'submit',
    'class' => 'typeahead_submit'
);

echo form_open('/student/submit_query');
echo form_input($search);
echo form_submit($submit_button);
echo form_close();

?>