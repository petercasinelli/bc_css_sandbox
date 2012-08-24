<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');
?>

<section>
    <div class="grid">
        <div class="quarter">
            <section>
            <header>
                <h1>Complete Your Profile</h1>
                <?php echo "Your profile is $profile_completion complete"; ?>
            </header>
            </section>
        </div>
        <div class="three-quarters">
            <section>
                Form goes here
            </section>
        </div>
    </div>
</section>

<section>
    <div class="grid">
        <div class="half">
            <section>
                <header>
                    <h1>What's New</h1>
                </header>
                <p>
                   New updates here
                </p>
            </section>
        </div>
        <div class="half">
            <section>
                <header>
                    <h1>New Students</h1>
                </header>
                <section class="listing">
                <p>
                    Student 1
                    <br />
                    <b>Bio goes here</b>
                </p>
            </section>
                <section class="listing">
                    <p>
                        Student 2
                        <br />
                        <b>Bio goes here</b>
                    </p>
                </section>
                <?php echo anchor('student/view_all', 'View All Students'); ?>

            </section>
            <br />
            <section>
                <header>
                    <h1>New Teams</h1>
                </header>
                <section class="listing">
                    <p>
                        Team 1
                        <br />
                        <b>Description goes here</b>
                    </p>
                </section>
                <section class="listing">
                    <p>
                        Team 2
                        <br />
                        <b>Description goes here</b>
                    </p>
                </section>
                <?php echo anchor('/team', 'View All Teams'); ?>
            </section>
        </div>
    </div>
</section>


<?php $this->load->view('includes/footer'); ?>