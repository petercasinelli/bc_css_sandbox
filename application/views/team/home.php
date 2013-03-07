<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');
?>

<section class="no-background no-borders">
    <div class="float-right">
        <?php echo anchor('team/add_form/','<button>Add Your Team</button>'); ?>
        <button id="join-a-team" title="To join a team, click on one from the list and then select the 'Join This Team'">Join A Team</button>
    </div>
</section>

<section>
    <h1>Team Home</h1>
    <?php
    if (empty($teams)):
        ?>
        <h2>There are currently no teams.</h2>
        <?php
    endif;
    $data['number'] = 0;
    foreach($teams as $team):
    	$data['team'] = $team;
        $data['number']++;
    	$this->load->view('team/team_block', $data);
    endforeach;
    echo '<br style="clear:both">';
    echo $this->pagination->create_links();
    ?>
</section>


<?php
$data["jquery"] = '
$(function(){
    $("#join-a-team").tipsy({gravity:"n"});
});';
$this->load->view('includes/footer', $data); ?>