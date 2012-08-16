<section class="listing">
			<header>
				<h2><?php echo $student->first . ' ' . $student->last; ?></h2>
				<h3><?php echo $student->school_id . ' ' . $student->year; ?> - <?php echo $student->major_id ?>
					<br />Arts & Sciences 2014 - Computer Science</h3>
			</header>
			<div class="float-right">
				<span class="social-links">
					<?php
					if (!empty($student->twitter)):
					?>
					<a href="http://www.twitter.com/<?php echo $student->twitter; ?>" class="twitter" title="Twitter" target="_blank"></a>
					<?php endif;
					if (!empty($student->facebook)):
					?>
					<a href="<?php echo $student->facebook; ?>" class="facebook" title="Facebook" target="_blank"></a>
					<?php
					endif;
					if (!empty($student->linkedin)):
					?>
					<a href="<?php echo $student->linkedin; ?>" class="linkedin" title="LinkedIn" target="_blank"></a>
					<?php
					endif;
					if (!empty($student->dribbble)):
					?>
					<a href="<?php echo $student->dribbble; ?>" class="dribbble" title="Dribbble" target="_blank"></a>
					<?php
					endif;
					if (!empty($student->github)):
					?>
					<a href="<?php echo $student->github; ?>" class="github" title="Github" target="_blank"></a>
					<?php
					endif;
					?>
				</span>
				<a href="mailto:<?php echo $student->email; ?>">Contact</a>
			</div>
			<hr>
			<p>
				<b>Bio</b>: <?php echo $student->bio; ?>
				<b>Skills</b>: <?php echo $student->skills; ?>
				<br>
				<b>Software</b>: <?php echo $student->software; ?>
			</p>
</section>
		