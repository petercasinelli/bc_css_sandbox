<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta content="minimum-scale=1.0, width=device-width, user-scalable=no" name="viewport" />
<link rel="stylesheet" type="text/css" href="CSSstyle.css" />
<title>CSS Webmail</title>
</head>
<body>
	<h1>CSS Listserv Webmail</h1>
	<hr/>
	<form method="post" action="">
		From: <input name="from" type="text" value="<?echo $_POST['from'];?>"/><br/> <!--replace value with acm email address-->
		Subject: <input name="subject" type="text" /><br/>
		
		<!--Leave lots of rooom to design a table to view member in along with text boxes
		and a member search field-->
		
		Message:<br/>
		<textarea name="message" rows="8" cols="60"/></textarea><br/>
		<input type="submit" name="send" value="Send Message"/>
	</form>


</body>
</html>