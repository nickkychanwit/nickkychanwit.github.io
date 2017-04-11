<?php
	move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV
	mysql_connect("localhost","root","") or die("Error Connect to Database"); // Conect to MySQL
	$objDB = mysql_select_db("user");
	$objCSV = fopen($_FILES["fileCSV"]["name"], "r");
		while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
			// courseID, name, year, term, sec , lecture teacherID, practice teacherid , studentId
			// 0,1,2,3,4,5,6,7
			$strSQL  ="INSERT INTO courses";
			$strSQL .="(courseID, name, year, term, sec) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$objArr[0]."','".$objArr[1]."','".$objArr[2]."' ";
			$strSQL .=",'".$objArr[3]."','".$objArr[4]."') ";

			$strSQL .="INSERT INTO teacher_course";
			$strSQL .="(teacherID`, `courseID`, `year`, `term`, `sec`, `type) "; 
			$strSQL .="VALUES ";
			$strSQL .="('".$objArr[5]."','".$objArr[0]."','".$objArr[2]."','".$objArr[3]."','".$objArr[4]."','".$objArr[5]."')";

			$strSQL .="INSERT INTO teacher_course";
			$strSQL .="(teacherID, courseID, year, term, sec, type) ";  
			$strSQL .="VALUES ";
			$strSQL .="('".$objArr[5]."','".$objArr[0]."','".$objArr[2]."','".$objArr[3]."','".$objArr[4]."','".$objArr[6]."')"; 
			$strSQL .="INSERT INTO student_course";
			$strSQL .="(studentID, courseID, grade, performance, year, term, sec) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$objArr[7]."','".$objArr[0]."','"."N"."','"."N"."','".$objArr[2]."','".$objArr[3]."','".$objArr[4]."')";
			$objQuery = mysql_query($strSQL);
}
fclose($objCSV);
echo "Upload  Import Done.";
echo"<script language=\"javascript\"> alert('Upload  Import Done.'); </script>";
echo"<meta http-equiv='refresh' content='2;url=upload_data.php'>";

?>
