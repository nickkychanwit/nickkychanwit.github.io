<?php
$username = $_COOKIE['username'];
$courses = explode(",",$_POST['course']);
$courseID = $courses[0];
$courseName = $courses[1];
$year = $courses[2];
$term = $courses[3];
$sec = $courses[4];

mysql_connect("localhost","root","");
mysql_select_db("user");

?>
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" media="screen" href="cssPerfor.css">
<h1>Performance grade</h1>
<Form id="form" action="update_grade_performance.php" method="post">
    <p>
      <label>Course ID :</label>
      <input type="hidden" name="courseID" value="<?php echo($courseID)?>">
      <label> Course Name :</label>
      <input type="hidden" name="courseName" value="<?php echo($courseName)?>">
      <label> YEAR :</label>
      <input type="hidden" name="year" value="<?php echo($year)?>">
      </label>
      <label> TERM :</label>
      <input type="hidden" name="term" value="<?php echo($term)?>">
      <label> SEC :</label>
      <input type="hidden" name="sec" value="<?php echo($sec)?>">
    </p>
    <p><br />
      <label>Select student :</label>
      <select name="student">
        <option>StudentID, Student Name</option>
        <?php 
		$result = mysql_query("select student_course.studentID,user.firstname,user.lastname from student_course 
		INNER JOIN user 
		ON user.id=student_course.studentID where studentID > 0 and student_course.courseID='$courseID' and student_course.year='$year' and student_course.term='$term' and student_course.sec='$sec'") or die("Fail ".mysql_error());
		while($row=mysql_fetch_array($result)){ 
    	 echo("<option>".$row['studentID'].",".$row['firstname']." ".$row['lastname']."</option>");
         } ?>
      </select>
    </p>
    <p>      <br />
      <label>GRADE :</label>
      <select name="grade">
        <option>A</option>
        <option>B</option>
        <option>C</option>
        <option>D</option>
        <option>F</option>
      </select>
    </p>
    <p><br  />
      <label>PERFORMANCE :</label> 
      <input type="text" name="performance" />
    </p>
    <p><br />
      <input type="submit" class="button button-pill button-flat" name="submit" />
    </p>
</Form>