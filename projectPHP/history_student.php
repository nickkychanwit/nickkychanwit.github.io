<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";
$student = explode(",",$_POST['student']);
$studentID = $student[0];
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
echo($student[1]." ");
    // output data of each row
		?>
  <link rel="stylesheet" href="css/buttons.css">      
 <link rel="stylesheet" media="screen" href="cssStuhistory.css">
        <form id="form" action="lab7/generate-report-student-history.php" method="post"><br />
<input type="hidden" name="studentID" value="<?php $studentID ?>"/>
		 <table id="rent" class="table avg-rent" name="rent">
                <thead>         
                    <tr class="warning">
                    <th>Student ID</th>
                    <th>Student firstname</th>
                       <th>Student lastname</th>
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
                        <td><?php echo $row['studentID'] ?></td>
                        <td><?php echo $row['firstname'] ?></td>
                        <td><?php echo $row['lastname'] ?></td>
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
         <p>
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
         </p>
         <p>
           <input type="submit" class="button button-pill button-flat"  name="pdf"/>
           <a href='excel.php'>
             excel</a></p>
</form>

<?php                    
mysqli_close($conn);
$conn = null;

	echo '<a href="teacherHomepage.php">Go back to Home Page</a>.';
?>