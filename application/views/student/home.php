<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');
?>

<section>
    <div class="grid">
        <div class="three-quarters">
            <section>
                <header>
                    <h1>Three-quarters</h1>
                </header>
                <p>
                    3/4 test
                </p>
            </section>
        </div>
        <div class="quarter">
            <section>
                <header>
                    <h1>Quarter</h1>
                </header>
                <p>
                    1/4 test
                </p>
            </section>
        </div>
    </div>
</section>


<?php $this->load->view('includes/footer'); ?>