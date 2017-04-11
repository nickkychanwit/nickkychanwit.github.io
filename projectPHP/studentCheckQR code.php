<?php
$username = $_COOKIE['username'];
$courses = explode(",",$_GET['courses']);;

mysql_connect("localhost","root","");
mysql_select_db("user");
$result = mysql_query("select * from user where user.username='$username' ") or die("Fail ".mysql_error());
$row = mysql_fetch_array($result);
if($row['username'] == $username ){	?>

	  <?php	echo("First Name: ".$row['firstname']."<br>"."Last Name: ".$row['lastname']."<br>"."Your type is: ".$row['type']);
	$id = $row['id'];
}else{
	echo("fail");	
}
$result = mysql_query("select * from courses_qrcode 
where courses_qrcode.courseID='$courses[0]' and courses_qrcode.sec='$courses[4]'") or die("Fail ".mysql_error());
if($row = mysql_fetch_array($result)){
$result = mysql_query("INSERT INTO student_qrcode(courseID, sec, studentID) VALUES ('$courses[0]','$courses[4]','$id')") or die("Fail ".mysql_error());
echo("<br>seccess");
}

?><a href="studentHomepage.php">Go back to the main page</a>;
