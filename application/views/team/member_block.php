<section class="listing">
			<header>
				<?php $pic_src = student_picture_src($student->student_id, $student->oauth_uid, $student->picture); ?>
				<img src="<?php echo $pic_src; ?>" width="25px" height="25px"/>
				<?php $full_name = $student->first . ' ' . $student->last; ?>
				<h2><?php echo anchor("student/view_student/$student->student_id", $full_name); ?></h2>
				<h3><?php echo $student->school_id . ' ' . $student->year; ?> - <?php echo $student->major_id ?>
				<h3><?php if($student->status) echo $student->status; ?></h3>
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
	
</section>