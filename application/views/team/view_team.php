<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');
?>

<?php if (strlen($this->message->display()) > 0): ?>
<section>
    <?php echo $this->message->display(); ?>
</section>
<?php endif;?>

<?php
if (empty($permission)):
    $this->load->view('team/includes/panel');
else:

    switch ($permission->account_type):
        case 0: $this->load->view('team/includes/member_panel');
        break;
        case 1: $this->load->view('team/includes/admin_panel');
        break;
        default: $this->load->view('team/includes/panel');
        break;
    endswitch;

endif;
?>

<section>
    <?php $this->load->view("team/team_block", array("team"=>$team_data)); ?>
</section>

<section>

    <div class="grid">
        <div class="half">
            <header>
                <h2>Team Updates</h2>
            </header>
            <?php
            if (empty($team_updates)):
                echo '<h3>There are currently no team updates.</h3>';
            endif;
            foreach($team_updates as $team_update):
                $this->load->view('team/team_update', array('team_update' => $team_update));
            endforeach;
            ?>
        </div>
        <div class="half">
            <header>
                <h2>Team Members</h2>
            </header>
            <?php
            if (empty($team_data->team_members)):
                echo '<h3>There are currently no team members.</h3>';
            endif;

            foreach($team_data->team_members as $student):?>
                <?php $this->load->view("team/member_block", array("student"=>$student, "id" => $student->student_id))?>
                <?php endforeach;?>
        </div>
    </div>

</section>


<?php $this->load->view('includes/footer'); ?>