<?php
$this->load->helper('form');
$this->load->view('includes/header');
?>

	<?php $this->load->view('student/leftsidebar.php'); ?>
	
	<div id="right-column">
		
		<div class="item">
			<hgroup>
				<h1>Students</h1>
				<h2>What type of student are you looking for? Search below:</h2>
			</hgroup>
			<?php echo form_open('student/search/', 'id=search'); ?>
			<?php 
			
			$query = array(
							'name' 	=> 'query',
							'value' => set_value('query'),
							'placeholder' => 'Search names, skills, majors...'
						  );

			
					?>
			<?php echo form_input($query); ?>
			<input type="submit" name="submit" value="Search">
		</div>
		
	</div>
	
<?php $this->load->view('includes/footer'); ?>