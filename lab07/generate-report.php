<?php
require('fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dreamhome";
$header['avg(rent)'] = "avg(rent)";
$header['type'] = "type";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT avg(rent),type FROM propertyforrent group by type";
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