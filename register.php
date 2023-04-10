<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style1.css"/>
<title>Student Database</title>
</head>
	<?php
		if (isset( $_POST['save'] ))
		{
			$studentnum = $_POST['isstudentnum'];
			$lastname = $_POST['ilastname'];
			$firstname = $_POST['ifirstname'];
			$password = $_POST['ipassword'];
			$street = $_POST['istreet'];
			$city = $_POST['icity'];
			$gender = $_POST['igender'];
			$email = $_POST['iemail'];

			$conn_string = "host=web0.eecs.uottawa.ca port = 15432 dbname=dantw005 user=dantw005 password = password";

			$dbconn = pg_connect($conn_string) or die('Connection failed');

			$query = "INSERT INTO php_project.student(student_num,last_name,first_name,student_Pass,Street,City,Gender,Email) VALUES ('$studentnum','$lastname','$firstname','$password','$street','$city','$gender','$email')";

			$result = pg_query($dbconn,$query);

			if(!$result){
				die("Error in SQL query:" .pg_last_error());
			}

			echo "Data Successfully Entered ". "<a href='login.php'>login now</a>";

			pg_free_result($result);
			pg_close($dbconn);

		}
	?>
<body>
	<div id="header"> USER REGISTRATION FORM</div>
	<form id="testform" name="testform" method="POST" action="">
		<p> <label for="isstudentnum">Student #:</label>
				<input name="isstudentnum" type="text" id="repno"/>
		</p>

		<p> <label for="ilastname">Last name:</label>
				<input name="ilastname" type="text" id="ilastname"/>
		</p>

		<p> <label for="ifirstname">First name:</label>
				<input name="ifirstname" type="text" id="ifirstname"/>
		</p>

		<p> <label for="ipassword">Password:</label>
				<input name="ipassword" type="password" id="ipassword"/>
		</p>

		<p> <label for="iconfpass">Confirm password:</label>
				<input name="iconfpass" type="password" id="iconfpass"/>
		</p>

		<p> <label for="istreet">Street:</label>
				<input name="istreet" type="text" id="istreet"/>
		</p>

		<p> <label for="icity">City:</label>
				<input name="icity" type="text" id="icity"/>
		</p>
		<p> <label for="igender">Gender:</label>
				<select name="igender">
						<option value="male">male</option>
						<option value="female">female</option>
				</select>
		</p>

		<p> <label for="iemail">Email:</label>
				<input name="iemail" type="text" id="iemail"/>
		</p>

		<p><input type="submit" value="Register" name="save" /></p>
	</form>

</body>
</html>
