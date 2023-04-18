<?php 
require_once 'functions.php';
delete_movie($_GET['id']);
header("Location: http://localhost:8080/");

?>