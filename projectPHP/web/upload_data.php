<?php
$username = $_COOKIE['username'];

mysql_connect("localhost","root","");
mysql_select_db("user");
?>
<h1>Upload data</h1>
<form action="csv_upload.php" method="post" enctype="multipart/form-data" name="form1">
<input name="fileCSV" type="file" id="fileCSV">
<input name="btnSubmit" type="submit" id="btnSubmit" class="button button-pill button-flat" value="Submit">
</form>
<Form id="form1" action="insert_student_course.php" method="post">
	<p>
	  <label>Student name :</label>
	  <select name="student">
	    
	    <?php 
		$result = mysql_query("select firstname,lastname,id from user where type='student' ") or die("Fail ".mysql_error());
		while($row=mysql_fetch_array($result)){ 
    	 echo("<option>".$row['id'].'-'.$row['firstname'].$row['lastname']."</option>");
         } ?>
      </select>
	  <br /><br />
	  <label>Course :</label>
	  <select name="course">
	    
	    <?php 
		$result = mysql_query("select * from courses ") or die("Fail ".mysql_error());
		while($row=mysql_fetch_array($result)){ 
    	 echo("<option>".$row['courseID']."-".$row['name']."-".$row['year']."-".$row['term']."-".$row['sec']."</option>");
         } ?>
      </select>
  </p>
	<p><br />
	  <input type="submit" class="button button-pill button-flat" name="submit" />
  </p>

</Form>

<Form id="form2" action="insert_teacher_course.php" method="post">
	<p>
	  <label>Teacher name :</label>
	  <select name="teacher">
	    
	    <?php 
		$result = mysql_query("select firstname,lastname,id from user where type='teacher' ") or die("Fail ".mysql_error());
		while($row=mysql_fetch_array($result)){ 
    	 echo("<option>".$row['id']."-".$row['firstname'].$row['lastname']."</option>");
         } ?>
      </select>
  </p>
	<p><br /> 
	  <label>type :</label>
	  <select name="type">
	    <option>lecture</option>
	    <option>practice</option>
      </select>
  </p>
	<p><br />
	  <label>Course :</label>
	  <select name="course">
	    
	    <?php 
		$result = mysql_query("select * from courses ") or die("Fail ".mysql_error());
		while($row=mysql_fetch_array($result)){ 
    	 echo("<option>".$row['courseID']."-".$row['name']."-".$row['year']."-".$row['term']."-".$row['sec']."</option>");
         } ?>
      </select>
  </p>
	<p><br />
	  <input type="submit" class="button button-pill button-flat" name="submit" />
  </p>

</Form>
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" media="screen" href="cssUpload.css">
<Form id="form3" action="insert_course.php" method="post">
    	<p>
    	  <label>Course id :</label>
    	  <input type="number" name="course_id" size="8"/>
    	</p>
    	<p><br />

	      <label>Course name :</label>
	      <input type="text" name="course_name"  />
    	</p>
    	<p><br />
    	  
    	  <label>Year :</label>
    	  <select name="year">
    	    <option>2017</option>
    	    <option>2018</option>
    	    <option>2019</option>
    	    <option>2020</option>
   	      </select>
   	  </p>
    	<p><br />
    	  <label >Term :</label>
    	  <select name="term">
    	    <option>1</option>
    	    <option>2</option>
   	      </select>
   	    </p>
    	<p><br />
    	  sec :<input type="text" name="sec" />
   	  </p>
    	<p><br />
    	  <input type="submit" class="button button-pill button-flat" name="submit" />
  	  </p>

</Form>
<a href="adminHomepage.php">Go back to the main page</a>;
