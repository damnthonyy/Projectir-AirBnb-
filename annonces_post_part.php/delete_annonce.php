<?php
session_start();

if (isset($_POST['delete_btn'])) {
    $id =  $_SESSION['annonce_id'];

    $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', 'root');
    $delete_query = $bdd->prepare("DELETE FROM annonces WHERE id = :id");
    $delete_query->bindValue(':id', $id);
    $delete_query->execute();

    echo "L'annonce a été supprimée avec succès !";
    
}
?>