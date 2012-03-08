<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('includes/header');
?>

	<?php $this->load->view('student/leftsidebar.php'); ?>
	
	<div id="right-column">
		<div class="item">
			<hgroup>
				<h1>Search for Skills at BC</h1>
				<h2>What type of student are you looking for? Search below:</h2>
			</hgroup>
		</div>
		<div style="padding:5px;">
			<?php $this->message->display(); ?>
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
		</div>
		<br />
		<div class="item">
			<hgroup>
				<h1>BC Skills Message Board</h1>
				<h2>Stay up to date with the latest on the start-up and computer science community at Boston College</h2>
			</hgroup>
		</div>
		<div class="item">
			<hgroup>
				<h2>BC CS Society Releases BC Skills</h2>
				<h3>3/6/2012</h3>
			</hgroup>
			<p>The Boston College Computer Science Society has released the <b>BC Skills</b> open source platform. 
				Not only are we allowing anyone to contribute and extend our platform using <a href="https://github.com/pcas00/bc_css_sandbox" target="_blank">GitHub</a>,
				we are also connecting the Boston College community and hope to encourage student entrepreneurs to collaborate
				by creating startups.</p>
				<p>If you are interested in contributing to our open source project, fork our repository by visiting <a href="https://github.com/pcas00/bc_css_sandbox" target="_blank">GitHub</a>.</p>
				<p>If you would like to list your startup on the BC Skills message board, contact <a href="mailto:peter.casinelli@bc.edu">peter.casinelli@bc.edu</a> .</p>
		</div>
	</div>
	
<?php $this->load->view('includes/footer'); ?>