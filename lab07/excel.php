<?php
require_once 'excel/Spreadsheet_Excel_Writer-0.9.3/Spreadsheet/Excel/Writer.php';

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


// Creating a workbook
$workbook = new Spreadsheet_Excel_Writer();

// sending HTTP headers
$workbook->send('test.xls');

// Creating a worksheet
$worksheet =& $workbook->addWorksheet('My first worksheet');
$worksheet->write(0, 0, 'AVG(rent)');
$worksheet->write(0, 1, 'type');
$nr = 1;
foreach($result as $row) {
	$nc = 0;
	foreach($row as $column){
		// The actual data
	$worksheet->write($nr, $nc, $column);
	$nc = $nc+1;
	}
	$nc = $nc+1;
}
mysqli_close($conn);
$conn = null;



// Let's send the file
$workbook->close();
?>