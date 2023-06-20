<?php
session_start();
if (isset($_POST['remove_btn'])) {

    

    $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', 'root');
    $delete_reservation = $bdd->prepare('DELETE FROM reservations WHERE id = :reservation_id ');
    $delete_reservation->bindValue(':reservation_id', $_POST['remove_btn']);
    $delete_reservation->execute();
    header('location: index.php');

    echo "<script>alert('Votre réservation a été annuler');</script>";
}

if (isset($_POST['log_out_button'])) {
    session_destroy();
    header("Location: ../index.php"); 
    exit();
}

?>