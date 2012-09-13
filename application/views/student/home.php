<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');
?>

<?php if (strlen($this->message->display()) > 0): ?>
<section>
    <?php echo $this->message->display(); ?>
</section>
<?php endif;?>

<?php $this->load->view('student/tutorial_slider'); ?>

<?php
$data["jquery"] = "
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 5000,
				pause: 5000,
				hoverPause: true,
				paginationClass: 'slide_pagination'
			});
		});
";
?>

<?php if ($profile_completion != '100%'): ?>
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
                <?php echo anchor('/student/edit_form', 'Complete My Profile Now', array('class' => 'blueButton', 'style' => 'width:182px;')); ?>
            </section>
        </div>
    </div>
</section>
<?php endif; ?>
<section>
    <div class="grid">
        <div class="half">
            <section>
                <header>
                    <h1>What's New</h1>
                </header>
                <p>
                    BC Skills has a new look and new features. Now anyone can easily find co-founders, team members, and teams to join!
                    <br /><br/>
                    If you need help getting started, check out our <?php echo anchor('student/tutorial', 'tutorial'); ?> page for help on how to create your own team or join a team.
                    <br /><br/>
                    Also, since this is a new project, if you come across any errors or bugs, be sure to send them to <a href="mailto:bccss.development@gmail.com">bccss.development@gmail.com</a>.
                </p>
            </section>
        </div>
        <div class="half">
            <section>
                <header>
                    <h1>New Students</h1>
                </header>
                <?php
                foreach($new_students as $new_student):
                    $data["student"] = $new_student;
                    $this->load->view('team/member_block.php', $data);
                endforeach;
                ?>
                <?php echo anchor('student/view_all', 'View All Students'); ?>

            </section>
            <br />
            <section>
                <header>
                    <h1>New Teams</h1>
                </header>
                <?php
                foreach($new_teams as $new_team):
                    $data["team"] = $new_team;
                    $this->load->view('team/new_team_block.php', $data);
                endforeach;
                ?>
                <?php echo anchor('/team', 'View All Teams'); ?>
            </section>
        </div>
    </div>
</section>


<?php $this->load->view('includes/footer', $data); ?>