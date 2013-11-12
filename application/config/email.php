<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Get Amazon configuration variables
$config = get_cfg_var('aws.param2');
$config = json_decode($config, TRUE);

$email_config = $config['smtp'][0];

$config['protocol']='smtp';
$config['smtp_host']='ssl://smtp.googlemail.com';
$config['smtp_port']=465;
$config['smtp_timeout']='30';
$config['smtp_user']='bccss.development@gmail.com';
$config['smtp_pass']= $email_config['password'];
$config['charset']="utf-8";
$config['newline']="\r\n";