<div class="team_block">
    <?php if ($team->bcvc_team){ ?>
    <img src="<?php echo asset_url(); ?>/images/bcvc-bw.png" width="60" height="41" style="float:right;"/>
    <?php }
    if (!empty($team->team_founders))
        echo mailto($team->team_founders[0]->email,'<button style="float:right;">Get In Touch</button>');
    ?>
    <header>
        <h1><?php echo anchor('team/view/'.$team->team_id,$team->team_name); ?></h1>
        <?php if (!empty($team->team_founders)){ ?>
        <h2>Founder: <?php echo anchor('student/view_student/'.$team->team_founders[0]->student_id, $team->team_founders[0]->first . ' ' . $team->team_founders[0]->last); ?></h2>
        <?php } ?>
    </header>

    <p><?php
        if (strlen($team->team_description) > 120)
            $team->team_description = substr($team->team_description, 0, 120) . '...';

        echo $team->team_description;
        echo ' ' .anchor('team/view/'.$team->team_id,'Read More');
        ?></p>
    <p>


    </p>
    <p>
    <h3>Team Members:</h3>
    <?php
    if (empty($team->team_members))
        echo '<p>There are currently no team members.</p>';
    foreach ($team->team_members as $team_member):

        $img_src = student_picture_src($team_member->student_id, $team_member->oauth_uid, $team_member->picture);
        echo '<a class="small_member_pic" href="'.base_url().'student/view_student/'.$team_member->student_id.'"><img src="'.$img_src.'" class="get-in-touch" title="'.$team_member->first. ' ' .$team_member->last.': '.$team_member->email.'"></a>';
    endforeach;
    ?>
    </p>
</div>
<?php if ($number % 2 == 0){ ?>
<br style="clear:both;" />
<?php //echo $number;
} ?>




