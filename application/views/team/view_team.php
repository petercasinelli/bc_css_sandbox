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
			
			<?php echo $this->message->display(); ?>
		
			<?php echo validation_errors('<p class="red-alert">', '</p>'); ?>
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
			<?php echo form_close(); ?>
		</div>
		
		<?php $this->load->view("team/team_block", array("team"=>$team)); ?>
		team Members
		<?php foreach($team_members as $student):?>
		<?php $this->load->view("student/student_block", array("student"=>$student, "id" => $student->student_id))?>
		<?php endforeach;?>
		
		
		
		
	</div>
	
<?php $this->load->view('includes/footer'); ?>