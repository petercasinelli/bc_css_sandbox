<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');
?>

<section>
<h1>Team Home</h1>		
		<?php foreach($teams as $team):?>
		<?php $data['team'] = $team; ?>
		<?php $this->load->view('team/team_block', $data); ?>
		<?php endforeach; ?>	
</section>

	
<?php $this->load->view('includes/footer'); ?>