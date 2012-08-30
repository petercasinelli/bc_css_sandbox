<?php
$this->load->helper('form');

$search = array(
    'name' => 'query',
    'id' => 'search',
    'placeholder' => 'Search for students');
?>
<header>
    <div>
        <div id="logo">
            <a href="http://bcskills.com"><img src="<?php echo base_url(); ?>/assets/images/logo.png" alt="BC Skills"></a>
        </div>

        <nav>
            <?php
            echo anchor("/", "Home", ($current_page == 'index') ? array('class' => 'active') : '');
            echo anchor("/student/edit_form", "My Profile", ($current_page == 'edit_profile') ? array('class' => 'active') : '');
            echo anchor("/student/view_all", "Students", ($current_page == 'student') ? array('class' => 'active') : '');
            echo anchor("/team/", "Teams", ($current_page == 'team') ? array('class' => 'active') : '');

            $notifications_class = '';
            if ($current_page == 'notification')
                $notifications_class = 'active';

            $notifications_count = '';
            if (sizeof($notifications) > 0)
                $notifications_count = '('.sizeof($notifications).')';

            echo anchor("/notification/", "Notifications $notifications_count", array('class' => $notifications_class));
            ?>
        </nav>
        <div class="float-right">

            <?php
            echo form_open('/student/search', array("class" => 'float-right'));
            echo form_input($search);
            echo form_close();
            ?>

            <?php echo anchor('authentication/student/logout', 'Logout', array('class' => 'float-right')); ?>
        </div>
    </div>
</header>