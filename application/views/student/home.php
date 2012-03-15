<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('includes/header');
?>

	<?php $this->load->view('student/includes/leftsidebar'); ?>
	
	<div id="right-column">
		
		<?php $this->load->view("student/includes/navigation"); ?>
		
		<div class="item non-user-item">
			<hgroup>
				<h1>Search for Skills at BC</h1>
				<h2>What type of student are you looking for?</h2>
			</hgroup>
		</div>
			
		<?php echo $this->message->display(); ?>
		
		<?php echo validation_errors('<div class="redAlert">', '</div>'); ?>
		<?php echo form_open('student/search/', 'id="search"'); ?>
		<?php 
		
		$query = array(
						'name' 	=> 'query',
						'value' => set_value('query'),
						'placeholder' => 'Search names, skills, majors...'
					  );
		
				?>
		<?php echo form_input($query); ?>
		<input type="submit" name="submit" value="Search">
		<br />
		<?php $this->load->view('student/message_board'); ?>
		<br /><br />
		<?php $this->load->view('student/calendar'); ?>
	</div>
	
<?php $this->load->view('includes/footer'); ?>