<section>
    <div class="grid">
        <div class="float-left">
            <header>
                <h3>on <?php echo $team_update->timestamp; ?> by </h3>
            </header>
            <?php echo $team_update->team_update; ?>
        </div>
        <?php
        if (!empty($permission->account_type)):
            switch ($permission->account_type):
                case 1: echo '<div class="float-right"><h3>'. anchor('team/delete_update/'.$team_data->team_id.'/'.$team_update->team_update_id, 'Delete') .'</h3></div>';
                break;
                default: echo '';
                break;
            endswitch;
        endif;
        ?>
    </div>
</section>