<?php
session_start();
//if user is logged in
if(isset($_SESSION['username'])){
    echo "Welcome to the members page!";   
}
else
    header('Location: ' . 'login.php');
?>

<!DOCTYPE html>
<head>
<title>CSS Login Page</title>
</head>
<body>
<form name="form" method="post" action="authen.php"> 
 
    <p><input type="submit" name="logout" value="Logout" /></p> 
 
</form>
</body>
</html>

