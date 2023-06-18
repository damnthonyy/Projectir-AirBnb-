<?php
require('../function.php');
$sql = (new Sql())->getPdo();


if($_POST['is_staf']== 1){ 

$prepare = $sql->prepare("UPDATE `users` SET `is_staf`= 0 WHERE id = :id");
$prepare->execute([':id'=>$_POST['id']]);
header("location:index.php");}
else{
   
$prepare = $sql->prepare("UPDATE `users` SET `is_staf`= 1 WHERE id = :id");
$prepare->execute([':id'=>$_POST['id']]);
header("location:index.php");
 }
    
?>