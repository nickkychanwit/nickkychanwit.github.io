<?php
$username = $_COOKIE['username'];

mysql_connect("localhost","root","");
mysql_select_db("user");
$result = mysql_query("select * from user where user.username='$username' ") or die("Fail ".mysql_error());
$row = mysql_fetch_array($result);
if($row['username'] == $username ){	
	echo("First Name: ".$row['firstname']."<br>"."Last Name: ".$row['lastname']."<br>"."Type: ".$row['type']);
	$type = $row['type'];
}else{
	echo("fail");	
}
?>
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" media="screen" href="cssCreateAcc.css">
<Form id="form" action="insert_user.php" method="post">
	<p>
	  <label style="font-size:28px;"><strong>Create New User</strong></label>
	  <br />
	  <label><br />
      Username :</label>
	  <input type="text" name="username" /><br />
	  <label><br />
      Password :</label>
	  <input type="text" name="password"  /><br />
	  <label><br />
      Re Password :</label>
	  <input type="text" name="repassword"  /><br />
	  
	  <label><br />
      first name :</label>
	  <input type="text" name="fname" /><br />
	  <label><br />
      last name :</label>
	  <input type="text" name="lname" /><br />
	  <label><br />
      type :</label>
	  <select name="type">
	    <option>admin</option>
	    <option>student</option>
	    <option>teacher</option>
      </select>
	  <br />
  </p>
	<p>
	  <input type="submit" class="button button-pill button-flat" name="submit" />
  </p>
</Form>


