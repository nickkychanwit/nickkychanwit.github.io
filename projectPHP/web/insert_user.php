<?php
$username = $_POST['username'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$type = $_POST['type'];
mysql_connect("localhost","root","");
mysql_select_db("user");
try {
    $conn = new PDO("mysql:host=localhost;dbname=user", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // begin the transaction
    $conn->beginTransaction();
    // our SQL statements
    $conn->exec("INSERT INTO User ( username, password,firstname,lastname,type) 
    VALUES ('$username', '$password', '$fname','$lname','$type')");

    // commit the transaction
    $conn->commit();
	echo '<script language="javascript">';
	echo 'alert("New records created successfully");';
	echo("window.location = 'adminHomepage.php';");
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