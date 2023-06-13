<?php
session_start();
require('function.php');
$sql = (new Sql())->getPdo();

$id =$_SESSION['id'];

$instruction = "DELETE FROM `users` WHERE id = :id";

$prepare = $sql -> prepare($instruction);
$prepare -> execute([":id" => $id]);

header("location: admin.php");