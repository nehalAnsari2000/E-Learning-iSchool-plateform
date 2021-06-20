<?php
$db_host = "localhost:3307";
$db_user = "root";
$db_pass = "";
$db_name = "ischool";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if($conn -> connect_error){
  die('Connection failed');
}

?>