<section class="no-background no-borders">

    <?php
    if ($student_has_requested_to_join):?>
        <section>

            <button>You have requested to join this team. Once the team administrator has accepted your request, you will be added as a team member.</button>
        </section>
        <?php
    else:
        ?>
        <div class="float-right">
            <?php
            echo anchor('team/join/'.$team_data->team_id, '<button>+ Request To Join Team</button>');
            ?>
        </div>
        <?php
    endif;
    ?>

</section>