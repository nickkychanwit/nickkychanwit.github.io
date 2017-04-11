<?php
$username = $_POST['user'];
$password = $_POST['pass'];

$username = stripcslashes($username);
$password = stripcslashes($password);

mysql_connect("localhost","root","");
mysql_select_db("user");
$result = mysql_query("select * from user where user.username='$username' and user.password='$password'") or die("Fail ".mysql_error());
$row = mysql_fetch_array($result);
if($row['username'] == $username && $row['password'] == $password){	
	$message =$row['firstname']." ".$row['lastname']." Type :".$row['type'];
	$type = $row['type'];
	setcookie("username",$username);
	setcookie("type",$type);
	echo("1");
	if($type == "admin"){
		echo '<script language="javascript">';
		echo 'alert("Hello , '.$message.'");';
		echo("window.location = 'adminHomepage.php';");
		echo '</script>';
	}else if($type == "student"){
		echo '<script language="javascript">';
		echo 'alert("Hello , '.$message.'");';
		echo("window.location = 'studentHomepage.php';");
		echo '</script>';
	}else{	
		echo '<script language="javascript">';
		echo 'alert("Hello , '.$message.'");';
		echo("window.location = 'teacherHomepage.php';");
		echo '</script>';
	}

}else{
	echo("fail");	
}
?>