<?php
	$user = $_COOKIE['username'];
	$student = explode("," ,$_POST['student']);
	$studentID = $student[0];
	$courseID = $_POST['courseID'];
	$grade = $_POST['grade'];
	$performance = $_POST['performance'];
	$year = $_POST['year'];
	$term = $_POST['term'];
	$sec = $_POST['sec'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "user";
	mysql_connect("localhost","root","");
	mysql_select_db("user");
	try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
  	$sql = "UPDATE student_course SET grade='$grade',performance='$performance' WHERE student_course.studentID='$studentID' and student_course.courseID ='$courseID' and student_course.year='$year' and student_course.term ='$term' and student_course.sec='$sec' ";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    	echo '<script language="javascript">';
	echo 'alert("New records created successfully");';
	echo("window.location = 'teacherHomepage.php';");
	echo '</script>';

    }
catch(PDOException $e)
    {
    // roll back the transaction if something failed
    $conn->rollback();
	echo '<script language="javascript">';
	echo 'alert("Error: "  $e->getMessage();")';
	echo '</script>';
    }

$conn = null;
	
?>