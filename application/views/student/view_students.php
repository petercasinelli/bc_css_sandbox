<?php
$this->load->helper('form');
$this->load->view('includes/header');
?>
	<?php $this->load->view('student/includes/leftsidebar.php'); ?>
	
	<div id="right-column">
	<?php $this->load->view("student/includes/navigation"); ?>
		
		<div class="item">
			<hgroup>
				<h1>Search for Skills at BC</h1>
				<h2>What type of student are you looking for?</h2>
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
			<?php echo form_close(); ?>
		</div>
		
			<?php
			
				if (empty($students)):
					echo '<p>No students exist with your search requirements.</p>';
				else:
			?>
			<p>Your search returned <b><?php echo count($students); ?> student<?php if (count($students) > 1) echo 's'; ?></b></p>
			<br />
			<?php
				endif;
				
				//Counter kept for expand/hide student profile
				$i = 0;
				foreach($students as $student)
				{
					//echo anchor('student/view/' . $student->student_id, $student->first . ' ' . $student->last . '<br />');
					$data["student"] = $student;
					$data["id"] = $i;
					//we want to put this in assoc 
					$this->load->view('student/student_block', $data);
					$i++;
				}
			?>	
		
	</div>
	
<?php $this->load->view('includes/footer'); ?>