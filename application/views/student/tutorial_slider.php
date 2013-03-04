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
                                <?php echo anchor('/student/tutorial#create', 'Click here to learn how'); ?>
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
                                <?php echo anchor('/student/tutorial#join', 'Click here to learn how'); ?>
                            </section>
                        </div>
                    </div>
                </div>

                <div class="slide">
                    <div class="grid">

                            <section style="padding-left:15px;">
                                <h1 style="font-size:28px; line-height:30px;">Not sure what skills your project needs?</h1>

                                <h2 style="padding-top:8px;">Are you looking for developers but aren't sure what programming languages or experience they need?</h2>
                                <p style="padding-top:5px;">
                                <?php echo anchor("/team/add_form", "Add your team"); ?> and send an e-mail to <a href="mailto:bccss.development@gmail.com">bccss.development@gmail.com</a> with your team information. Based on your team description, we will help you evaluate what experience developers or business partners should have to work on your idea!
                                </p>
                            </section>
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
            <a href="#" class="prev"><img src="<?php echo asset_url(); ?>/images/slides/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
            <a href="#" class="next"><img src="<?php echo asset_url(); ?>/images/slides/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
        </div>
    </div>
</div>