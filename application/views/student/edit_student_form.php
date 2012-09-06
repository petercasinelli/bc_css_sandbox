<?php
$this->load->helper('form');
$this->load->library('message');
$this->load->view('student/includes/header');
//$student_logged_in = $student_logged_in[0];


/**** FORM MANAGEMENT *****/

//Create majors dropdown from data sent in from controller
$major_dropdown = array();
$major_dropdown[0] = 'Select a major';
foreach($majors AS $major):
    $major_dropdown[$major->major_id] = $major->major;
endforeach;

//Create schools dropdown
$schools_dropdown = array();
$schools_dropdown[0] = 'Select a school';
foreach($schools AS $school):
    $schools_dropdown[$school->school_id] = $school->school;
endforeach;

//Settings for form elements

$first = array(
    'name' 	=> 'first',
    'value' => set_value('first', $student_logged_in->first)
);

$last = array(
    'name' 	=> 'last',
    'value' => set_value('last', $student_logged_in->last)
);

$email = array(
    'name' 	=> 'email',
    'value' => $student_logged_in->email,
    'disabled'=> true
);

$password = array(
    'name' 	=> 'password',
    'title' => 'Only enter a new password if you would like to change it'
);

$confirm_password = array(
    'name' 	=> 'confirm_password',
);

$year = array(
    'name' 	=> 'year',
    'value' => set_value('year', $student_logged_in->year),
    'maxlength' => 4
);

$school = array(
    'name' 	=> 'school',
    'value' => set_value('school', $student_logged_in->school_id),
    'options' => $schools_dropdown
);

$major = array(
    'name' 	=> 'major',
    'value' => set_value('major', $student_logged_in->major_id),
    'options' => $major_dropdown
);

$status = array(
    'name' 	=> 'status',
    'value' => set_value('status', $student_logged_in->status),
);
$bio = array(
    'name' 	=> 'bio',
    'value' => set_value('bio', $student_logged_in->bio),
    'title' => 'Tell us a little bit about yourself. Are you looking to get involved in a startup? What are you passionate about?'
);
$skills = array(
    'id'=>'skills',
    'name' => 'skills',
    'title' => 'Comma separated if multiple',
    'value' => set_value('skills')
);

$twitter = array(
    'name' => 'twitter',
    'title' => '@username',
    'value' => set_value('twitter', $student_logged_in->twitter)
);

$facebook = array(
    'name' => 'facebook',
    'title' => 'Full Facebook Profile URL',
    'value' => set_value('facebook', $student_logged_in->facebook)
);

$linkedin = array(
    'name' => 'linkedin',
    'title' => 'Full LinkedIn Public Profile URL',
    'value' => set_value('linkedin', $student_logged_in->linkedin)
);

$dribbble = array(
    'name' => 'dribbble',
    'title' => 'Full Dribbble Profile URL',
    'value' => set_value('dribbble', $student_logged_in->dribbble)
);

$github = array(
    'name' => 'github',
    'title' => 'Full GitHub Profile URL',
    'value' => set_value('github', $student_logged_in->github)
);

$submit_button = array(
    'name'	=> 'submit',
    'value' => 'Save Profile',
    'type'  => 'submit'
);

?>

<section>
    <?php $this->message->display(); ?>
    <?php echo $upload_errors;?>
    <?php echo validation_errors('<p class="error-message">', '</p>'); ?>
</section>

<section>
    <div class="grid">
        <div class="half">
            <header>
                <h1>Profile Picture</h1>
                <h2>Upload a new photo or remove your current photo</h2>
            </header>
            <!--Get the students profile picture source.. Will add helper for this -->
            <?php $pic_src = student_picture_src($student_logged_in->student_id, $student_logged_in->oauth_uid, $student_logged_in->picture); ?>
            <img src="<?php echo $pic_src; ?>" width="100px" height="100px"/>
            <br />
            <?php echo anchor("student/remove_profile_pic", "Remove Picture"); ?>
            <!--begin upload form-->

            <?php echo form_open_multipart('student/upload_profile_pic');?>
            <input type="file" name="userfile" size="20" />
            <input type="submit" value="Change My Picture" />
            </form>
            <!--end upload form-->
        </div>
        <?php echo form_open('student/edit/' . $student_logged_in->student_id, array("id" => "edit-profile")); ?>
        <div class="half">
            <header>
                <h1>BC Skills Profile</h1>
            </header>
            <?php echo form_label('Status:', 'status'); echo form_input($status); ?>
            <?php echo form_label('Skills:', 'skills'); echo form_input($skills); ?>
            <br />
            <?php echo form_submit($submit_button); ?>
        </div>
    </div>

</section>

<section>
    <div class="grid">
        <div class="half">
            <header>
                <h1>Personal Information</h1>
            </header>
            <?php echo form_label('First Name:', 'first'); echo form_input($first);?>
            <?php echo form_label('Last Name:', 'last'); echo form_input($last); ?>
            <?php echo form_label('School:', 'school'); echo form_dropdown('school', $schools_dropdown, $student_logged_in->school_id); ?>
            <?php echo form_label('Major:', 'major'); echo form_dropdown('major', $major_dropdown, $student_logged_in->major_id); ?>
            <br /><br />
            <?php echo form_submit($submit_button); ?>
        </div>
        <div class="half">
            <?php echo form_label('Graduation Year:', 'year'); echo form_input($year); ?>
            <?php echo form_label('Bio:', 'bio'); echo form_textarea($bio); ?>

        </div>
    </div>
</section>

<section>
    <div class="grid">
        <div class="half">
            <header>
                <h1>Social Media</h1>
            </header>
            <?php echo form_label('Twitter:', 'twitter'); echo form_input($twitter); ?>
            <?php echo form_label('Facebook:', 'facebook'); echo form_input($facebook); ?>
            <?php echo form_label('LinkedIn:', 'linkedin'); echo form_input($linkedin); ?>
            <?php echo form_label('Dribbble:', 'dribbble'); echo form_input($dribbble); ?>
            <?php echo form_label('GitHub:', 'github'); echo form_input($github); ?>
            <br />
            <?php echo form_submit($submit_button); ?>
        </div>
        <div class="half">

            <header>
                <h1>Login Information</h1>
            </header>
            <?php echo form_label('BC E-mail Address:', 'email'); echo form_input($email); ?>
            <?php echo form_label('New Password:', 'password'); echo form_password($password); ?>
            <?php echo form_label('Confirm Password:', 'confirm-password'); echo form_password($confirm_password); ?>
            <br />
            <?php echo form_submit($submit_button); ?>
        </div>
    </div>
</section>
<?php echo form_close(); ?>



<?php
$student_skills_length = strlen($this_students_skills);
if ($student_skills_length > 0){
    $preFill = 'preFill: "'.substr($this_students_skills, 0, $student_skills_length - 1).'"';
}
else
    $preFill = 'startText: "Enter your skills here"';


$data["jquery"] = '$(function(){
		$("#skills").autoSuggest("'.base_url().'index.php/student/autosuggest_skills", {'.$preFill.', searchObjProps: "name", selectedItemProp: "name", selectedValuesProp: "name", minChars: 1, matchCase: false});

		$("#edit-profile [title]").tipsy({trigger:"focus", gravity:"w"});
	});';

$this->load->view('includes/footer', $data); ?>