		<div class="item">
			<a href="javascript:;" class="expand" id="expand1" onClick="toggleExpand('1');">Expand</a>
			<hgroup onClick="toggleExpand('1');">
				<img src="https://si0.twimg.com/profile_images/1733086372/pic_reasonably_small.jpg">
				<h1><?php echo $student->first . ' ' . $student->last; ?></h1>
				<h2><?php echo $student->major . ' ' . $student->year; ?></h2>
			</hgroup>
			<p>
				<b>Skills:</b> <?php echo $student->skills; ?>
				<br>
				<b>Software:</b> <?php echo $student->software; ?>
			</p>
			<p id="item1" style="display:none;">
			<b>Bio: </b><?php echo $student->bio; ?>
			<br /><br />
			<a href="mailto:<?php echo $student->email; ?>" class="fancy-button">Contact</a>
				<span class="social-links">
					<?php
					if (!empty($student->twitter)):
					?>
					<a href="http://www.twitter.com/<?php echo $student->twitter; ?>" class="twitter" title="Twitter" target="_blank"></a>
					<?php endif;
					if (!empty($student->facebook)):
					?>
					<a href="<?php echo $student->facebook; ?>" class="facebook" title="Facebook"></a>
					<?php
					endif;
					if (!empty($student->linkedin)):
					?>
					<a href="<?php echo $student->linkedin; ?>" class="linkedin" title="LinkedIn"></a>
					<?php
					endif;
					if (!empty($student->dribbble)):
					?>
					<a href="<?php echo $student->dribbble; ?>" class="dribbble" title="Dribbble"></a>
					<?php
					endif;
					if (!empty($student->github)):
					?>
					<a href="<?php echo $student->github; ?>" class="github" title="Github"></a>
					<?php
					endif;
					?>

				</span>
			</p>			
		</div>
<!--
<a href="javascript:;" class="expand" id="expand1">Expand</a>
<hgroup id="expand">
	<h1><?php echo $student->first . ' ' . $student->last; ?></h1>
	<h2><?php echo 'Graduating: ' . $student->year . ' Major: ' . $student->major; ?></h2>
</hgroup>
<p><br /><br />
	<strong>Skills</strong>: <?php echo $student->skills; ?>
<br /><br />
</p>
-->