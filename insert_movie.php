<?php 
require_once 'functions.php';

if(isset($_POST["Title"], $_POST["Genres"])) {
  if (empty($_POST["Title"]) || empty($_POST["Genres"])) {
    echo "<script>alert('Error: Please fill in all fields with valid data.');</script>";
    echo "<script>window.history.back();</script>";
    exit;
} else {
    insert_movie($_POST["Title"], $_POST["Genres"]);
    header("Location: http://localhost:8080/");
}
}
?>