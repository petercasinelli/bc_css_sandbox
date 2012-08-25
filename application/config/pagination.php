<?php
//default pagination settings
$config['base_url'] = base_url();
$config['use_page_numbers'] = FALSE;
$config['per_page'] = 5; 
$config['display_pages'] = TRUE;
$config['num_tag_open'] = '<span class="pagination_digit">';
$config['num_tag_close'] = '</span>';
$config['cur_tag_open'] = '<b class="curr_tag">';
$config['cur_tag_close'] = '</b>';
$config['next_tag_open'] = '<span class="next_tag">';
$config['next_link'] = 'Next';
$config['next_tag_close'] = '</span>';
$config['prev_tag_open'] = '<span class="prev_tag">';
$config['prev_link'] = 'Previous';
$config['prev_tag_close'] = '</span>';
$config['full_tag_open'] = '<p class="pagination">';
$config['full_tag_close'] = '</p>';
	
define('PAGINATION_PER_PAGE', $config['per_page']);
/*end of ci pagination located at application/config*/