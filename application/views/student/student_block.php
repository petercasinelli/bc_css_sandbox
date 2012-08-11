		<div class="item">
			<a href="javascript:;" class="expand" id="expand<?php echo $id; ?>" onClick="toggleExpand(<?php echo $id; ?>);">Expand Profile</a>
			<hgroup onClick="toggleExpand('<?php echo $id; ?>');">
				<h1><?php echo $student->first . ' ' . $student->last; ?></h1>
				<h2><?php echo $student->school_id . ' ' . $student->year; ?> - <?php echo $student->major_id ?></h2>
			</hgroup>
			<p>
				<b>Skills:</b> <?php echo $student->skills; ?>
				<br>
				<b>Software:</b> <?php echo $student->software; ?>
			</p>
			<p id="item<?php echo $id; ?>" style="display:none;">
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
			</p>			
		</div>
<!--
<a href="javascript:;" class="expand" id="expand1">Expand</a>
<hgroup id="expand">
	<h1><?php echo $student->first . ' ' . $student->last; ?></h1>
	<h2><?php echo 'Graduating: ' . $student->year . ' Major: ' . $student->major_id; ?></h2>
</hgroup>
<p><br /><br />
	<strong>Skills</strong>: <?php echo $student->skills; ?>
<br /><br />
</p>
-->