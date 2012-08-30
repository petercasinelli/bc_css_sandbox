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
    
    foreach($teams as $team):
    	$data['team'] = $team;
    	$this->load->view('team/team_block', $data);
    endforeach; 
    echo $this->pagination->create_links();
    ?>
</section>


<?php $this->load->view('includes/footer'); ?>