<?php 
require_once 'functions.php';

if(isset($_POST["Name"])) {
  if (empty($_POST["Name"])) {
    echo "<script>alert('Error: Please fill in all fields with valid data.');</script>";
    echo "<script>window.history.back();</script>";
    exit;
} else {
    insert_tag($_POST["Name"]);
    header("Location: http://localhost:8080/");
}
}
?>