<?php $this->load->view('includes/header'); ?>
<body>

	<?php $this->load->view('includes/leftsidebar'); ?>
	
	<div id="right-column">
	
		<?php $this->load->view("includes/navigation"); ?>
		
		<div class="item non-user-item">
			<hgroup>		
				<h1>Welcome to BC Skills</h1>
				<h2>What skills are you looking for?</h2>
			</hgroup>
		</div>
		
		<div class="item non-user-item text-item">
			<hgroup>
				<h2>The Boston College Computer Science Society is excited to announce our new open source project, BC Skills!</h2>
			</hgroup>
			<p>BC Skills is an open source platform built by Boston College students for Boston College students. This project has two
				main goals: to help <b>connect</b> technical and entrepreneurial students to build new start ups, and <b>teach</b> students
				how to collaborate through open source applications.</p>
			<p>Are you interested in getting involved? The first step is to <?php echo anchor('register/student', 'register'); ?>. Then, start collaborating on <?php echo anchor("https://github.com/pcas00/bc_css_sandbox", "GitHub", 'target="_blank"'); ?>.</p>
			<p>If you need help getting started, refer to our help documentation, or contact <a href="mailto:peter.casinelli@bc.edu">peter.casinelli@bc.edu</a>.</p>
		</div>
		
	<?php $this->load->view('student/calendar'); ?>

		
	</div>
	
<?php $this->load->view('includes/footer'); ?>