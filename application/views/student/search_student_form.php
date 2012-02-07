<?php
$this->load->helper('form');
?>

	<?php echo validation_errors('<div class="redAlert">', '</div>'); ?>
			
	<?php echo form_open('student/search/'); ?>
	<?php 
	
	$skills = array(
					'name' 	=> 'skills',
					'value' => set_value('skills')
				  );
						

	$submit_button = array(
							'name'	=> 'submit',
							'value' => 'Search for student',
							'type'  => 'submit'
						  );
	
			?>
<div><?php echo form_label('Skills (separate with commas):', 'skills-input'); echo form_input($skills); ?></div>
<div><?php echo form_submit($submit_button); ?></div>

<?php echo form_close(); ?>