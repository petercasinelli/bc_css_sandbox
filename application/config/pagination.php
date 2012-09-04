<?php
//default pagination settings
$config['base_url'] = base_url();
$config['use_page_numbers'] = FALSE;
$config['per_page'] = 5; 
$config['display_pages'] = TRUE;
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>  ';
$config['cur_tag_open'] = '<li>';
$config['cur_tag_close'] = '</li> ';
$config['next_tag_open'] = '';
$config['next_link'] = '';
$config['next_tag_close'] = '';
$config['prev_tag_open'] = '';
$config['prev_link'] = '';
$config['prev_tag_close'] = '';
$config['full_tag_open'] = '<nav class="pagination"><ul>';
$config['full_tag_close'] = '</ul></nav>';
	
define('PAGINATION_PER_PAGE', $config['per_page']);
/*end of ci pagination located at application/config*/