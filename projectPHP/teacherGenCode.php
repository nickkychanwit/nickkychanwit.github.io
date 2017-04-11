<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<?php 
mysql_connect("localhost","root","");
mysql_select_db("user");
session_start();
$course = $_POST['course'];
$courses = explode(",",$course);
mysql_query("INSERT INTO courses_qrcode(courseID, sec) VALUES ('$courses[0]','$courses[4]')
		 ") or die("Fail ".mysql_error());
?>
<link rel="stylesheet" href="css/buttons.css">

<form action="finishQR.php" method="post">
<input type="hidden" name="courseID" value="<?php echo($courses[0]) ?>" >
<input type="hidden" name="sec" value="<?php echo($courses[4]) ?>"><br >
<script type="text/javascript">
console.log(":");

$(document).ready(function() {
 	function generateQRcode(){
 	var now = Date.now();

 	var subject = $("#checkQR").html();
 	var nric = "158.108.30.1/qrcode/studentCheckQRcode.php?course=$course";
    var url = 'https://api.qrserver.com/v1/create-qr-code/?data=' + nric + '&amp;size=300x300';
    $('#barcode').attr('src', url);
    $('#barcode').attr('title', url);
    console.log(url);
 	}
 	console.log('in ready');
 	generateQRcode();
});
console.log("eiei");
 </script> 

 <img id='barcode' src="" alt="" title="QRcode" width="300" height="300" /><br>
 <input type="number" name="sum" ></input> <input type="submit" class="button button-pill button-flat" value="finish" ></input>
 </form>
 </body>