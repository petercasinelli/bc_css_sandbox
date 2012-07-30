<div class="item">
	<a href="javascript:;" class="expand" id="expand<?php echo $team->team_id; ?>" onClick="toggleExpand(<?php echo $team->team_id; ?>);">Expand Profile</a>
	<hgroup onClick="toggleExpand('<?php echo $team->team_id; ?>');">
		<h1><a href="<?php echo 'team/view/'.$team->team_id; ?>"><?php echo $team->team_name; ?></a></h1>
	</hgroup>
	<p>
	
		
		<br>
		<b>Description</b>
		<?php echo $team->team_description; ?>
	</p>

	<p id="item<?php echo $team->team_id; ?>" style="display:none;">
	<!-- 	<b>Members: </b><br>
		<?php foreach($team_members as $team_member): ?>
		<i><?php echo $team_member->first.' '.$team_member->last.' '.$team_member->email;?></i><br>
		<?php endforeach;?> -->
	</p>			
</div>
