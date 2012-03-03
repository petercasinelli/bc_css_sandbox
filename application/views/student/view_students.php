<?php
$this->load->helper('form');
$this->load->view('includes/header');
?>
	<?php $this->load->view('student/leftsidebar.php'); ?>
	
	<div id="right-column">
				<div class="item">
			<hgroup>
				<h1>Search For A Student</h1>
				<h2>with search term: <?php echo $search_query; ?></h2>
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
		
			<?php
			
				if (empty($students)):
					echo 'No students exist with your search requirements.';
				else:
			?>
			<hgroup>
				<h1>Your search returned <?php echo count($students); ?> student<?php if (count($students) > 1) echo 's'; ?></h1>
			</hgroup>
			<br />
			<?php
				endif;
			
				foreach($students as $student)
				{
					//echo anchor('student/view/' . $student->student_id, $student->first . ' ' . $student->last . '<br />');
					$data["student"] = $student;
					//we want to put this in assoc 
					$this->load->view('student/student_block', $data);
				}
			?>	
		
	</div>
	
<?php $this->load->view('includes/footer'); ?>