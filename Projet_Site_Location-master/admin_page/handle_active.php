<?php
require('../function.php');
$sql = (new Sql())->getPdo();

if($_POST['is_active']== 0){ 
$prepare = $sql->prepare("UPDATE `users` SET `is_active`= 1 WHERE id = :id");
$prepare->execute([':id'=>$_POST['id']]);
header("location:index.php");}
else{

$prepare = $sql->prepare("UPDATE `users` SET `is_active`= 0 WHERE id = :id");
$prepare->execute([':id'=>$_POST['id']]);
header("location:index.php");
 }