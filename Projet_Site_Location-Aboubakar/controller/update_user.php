<?php

use src\Factory\Sql;

session_start();

try {
    require './vendor/autoload.php';
    

    $bdd = (new Sql())->getPdo();
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['update_btn'])) {
    $users_id = $_SESSION["user_id"];
    $newUsername = $_POST['username'];
    $mail = $_POST['mail'];
    $birthdate = $_POST['birthdate'];

    $birthdate = date('Y-m-d', strtotime($birthdate));

    $updateQuery = $bdd->prepare("UPDATE users SET username = :newUsername, mail = :mail, birthdate = :birthdate WHERE id = :users_id");
    $updateQuery->bindParam(':newUsername', $newUsername);
    $updateQuery->bindParam(':mail', $mail);
    $updateQuery->bindParam(':birthdate', $birthdate);
    $updateQuery->bindParam(':users_id', $users_id);
    $updateQuery->execute();

    header("Location: http://localhost/Projet_Site_Location-Aboubakar");
    exit();
}
?>



