<?php
$server_address = "localhost";
$username = "root";
$password = "";
$db_name = "movie-lens";

$conn = new mysqli($server_address, $username, $password, $db_name);
if (!$conn) {
    die("Unable to connect to site".mysqli_connect_error());
  }
?>