<?php
$username = $_COOKIE['username'];

mysql_connect("localhost","root","");
mysql_select_db("user");
$result = mysql_query("select * from user where user.username='$username' ") or die("Fail ".mysql_error());
$row = mysql_fetch_array($result);
if($row['username'] == $username ){	?>
<p><img src="get.php?id=<?php echo($row['imageID'])?>" width="300" height="200" /></p>
	<p><br />
	  <?php	echo("First Name: ".$row['firstname']."<br>"."Last Name: ".$row['lastname']."<br>"."Your type is: ".$row['type']);
	$id = $row['id'];
}else{
	echo("fail");	
}
?>
</p>
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" media="screen" href="cssTeacher.css">
<form action="upload.php" method="POST" enctype='multipart/form-data'>
  <p>
    <input type="file" name='image' /> 
    <input type="submit" class="button button-pill button-flat" value="Upload"/>
  </p>
</form>
<form action="edit_password_page.php" method="post"><input type="submit" o value="Edit password"></form>

<Form action="performance_grade_page.php" method="post">
  <p>
    <label>Select course :</label>
    <select name="course">
      <option>CourseID, CourseName, Year, Term, Sec</option>
      <?php 
		$result = mysql_query("select courses.courseID ,courses.name ,courses.year,courses.term,courses.sec FROM courses INNER JOIN teacher_course 
		ON  courses.courseID=teacher_course.courseID and courses.year=teacher_course.year and courses.term=teacher_course.term and courses.sec=teacher_course.sec
		 WHERE teacher_course.teacherID= '$id' ") or die("Fail ".mysql_error());
		while($row=mysql_fetch_array($result)){ 
    	 echo("<option>".$row['courseID'].",".$row['name'].",".$row['year'].",".$row['term'].",".$row['sec']."</option>");
         } ?>
    </select>
    <input type="submit" class="button button-pill button-flat" value="performance/grade">
  </p>
</Form>

<Form action="history_student.php" method="post">
  <p>
    <label>Select Student :</label>
    <select name="student">
      <option>StudentID, Student Name</option>
      <?php 
		$result = mysql_query("select * FROM user WHERE type='student'") or die("Fail ".mysql_error());
		while($row=mysql_fetch_array($result)){ 
    	 echo("<option>".$row['id'].",".$row['firstname']." ".$row['lastname']."</option>");
         } ?>
    </select>
    <input type="submit"  class="button button-pill button-flat" value="history">
  </p>
</Form>
<Form action="teacherGenCode.php" method="post">
  <p>
    <label>Select course :</label>
    <select name="course">
      <option>CourseID, CourseName, Year, Term, Sec</option>
      <?php 
		$result = mysql_query("select courses.courseID ,courses.name ,courses.year,courses.term,courses.sec FROM courses INNER JOIN teacher_course 
		ON  courses.courseID=teacher_course.courseID and courses.year=teacher_course.year and courses.term=teacher_course.term and courses.sec=teacher_course.sec
		 WHERE teacher_course.teacherID= '$id' ") or die("Fail ".mysql_error());
		while($row=mysql_fetch_array($result)){ 
    	 echo("<option>".$row['courseID'].",".$row['name'].",".$row['year'].",".$row['term'].",".$row['sec']."</option>");
         } ?>
    </select>
    <input type="submit" class="button button-pill button-flat" value="QR Code">
  </p>
</Form>
<div class="content">                
                <div class="header-text btn">
                  <h1 style="color:#000;"><span id="head-title"></span></h1>
                </div>
</div>

<script type="text/javascript" src="js/buttons.js"></script>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/SmoothScroll.js"></script>
<script type="text/javascript" src="js/jasny-bootstrap.min.js"></script>

<script src="js/owl.carousel.js"></script>
<script src="js/typed.js"></script>
<script>
      $(function(){
          $("#head-title").typed({
            strings: ["Upload file ...^1000", "Please wait.^1000"],
            typeSpeed: 100,
            loop: true,
            startDelay: 100
          });
      });
    </script>
<script type="text/javascript" src="js/main.js"></script>
<?php 
echo '<a href="login.html">Log Out</a>.';
  	$_COOKIE['username']="";
?>