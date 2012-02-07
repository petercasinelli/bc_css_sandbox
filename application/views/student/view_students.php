<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to BC CSS</title>
</head>
<body>
<?php echo anchor('student/add_form/', 'Add a student', 'title="Add a student"'); ?>
<h1>Students</h1>
<?php

	if (empty($students))
		echo 'No students exist';
		

	foreach($students as $student)
	{
		echo anchor('student/view/' . $student->student_id, $student->first . ' ' . $student->last . '<br />');
	}
?>
<br />
<br />
<?php echo anchor('authentication/student/logout', 'Logout'); ?>
</body>
</html>