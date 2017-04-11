<?php
$username = $_COOKIE['username'];
$courseID = $_POST['courseID'];
$sec = $_POST['sec'];
$sum = 0;
mysql_connect("localhost","root","");
mysql_select_db("user");
$result = mysql_query("select courses_qrcode.courseID,courses_qrcode.sec,student_qrcode.studentID from courses_qrcode inner join student_qrcode  on student_qrcode.courseID=courses_qrcode.courseID and student_qrcode.sec= courses_qrcode.sec where courses_qrcode.courseID='$courseID' and courses_qrcode.sec='$sec'") or die("Fail ".mysql_error());
while($row = mysql_fetch_array($result)){
	echo("studentID :".$row['studentID']."<br>");
	$sum = $sum+1;
	}
echo("students are studying :".$sum." people<br>");
if($sum == $_POST['sum']){
echo("program == human : equal");}
else{echo("program == human : not equal");}
mysql_query("DELETE FROM student_qrcode WHERE student_qrcode.courseID='$courseID' and student_qrcode.sec='$sec'");
mysql_query("DELETE FROM courses_qrcode WHERE courses_qrcode.courseID='$courseID' and courses_qrcode.sec='$sec'");
?>
<a href="teacherHomePage.php">Go back to the main page</a>;
