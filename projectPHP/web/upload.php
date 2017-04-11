  <?php
  $username = $_COOKIE['username'];
    //Connect to DB
    $conn = mysql_connect ('localhost', 'root', '');
	if (!$conn){
		die("Could Not Connect to MySQL!");
	}
	if(!mysql_select_db("user")){
		die("Could Not Open Database:" . mysql_error());
	}
    //file properties
    $file = $_FILES['image']['tmp_name'];

    if (!isset($file)){
      echo "<p>Please Select an Image</p>";
    } else {
      $image = mysql_real_escape_string(file_get_contents($_FILES['image']['tmp_name']));
      $image_name = mysql_real_escape_string($_FILES['image']['name']);
      $image_size = getimagesize($_FILES['image']['tmp_name']);

      if ($image_size==FALSE) {
        echo "<p>NOT AN IMAGE</p>";
      } else {
        echo "<p>File is an Image. Processing...</p>";
        if(!$insert = mysql_query("INSERT INTO image(id, imagename, image) VALUES ('','$image_name','$image')")){
          echo ("<p>Error Uploading Image: " . mysql_error() . "</p>");
        } else {
          $lastid = mysql_insert_id();
		  mysql_query("UPDATE user SET imageID=$lastid WHERE username='$username'");
          echo "<p>Success!</p>";
          echo "<img src=get.php?id=$lastid>";
		 
        }
      }
    }
    ?>