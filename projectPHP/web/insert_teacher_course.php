<?php
$type = $_POST['type'];
$course = explode('-', $_POST['course']);
$teacher = explode('-',$_POST['teacher']);
$teacherID = $teacher[0];
$courseID = $course[0];
$year = $course[2];
$term = $course[3];
$sec = $course[4];
mysql_connect("localhost","root","");
mysql_select_db("user");
try {
    $conn = new PDO("mysql:host=localhost;dbname=user", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // begin the transaction
    $conn->beginTransaction();
    // our SQL statements
    $conn->exec("INSERT INTO teacher_course ( teacherID,courseID,year,term,sec,type) 
    VALUES ('$teacherID', '$courseID', '$year','$term','$sec','$type')");

    // commit the transaction
    $conn->commit();
	echo '<script language="javascript">';
	echo 'alert("New records created successfully");';
	echo("window.location = 'upload_data.php';");
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