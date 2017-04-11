<?php
$username = $_COOKIE['username'];

mysql_connect("localhost","root","");
mysql_select_db("user");
$result = mysql_query("select * from user where user.username='$username' ") or die("Fail ".mysql_error());
$row = mysql_fetch_array($result);
if($row['username'] == $username ){	
	echo("First Name: ".$row['firstname']."<br>"."Last Name: ".$row['lastname']."<br>"."Type: ".$row['type']."<br><br>");
	$id = $row['id'];
}else{
	echo("fail");	
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT student_course.courseID,courses.name,student_course.grade ,student_course.performance,student_course.year,student_course.term,student_course.sec FROM student_course INNER JOIN courses ON  student_course.courseID=courses.courseID and student_course.year=courses.year and 
student_course.term=courses.term and student_course.sec=courses.sec WHERE student_course.studentID='$id'";
$result = mysqli_query($conn, $sql);

    // output data of each row
		?>
        <link rel="stylesheet" media="screen" href="cssStucourse.css">
        <form id="form" action="lab7\generate-report.php" method="post">
    <table id="rent" class="table avg-rent" name="rent">
           <thead>         
                    <tr class="warning">
                        <th>Course ID</th>
                        <th>Coursee Name</th>
                        <th>Grade</th>
						<th>Performance</th>
                        <th>Year</th>
                        <th>Term</th>
                        <th>Sec</th>

                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){?>
                    <tr>
                        <td><?php echo $row['courseID'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['grade'] ?></td>
                        <td><?php echo $row['performance'] ?></td>
                        <td><?php echo $row['year'] ?></td>
                        <td><?php echo $row['term'] ?></td>
                        <td><?php echo $row['sec'] ?></td>
                    </tr>
                    <?php }?>
                    </tbody>
                    
                    </table>
                    	
    <select >
            <option selected="href='excel.php'">
            excel
             </option>
             <option onclick=" <a href='excel.php'>
                </a>">
             <a href="excel.php">
            		pdf
                </a>
             </option>
        </select>
    <input type="submit" name="pdf"/>
    <a href='excel.php'>
                excel</a>
</form>

<?php                    
mysqli_close($conn);
$conn = null;

	echo '<a href="teacherHomepage.html">Go back to  Home Page</a>.';

?>