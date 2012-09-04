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


<section>
            <section>
                <header>
                    <h1>Notifications</h1>
                </header>
                <?php
                if (empty($notifications)):
                    ?>
                    <h3>You have no new notifications.</h3>
                    <?php else:
                    ?>
                    <br/>
                    <p>
                        <?php
                        foreach($notifications as $notification):
                            switch ($notification->type):
                                case 'join_team':
                                    $this->load->view("notification/team_request", $notification);
                                break;
                                default: echo 'Unknown request type. Please contact admin';
                                break;
                            endswitch;
                        endforeach; ?>
                    </p>
                    <?php
                endif; ?>
            </section>
</section>


<?php $this->load->view('includes/footer'); ?>