<?php
$username = $_COOKIE['username'];

mysql_connect("localhost","root","");
mysql_select_db("user");
$result = mysql_query("select * from user where user.username='$username' ") or die("Fail ".mysql_error());
$row = mysql_fetch_array($result);
if($row['username'] == $username ){	?>
	<img src="get.php?id=<?php echo($row['imageID'])?>" width="300" height="200" /><br><br />
<?php	echo("First name: ".$row['firstname']."<br>"."Last name: ".$row['lastname']."<br>"."Your type is: ".$row['type']);
	$id = $row['id'];
}else{
	echo("fail");	
}
?>
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" media="screen" href="cssAdminhome.css">
<form action="upload.php" method="POST" enctype='multipart/form-data'>

  <input type="file" name='image' />

  <input type="submit" class="button button-pill button-flat"  value="Upload"/>
</form>

<form action="edit_password_page.php" method="post">
<input type="submit" class="button button-pill button-flat" value="Edit password"></form>
<Form action="create_account.php" method="post">
  <input type="submit" class="button button-pill button-flat" value="Create account"></Form>
  <form action="upload_data.php" method="post">
  
  <input type="submit" class="button button-pill button-flat" value="Upload data of enrolment">
</Form>
<div class="content">                
                <div class="header-text btn">
                  <h1 style="color:#000;"><span id="head-title"></span></h1>
                </div>
</div>
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