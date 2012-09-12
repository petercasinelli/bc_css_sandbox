<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$vars = get_cfg_var('aws.param5');
$explode = explode(',', $vars);

$app_id = '488337221194075';
$pass = $explode[1];

$config['protocol']='smtp';
$config['smtp_host']='ssl://smtp.googlemail.com';
$config['smtp_port']=465;
$config['smtp_timeout']='30';
$config['smtp_user']='bccss.development@gmail.com';
$config['smtp_pass']= $pass;
$config['charset']="utf-8";
$config['newline']="\r\n";