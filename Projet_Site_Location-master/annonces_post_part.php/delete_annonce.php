<?php
require_once('../function.php');

 $bdd = (new Sql())->getPdo();
if (isset($_POST['id'])) {
    $id =  $_POST['id'];

    
    $delete_query = $bdd->prepare("DELETE FROM annonces WHERE id = :id");
    $delete_query->execute([':id'=> $id]);

    header('location: http://localhost/Projet_Site_Location-master');
    
};
echo($_POST['id']);
