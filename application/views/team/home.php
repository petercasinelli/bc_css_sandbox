<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');
?>

<section class="no-background no-borders">
    <div class="float-right">
        <?php echo anchor('team/add_form/','<button>Add Your Team</button>'); ?>
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
    ?>
    <?php foreach($teams as $team):?>
    <?php $data['team'] = $team; ?>
    <?php $this->load->view('team/team_block', $data); ?>
    <?php endforeach; ?>
</section>


<?php $this->load->view('includes/footer'); ?>