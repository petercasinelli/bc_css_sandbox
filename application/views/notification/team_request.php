<section class="listing">
    <div class="grid">
        <div class="float-left">
            <?php
            echo '<b>' . $first . ' ' . $last . '</b> requested to join your team on ' . date('F jS, Y', strtotime($timestamp));
            ?>
        </div>
        <div class="float-right">

            <?php
            echo anchor('team/accept_request/'.$team_id.'/'.$student_id, '<button>Accept Request</button>') .
            anchor('team/deny_request/'.$team_id.'/'.$student_id, '<button>Deny Request</button>');
            ?>

        </div>
    </div>
</section>
                                