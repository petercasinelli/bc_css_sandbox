<?php
//ini_set ('display_errors', 1);
//error_reporting(E_ALL);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta content="minimum-scale=1.0, width=device-width, user-scalable=no" name="viewport" />
<link rel="stylesheet" type="text/css" href="CSSstyle.css" />
<title>CSS Database Add/Remove</title>

</head>
<body>

	<h1> Add/Remove from Database</h1>
	<hr/>

<?php


if(isset($_POST['button']))
	switch ($_POST['button']){ 
	case 'Add Person':
		if(emailValid() && passwordValid() && !doesEmailExist()){
			addPerson();		}
		break; 	
	case 'Remove Person':
		if(doesEmailExist() && passwordCorrect())
			removePerson(); 
		break;
	default: 
		break;
}

?>



	<h3>Add Person</h3>
	<form name="add" method="post" action="">
	<table><tr>
		<td>First name:</td><td><input type="text" name="first_name" value="<?  if(isset($_POST['first_name']))echo $_POST['first_name'];?>"/></td></tr>
		<tr><td>Last name:</td><td><input type="text" name="last_name" value="<? if(isset($_POST['last_name']))echo $_POST['last_name'];?>"/></td></tr>
		<tr><td>Email Address:</td><td><input type="text" name="emailToAdd" value="<? if(isset($_POST['emailToAdd'])) echo $_POST['emailToAdd'];?>"/></td></tr>
		<tr><td>Password:</td><td><input type="password" name="password" value=""/></td></tr>
		<tr><td>Password Confirm:</td><td><input type="password" name="password_confirm" value=""/></td></tr>		
		<tr><td>Graduating Year:</td><td><input type="text" name="year" value="<? if(isset($_POST['year']))echo $_POST['year'];?>"/></td></tr>
		<tr></div><td colspan="2"><textarea name="interests" rows="4" cols="30">Enter Interest and Computer skills, including languages or frameworks</textarea></td></tr>
		<tr><td><input type="submit" name="button" value="Add Person"/></td></tr>
	</table></form>
		<hr/>
	<h3>Remove Person</h3>
	<form method="post" action=""><table><tr>
		<td>Email Address:</td><td><input type="text" name="emailToRemove" value="<? if(isset($_POST['emailToRemove'])) echo $_POST['emailToRemove'];?>"/></td></tr>
		<tr><td>Password:</td><td><input type="password" name="passwordRemove" value=""/></td></tr>
		<tr><td><input type="submit" name="button" value="Remove Person"/></td></tr>
	</table></form>
	
</body>
</html>
<?php

//query db, check if pw matches one from form, return false if not
function passwordCorrect(){
	$dbc = connectToDb();
	$password = $_POST['passwordRemove'];
	$password = sha1($password);
	$email = $_POST['emailToRemove'];
	
	$query = "SELECT Password FROM bccss.acm_sandbox WHERE Email LIKE \"$email\"";
	echo "$query <br/>";
	$result = mysql_query($query, $dbc);
		$row = mysql_fetch_row($result);
		if (strcmp($row[0], $password) == 0) {
			return true;
		}
		else {
		echo "<h2>password not valid, did not remove email</h2>";
		return false; 
		}
return false;
}

//check if password and Confirmation match
function passwordValid(){
	$password = $_POST['password'];
	if($password == ''){
		echo "please enter a password";
		return false;
		}
	$confirm = $_POST['password_confirm'];
	
	if(strcmp($password, $confirm)!=0 ){
		echo "<h2>password does not match confirmation</h2>";
		return false;
		}
	else return true;

}

//check if email is a valid with regexp
function emailValid(){
	if($_POST['emailToAdd'])
		$email = $_POST['emailToAdd'];
	else 
		$email = $_POST['emailToRemove'];
		
	$pat = "/\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/";
	if($email == ''){
		echo "Please enter an email address.";
		return false;
	}
	if(preg_match($pat, $email)){
		return true;
	}
	else{
		echo "Invalid email address.";
		return false;
	}
}

function addPerson(){
	$dbc= connectToDB();
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['emailToAdd'];
	$gradyear = $_POST['year'];
	$password = $_POST['password'];
	$password = sha1($password);
	$interests = $_POST['interests'];
	
		
	//check to see if person already exists
	/*should this happen in emailValid() instead?*/
	/*if(doesEmailExist($email, $dbc)){
		echo "The email address $email already exists in this database";
		return false; 
	}*/
        

        
	$query = "INSERT INTO bccss.acm_sandbox(First_Name, Last_Name, Email, Grad_Year, Officer, Password, Interests)
		VALUES(\"$first_name\", \"$last_name\", \"$email\", $gradyear, 0, \"$password\", \"$interests\" )"; 
		
	echo "insert query: $query <br/>";
	if(mysql_query($query, $dbc)){
		if($_POST['first_name']){
			echo "{$_POST['first_name']} has been added! <a href=\"index.php\"/>Go Back</a>";
		}
		else{ 
			echo "{$_POST['emailToAdd']} has been added! <a href=\"index.php\"/>Go Back</a>";
			return true;
		}
	}
	else{
		echo"Insert query failed";
		return false;
	}
}

function removePerson(){
	$dbc= connectToDB();
	$email = $_POST['emailToRemove'];
	
	$query = "DELETE FROM bccss.acm_sandbox WHERE Email LIKE \"$email\"";
	
	mysql_select_db("bccss.acm_sandbox", $dbc);

	if(mysql_query($query))
		echo $email." has been removed! <a href=\"index.php\"/>Go Back</a>";
	else
		"$query failed!!";
}

function connectToDB(){
	require_once ('CSS_vars.php');

	$host = ACM_DB_HOST;
	$user = ACM_DB_USER;
	$pwd = ACM_DB_PASSWORD;
	$db = ACM_DB_NAME;
	
	//host, user, pw, database
	$dbc= mysql_connect("$host", "$user", "$pwd");
	return ($dbc);
        
        
}

function doesEmailExist(){
	$add = isset($_POST['emailToAdd']);
	$email = $add ? $email = $_POST['emailToAdd'] : $_POST['emailToRemove'];
		
	$dbc = connectToDB();
	
	$query = "SELECT COUNT(*) FROM bccss.acm_sandbox WHERE Email LIKE \"$email\"";
	//echo "$query <br/>";
	$result = mysql_query($query, $dbc);
		$row = mysql_fetch_row($result);
		if ($row[0] > 0) {
			
			if($add)
				echo "<h2>You are already a member!!</h2>";
			return true;
		}
		else {
		
		return false; 
		}
	
}
?>