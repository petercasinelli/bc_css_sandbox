<?php
$this->load->library('message');
$this->load->view('student/includes/header');

$search = array(
    'name' => 'query',
    'id' => 'search',
    'placeholder' => 'ie- PHP',
    'style' => 'width:550px; float:left; margin-right:10px;');

$submit_button = array(
    'name'	=> 'submit',
    'value' => 'Search',
    'type'  => 'submit'
);
?>

<section>
	<h1>View all students</h1>

    <h2>Search for a student based on name, programming languages, school, or major: </h2>
    <?php
    $this->load->view('student/search_form');


    if (empty($students)):
        ?>
        <h2>There are currently no students.</h2>
        <?php
    endif;
    ?>
	<?php 
	foreach($students as $student):
		$data["student"] = $student;
		$this->load->view('student/student_block', $data);
	endforeach;
	echo $this->pagination->create_links();
	?>

</section>
			
<?php $this->load->view('includes/footer'); ?>