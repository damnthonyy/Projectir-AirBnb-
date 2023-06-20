<?php
require('../function.php');
$sql = (new Sql())->getPdo();


if($_POST['is_staf']== 1){ 

$prepare = $sql->prepare("UPDATE `users` SET `is_staf`= false WHERE id = :id");
$prepare->execute([':id'=>$_POST['id']]);
header("location:index.php");}
else{
   
$prepare = $sql->prepare("UPDATE `users` SET `is_staf`= true WHERE id = :id");
$prepare->execute([':id'=>$_POST['id']]);
header("location:index.php");
 }
    
?>