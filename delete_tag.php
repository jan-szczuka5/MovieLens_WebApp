<?php 
require_once 'functions.php';
$id = mysqli_real_escape_string($conn, $_GET['id']);

delete_tag($_GET['user'], $_GET['id'], $_GET['tag']);
// echo "<script>window.history.back();</script>";
header("Location: http://localhost:8080/tags.php?id=$id");

?>