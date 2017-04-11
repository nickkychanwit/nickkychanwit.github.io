

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webtech";

$customerID=$_POST['customerID'];
$citizenID=$_POST['citizenID'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO customers (customerID, citizenID, fname, lname)
VALUES ('$customerID', '$citizenID', '$fname','$lname')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>