<?php
$bdd = new PDO('mysql:host=localhost;dbname=airbnb', 'root', 'root');
if (isset($_POST['id'])) {
    $id =  $_POST['id'];

    
    $delete_query = $bdd->prepare("DELETE FROM annonces WHERE id = :id");
    $delete_query->execute([':id'=> $id]);

    header('location: http://localhost/Projet_Site_Location-master');
    
};
echo($_POST['id']);
