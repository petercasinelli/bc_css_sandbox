<section class="listing">
    <header>
        <h2><?php echo anchor('team/view/'.$team->team_id,$team->team_name); //$team->team_name; ?></h2>
    </header>
    <div class="float-right">
        <?php

        foreach ($team->team_members as $team_member):

            $img_src = student_picture_src($team_member->student_id, $team_member->oauth_uid, $team_member->picture);
            echo '<img src="'.$img_src.'" style="width:25px; height:25px; border:1px solid #ccc; float:left; padding:1px;">';
        endforeach;
        ?>
    </div>
    <div style="clear:both;">

        <b>Description</b>: <?php echo $team->team_description; ?>
    </div>
</section>
		
