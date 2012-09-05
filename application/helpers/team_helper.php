<?php

function student_is_team_admin($team_id, $student_id){

    $CI = & get_instance();
    $CI->load->model('team_model');

    $permission = $CI->team_model->get_student_permission($team_id, $student_id);

    if ($permission->account_type != 1):
        $CI->load->library('message');
        $CI->message->set('You cannot manage this team because you are not an administrator.', 'error', TRUE);
        redirect('/team/view/'.$team_id);
        exit();
    else:
        return $permission;
    endif;

    echo 'HELPER LOADED';
}
