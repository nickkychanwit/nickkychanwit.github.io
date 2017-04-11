<?php
    //Connect to DB
    $conn = mysql_connect ('localhost', 'root', '');
if (!$conn){
die("Could Not Connect to MySQL!");
}
if(!mysql_select_db("user")){
die("Could Not Open Database:" . mysql_error());
}

    $id = $_GET['id'];
    $query = mysql_query("SELECT * FROM image name WHERE id=$id");
    $row = mysql_fetch_array($query); //important that it's array not assoc

    echo $row['image'];
?>