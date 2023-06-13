<?php
if($_POST['is_admin']== 1){ 
$sql = new PDO("mysql:host=localhost:3306;dbname=airbnb","root","root");
$prepare = $sql->prepare("UPDATE `users` SET `is_admin`= 0 WHERE id = :id");
$prepare->execute([':id'=>$_POST['id']]);
header("location:admin.php");}
else{
    $sql = new PDO("mysql:host=localhost:3306;dbname=airbnb","root","root");
$prepare = $sql->prepare("UPDATE `users` SET `is_admin`= 1 WHERE id = :id");
$prepare->execute([':id'=>$_POST['id']]);
header("location:admin.php");
 }




    
    
?>