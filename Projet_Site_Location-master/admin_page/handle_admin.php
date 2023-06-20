<?php
require('../function.php');
$sql = (new Sql())->getPdo();

if($_POST['is_admin']== 1){ 
$prepare = $sql->prepare("UPDATE `users` SET `is_admin`= false WHERE id = :id");
$prepare->execute([':id'=>$_POST['id']]);
header("location:index.php");}
else{
$prepare = $sql->prepare("UPDATE `users` SET `is_admin`= true WHERE id = :id");
$prepare->execute([':id'=>$_POST['id']]);
header("location:index.php");
 }




    
    
?>