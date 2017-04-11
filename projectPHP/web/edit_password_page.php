<?php
echo ("<h1>Edit Password<br><br></h1>");
$username = $_COOKIE['username'];

mysql_connect("localhost","root","");
mysql_select_db("user");
$result = mysql_query("select * from user where user.username='$username' ") or die("Fail ".mysql_error());
$row = mysql_fetch_array($result);
if($row['username'] == $username ){	
	echo($row['firstname']." ".$row['lastname']."<br>".$row['type']);
	$type = $row['type'];
}else{
	echo("fail");	
}
echo("<br>Username :".$row['username']."<br><br>");
?>

<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" media="screen" href="cssEditPass.css">
<Form id="form" action="edit_password.php" method="post">
	<p>
	  <label>Old password :</label>
	  <input type="text" class="button button-pill button-flat" name="oldpassword" />
  </p>
	<p><br />
	  <label>New password :</label>
	  <input type="text" class="button button-pill button-flat" name="newpassword"  />
  </p>
	<p><br />
	  <label>New password :</label>
	  <input type="text"class="button button-pill button-flat"  name="renewpassword"  />
  </p>
	<p><br />
	  <input type="submit" class="button button-pill button-flat" name="submit" />
  </p>

</Form>
      
