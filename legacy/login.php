<?php
session_start();
//if user is logged in
if(isset($_SESSION['username'])){
    header('Location: welcome.php');    
}
?>
<!DOCTYPE html>
<head>
<title>CSS Login Page</title>
</head>
<body>
<h1>Login</h1> 
 
 
<form name="form" method="post" action="authen.php"> 
    <p><label for="username">Username:</label> 
    <br /><input type="text" title="Enter your Username" name="username" /></p> 
 
 
    <p><label for="password">Password:</label> 
    <br /><input type="password" title="Enter your password" name="password" /></p> 
 
 
    <p><input type="submit" name="submit" value="Login" /></p> 
 
 
</form>
</body>
</html>