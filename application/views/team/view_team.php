<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');
?>

<?php
switch ($permission->permission_id):
	case 1: $this->load->view('team/includes/admin_panel');
	break;
	default: $this->load->view('team/includes/panel');
	break;
endswitch;
?>

<section>
		<?php $this->load->view("team/team_block", array("team"=>$team)); ?>
</section>
	
<section>

    <div class="grid">
        <div class="half">
            <header>
                <h2>Team Updates</h2>
            </header>
        </div>
        <div class="half">
            <header>
                <h2>Team Members</h2>
            </header>
            <?php foreach($team->team_members as $student):?>
            <?php $this->load->view("student/student_block", array("student"=>$student, "id" => $student->student_id))?>
            <?php endforeach;?>
            <?php foreach($team->team_members as $student):?>
            <?php $this->load->view("student/student_block", array("student"=>$student, "id" => $student->student_id))?>
            <?php endforeach;?>
        </div>
    </div>

</section>

	
<?php $this->load->view('includes/footer'); ?>