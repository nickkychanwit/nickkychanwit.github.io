<?php
	$user = $_COOKIE['username'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "user";
	mysql_connect("localhost","root","");
	mysql_select_db("user");
	$oldpass = $_POST['oldpassword'];
	if($_POST['newpassword']!=$_POST['renewpassword']){echo("incorrect");}
	$newpass = $_POST['newpassword'];
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE user SET password='$newpass' WHERE username='$user' and password='$oldpass'";
	
	
		// Prepare statement
		$stmt = $conn->prepare($sql);
	
		// execute the query
		$stmt->execute();
		echo '<script language="javascript">alert(" records UPDATED successfully");';
		echo("window.location = 'Login.html';");
		echo '</script>';
	
		// echo a message to say the UPDATE succeeded
    }
	catch(PDOException $e)
    {
		echo '<script language="javascript">';
		echo 'alert("$sql  <br>  $e->getMessage()")';
		echo '</script>';
    }

$conn = null;
	   
?>