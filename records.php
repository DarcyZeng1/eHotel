<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Student Information</title>
	</head>
	<?php
	session_start();
	if (!isset( $_SESSION['studentnum'] ))
	{
		echo "Please" ."<a href='login.php'>Login</a>";
		exit;
	}
	$conn_string = "host=web0.eecs.uottawa.ca port = 15432 dbname=dantw005 user=dantw005 password = password";

	$dbh = pg_connect($conn_string) or die('Connection failed');

	$studentnum = $_SESSION['studentnum'];
		$sql = "SELECT c.COURSE, g.YEAR, g.SEC, g.GRADE from php_project.Student s, php_project.Grades g, php_project.Courses c WHERE s.Student_NUM=g.Student_NUM and g.Course_num=c.course_num AND s.Student_NUM=$1";
		$stmt = pg_prepare($dbh,"ps",$sql);
		$result = pg_execute($dbh,"ps",array($studentnum));
		if(!$result){
			die("Error in SQL query:" .pg_last_error());
		}


	?>
	<body>
		<div id="header">student Record Details</div>
		<table>
			<tr>
				<th>Course</th>
				<th>Year</th>
				<th>Session</th>
				<th>Grade</th>
			</tr>

			<?php
			$resultArr = pg_fetch_all($result);

			foreach($resultArr as $array)
			{
			    echo '<tr>
									<td>'. $array['course'].'</td>
									<td>'. $array['year'].'</td>
									<td>'. $array['sec'].'</td>
									<td>'. $array['grade'].'</td>
			          </tr>';
			}
			echo '</table>';
			?>

		</table>
	</body>

</html>
