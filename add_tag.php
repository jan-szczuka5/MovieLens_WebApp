<?php 
require_once 'functions.php';
$id = mysqli_real_escape_string($conn, $_POST['id']);

if(isset($_POST["Name"], $_POST['User'])) {
  if (empty($_POST["Name"])||empty($_POST['User'])) {
    echo "<script>alert('Error: Please fill in all fields with valid data.');</script>";
    echo "<script>window.history.back();</script>";
    exit;
} else {
    add_tag($_POST["Name"], $_POST['id'], $_POST['User']);
    header("Location: http://localhost:8080/tags.php?id=$id");
}
}
?>