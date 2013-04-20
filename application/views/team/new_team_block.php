<section class="listing">
    <header>
        <h2><?php echo anchor('team/view/'.$team->team_id,$team->team_name); //$team->team_name; ?></h2>
    </header>
    <div class="float-right">
        <?php

        foreach ($team_members as $team_member):
            $img_src = student_picture_src($team_member->student_id, $team_member->oauth_uid, $team_member->picture);
            echo '<a class="small_member_pic" href="'.base_url().'student/view_student/'.$team_member->student_id.'"><img src="'.$img_src.'"></a>';
        endforeach;
        ?>
    </div>
    <div style="clear:both;">

        <b>Description</b>: <?php echo $team->team_description; ?>
    </div>
</section>
		
