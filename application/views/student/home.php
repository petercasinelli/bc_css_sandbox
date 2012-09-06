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


<div id="container">
    <div id="example">
        <div id="slides">
            <div class="slides_container">
                <div class="slide">
                    <div class="grid">
                        <div class="half">
                            <h1 style="font-size:28px; line-height:30px;">Want to build a team?</h1>
                            <section style="padding-left:15px;">
                                <ul style="padding-top:5px;">
                                    <li>Create a team on BC Skills</li>
                                    <li>Search for student talent</li>
                                    <li>Get in touch with students and they can request to join!</li>
                                </ul>
                                <?php echo anchor('/', 'Click here to learn how'); ?>
                            </section>
                        </div>
                        <div class="half">
                            <h1 style="font-size:28px; line-height:30px; color:#2d517a">Want to join a team?</h1>
                            <section style="padding-left:15px;">
                                <ul style="padding-top:5px;">
                                    <li>Search for teams on BC Skills</li>
                                    <li>Contact one of the team members</li>
                                    <li>Request to join their team and get started!</li>
                                </ul>
                                <?php echo anchor('/', 'Click here to learn how'); ?>
                            </section>
                        </div>
                    </div>
                </div>

                <div class="slide">
                    <div class="grid">
                        <div class="three-quarters">
                            <h1 style="font-size:28px; line-height:30px;">Get Involved With BC Skills</h1>
                            <section>
                                Would you like to learn how to build a web application like BC Skills? Send an e-mail to bccss.development@gmail.com to learn how you can get involved.
                            </section>
                        </div>
                        <div class="quarter">
                            <h2>Learn skills like:</h2>
                            <ul>
                                <li>PHP</li>
                                <li>MySQL</li>
                                <li>Git and GitHub</li>
                                <li>MVC Frameworks like Codeigniter</li>
                            </ul>
                        </div>

                    </div>

                </div>

            </div>
            <a href="#" class="prev"><img src="<?php echo base_url(); ?>/assets/images/slides/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
            <a href="#" class="next"><img src="<?php echo base_url(); ?>/assets/images/slides/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
        </div>
    </div>
</div>

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