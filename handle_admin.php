<?php
require_once('function.php');
$sql = (new Sql())->getPdo();
if($_POST['is_admin']== 1){ 
$prepare = $sql->prepare("UPDATE `users` SET `is_admin`= 0 WHERE id = :id");
$prepare->execute([':id'=>$_POST['id']]);
header("location:admin.php");}
else{
$prepare = $sql->prepare("UPDATE `users` SET `is_admin`= 1 WHERE id = :id");
$prepare->execute([':id'=>$_POST['id']]);
header("location:admin.php");
 }




    
    
?>