<?php
session_start();

//Dummy user and pass
define('USER', 'css');
define('PASSWORD', 'password');

if(isset($_POST['submit'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //authentication credentials. Replace with database authen.
    if($username == USER && $password == PASSWORD){
        //test authentication successful
        $_SESSION['username'] = $username;
        //echo $_SESSION['username'];
       header('Location: ' . 'welcome.php');
    }
    else{
        //authentication failed
        header('Location: ' . 'login.php');
    }
    
}

if(isset($_POST['logout'])){
    session_destroy();
    header('Location: ' . 'login.php');
}


//End of PHP file
//Location path/authen.php