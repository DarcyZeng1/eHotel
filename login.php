<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Student Database</title>
</head>
<?php
	session_start();
	if (isset( $_POST['login'] ))
	{
		$studentnum = $_POST['studentnum'];
		$password = $_POST['userpassword'];

		$conn_string = "host=web0.eecs.uottawa.ca port = 15432 dbname=dantw005 user=dantw005 password = password";

		$dbconn = pg_connect($conn_string) or die('Connection failed');

		$query = "SELECT * FROM php_project.Student WHERE Student_NUM = $1 AND STUDENT_PASS=$2";

		$stmt = pg_prepare($dbconn,"ps",$query);
		$result = pg_execute($dbconn,"ps",array($studentnum,$password));

		if(!$result){
			die("Error in SQL query:" .pg_last_error());
		}

		$row_count = pg_num_rows($result);

		if($row_count>0){
			$_SESSION['studentnum'] = $studentnum;
			header("location: http://localhost:8080/PhP/records.php");
			exit;
		}
		echo "Data Successfully Entered ". "<a href='index.php'>login now</a>";

		pg_free_result($result);
		pg_close($dbconn);
	}
?>
<body>
	<div id="header"> USER LOGIN FORM</div>
	<form method="POST" action="">
		<p>Student #: <input type="text" name="studentnum" id="studentnum"/></p>
		<p>Password: <input type="password" name="userpassword" id="userpassword" /></p>
		<p><input type="submit" value="login" name="login" /></p>
	</form>
	<a href="register.php">Register</a>

</body>
</html>
