<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');
?>

<section>
    <header>
        <h1>Are you sure you want to leave this team?</h1>
    </header>
    <div class="grid">
        <div class="half">
            <section class="listing">
                <?php
                echo anchor('team/leave/'.$team_id, '<button>Yes, I want to leave this team</button>');
                ?>
            </section>
        </div>
        <div class="half">
            <section class="listing">
                <?php
                echo anchor('team/view/'.$team_id, '<button>No, I do not want to leave this team</button>');
                ?>
            </section>
        </div>

    </div>

</section>

<?php $this->load->view('includes/footer'); ?>