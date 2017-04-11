<?php
require('fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";
$header = array( 'Student ID',
                    'Student firstname',
                       'Student lastname',
                        'Course ID',
                        'Coursee Name',
                        'Grade',
						'Performance',
                        'Year',
                        'Term',
                        'Sec');
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT student_course.studentID,user.firstname,user.lastname,student_course.courseID,courses.name,student_course.grade ,student_course.performance,student_course.year,student_course.term,student_course.sec FROM student_course INNER JOIN courses ON  student_course.courseID=courses.courseID and student_course.year=courses.year and 
student_course.term=courses.term and student_course.sec=courses.sec
INNER JOIN  user ON user.id=student_course.studentID WHERE student_course.studentID='$studentID'";
$result = mysqli_query($conn, $sql);

$pdf->SetFont('Arial','B',12);		
foreach($header as $heading) {
		$pdf->Cell(90,12,$heading,1);
}
foreach($result as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(90,12,$column,1);
}
mysqli_close($conn);
$conn = null;


$pdf->output();

?>