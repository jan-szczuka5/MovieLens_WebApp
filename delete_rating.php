<?php 
require_once 'functions.php';
$id = mysqli_real_escape_string($conn, $_GET['id']);

delete_rating($_GET['user'], $_GET['id'], $_GET['rating']);
// echo "<script>window.history.back();</script>";
// header("Location: http://localhost:8080/ratings.php?id=$id");

?>