<?php

use src\Factory\Sql;

session_start();

if (isset($_POST['delete_btn'])) {
    $id =  $_SESSION['annonce_id'];

    require './vendor/autoload.php';
    

    $bdd = (new Sql())->getPdo();
    $delete_query = $bdd->prepare("DELETE FROM annonces WHERE id = :id");
    $delete_query->bindValue(':id', $id);
    $delete_query->execute();

    echo "L'annonce a été supprimée avec succès !";
    
}
?>