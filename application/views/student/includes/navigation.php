<header>
		<div>
			<div id="logo">
				<a href="http://bcskills.com"><img src="<?php echo base_url(); ?>/assets/images/logo.png" alt="BC Skills"></a>
			</div>
			
			<nav>
<?php
echo anchor("/", "Home");
echo anchor("/student/edit", "Edit Profile");
echo anchor("/student/view_all", "Students");
echo anchor("/team/", "Teams");
?>
			</nav>
			<div class="float-right">
				<form class="float-right">
					<input type="text" placeholder="Search for students" id="search">
				</form>
				<?php echo anchor('authentication/student/logout', 'Logout', array('class' => 'float-right')); ?>
			</div>
		</div>
	</header>