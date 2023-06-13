<?php
session_start();
$sql = new PDO("mysql:host=localhost:3306;dbname=airbnb","root","root");

$id =$_SESSION['id'];

$instruction = "DELETE FROM `users` WHERE id = :id";

$prepare = $sql -> prepare($instruction);
$prepare -> execute([":id" => $id]);

header("location: admin.php");