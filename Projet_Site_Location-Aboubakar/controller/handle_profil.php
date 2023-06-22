<?php

use src\Factory\Sql;

session_start();

try {
    require './vendor/autoload.php';
    

    $bdd = (new Sql())->getPdo();
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

$users_id =  $_SESSION["user_id"];

$user_query = $bdd->prepare("SELECT * FROM users WHERE id = :users_id");
$user_query->bindParam(':users_id', $users_id);
$user_query->execute();
$users = $user_query->fetchAll(PDO::FETCH_ASSOC);


$reservations_query = $bdd->prepare("SELECT reservations.*, annonces.images3 FROM reservations INNER JOIN annonces ON reservations.annonces_id = annonces.id WHERE reservations.users_id = :users_id");
$reservations_query->bindParam(':users_id', $users_id);
$reservations_query->execute();
$reservations = $reservations_query->fetchAll(PDO::FETCH_ASSOC);



if(isset($_SESSION['annonce_id'])){
    $annonce_id = $_SESSION['annonce_id'];
    $annonceQuery = $bdd->prepare("SELECT * FROM annonces WHERE id = :annonce_id");
    $annonceQuery->bindParam(':annonce_id', $annonce_id);
    $annonceQuery->execute();
    $annonce = $annonceQuery->fetch(PDO::FETCH_ASSOC);}

$commentaires_query = $bdd->prepare("SELECT * FROM annonces_comments WHERE user_id = :users_id");
$commentaires_query->bindParam(':users_id', $users_id);
$commentaires_query->execute();
$commentaires = $commentaires_query->fetchAll(PDO::FETCH_ASSOC);



if (isset($_POST['remove_btn'])) {

    $reservation_id;

    $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', 'root');
    $delete_reservation = $bdd->prepare('DELETE FROM reservations WHERE id = :reservation_id ');
    $delete_reservation->bindValue(':reservation_id', $reservation_id);
    $delete_reservation->execute();

    echo "<script>alert('Votre réservation a été annuler');</script>";
}

if (isset($_POST['log_out_button'])) {
    session_destroy();
    header("Location: ../home/home.php");
    exit();
}

?>