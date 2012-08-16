<header>
		<div>
			<div id="logo">
				<a href="http://bcskills.com"><img src="<?php echo base_url(); ?>/assets/images/logo.png" alt="BC Skills"></a>
			</div>
			
			<nav>
			<?php
				
				echo anchor(base_url(), 'Home', ($current_page == 'index') ? array('class' => 'active') : '');
				echo anchor('about', 'About', ($current_page == 'about') ? array('class' => 'active') : '');
				echo anchor('contact', 'Contact', ($current_page == 'contact') ? array('class' => 'active') : '');
			?>
			</nav>
			<div class="float-right">
				<form class="float-right">
					<input type="text" placeholder="Search..." id="search">
				</form>
				<?php echo anchor('authentication/student', 'Login', array('class' => 'float-right'));
				echo anchor('register/student', 'Sign Up', array('class' => 'float-right', 'style' => 'padding-right:20px;')); ?>
			</div>
		</div>
	</header>