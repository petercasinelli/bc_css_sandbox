<section class="listing">
			<header>
				<h2><?php echo anchor('team/view/'.$team->team_id,$team->team_name); //$team->team_name; ?></h2>
			</header>
			<div class="float-right" style="padding:10px;">
			<?php
			
			foreach ($team->team_members as $team_member):
				if ($team_member->oauth_uid == NULL):
					$img_src = base_url() . 'assets/images/blank_person.png';
				else:
					$img_src = $team_member->oauth_id;
				endif;
				
				echo '<img src="'.$img_src.'" style="width:25px; height:25px; border:1px solid #ccc; float:left; padding:1px;">';
			endforeach;
			?>
			</div>
			<br />
			<p>
			<b>Description</b>:<?php echo $team->team_description; ?>
			</p>
</section>
		
