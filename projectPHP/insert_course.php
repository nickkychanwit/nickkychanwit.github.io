<a href="file:///C|/xampp/htdocs/projectWEb/performance_grade_page.php">performance_grade_page</a><?php
$courseID = $_POST['course_id'];
$courseName = $_POST['course_name'];
$year = $_POST['year'];
$term = $_POST['term'];
$sec = $_POST['sec'];
mysql_connect("localhost","root","");
mysql_select_db("user");
try {
    $conn = new PDO("mysql:host=localhost;dbname=user", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // begin the transaction
    $conn->beginTransaction();
    // our SQL statements
    $conn->exec("INSERT INTO courses ( courseID, name,year,term,sec) 
    VALUES ('$courseID', '$courseName', '$year','$term','$sec')");

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