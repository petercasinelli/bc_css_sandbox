<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');
?>

<section>
    <header>

        <h1>Search for Students at BC</h1>

    </header>

    <?php
    if (empty($students)):
        echo '<p class="red-alert">No students exist with your search requirements.</p>';
    else:
        ?>
        <p class="green-alert">Your search returned <b><?php echo count($students); ?> student<?php if (count($students) > 1) echo 's'; ?></b></p>
        <?php
        $this->load->view('student/search_form');

    endif;
    //Counter kept for expand/hide student profile
    $i = 0;
    foreach($students as $student)
    {
        //echo anchor('student/view/' . $student->student_id, $student->first . ' ' . $student->last . '<br />');
        $data["student"] = $student;
        $data["id"] = $i;
        //we want to put this in assoc
        $this->load->view('student/student_block', $data);
        $i++;
    }
    ?>

</section>


<?php $this->load->view('includes/footer'); ?>