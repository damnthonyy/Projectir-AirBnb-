<?php
session_start();
require('../function.php');
$sql = (new Sql())->getPdo();


$instruction = "DELETE FROM `users` WHERE id = :id";

$prepare = $sql -> prepare($instruction);
$prepare -> execute([":id" => $_SESSION['id']]);

header("location: index.php");