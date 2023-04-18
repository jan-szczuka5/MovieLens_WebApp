<?php 
require_once 'functions.php';
$id = mysqli_real_escape_string($conn, $_POST['id']);

if(isset($_POST["Rating"], $_POST['User'])) {
  if (empty($_POST["Rating"])||empty($_POST['User'])) {
    echo "<script>alert('Error: Please fill in all fields with valid data.');</script>";
    echo "<script>window.history.back();</script>";
    exit;
} else {
    add_rating($_POST["Rating"], $_POST['id'], $_POST['User']);
    header("Location: http://localhost:8080/ratings.php?id=$id");
}
}
?>