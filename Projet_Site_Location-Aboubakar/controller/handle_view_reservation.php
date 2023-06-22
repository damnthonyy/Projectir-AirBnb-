<?php

use src\Factory\Sql;

 session_start(); ?>

<?php
try {
    require './vendor/autoload.php';
    

    $bdd = (new Sql())->getPdo();
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


$annonce_id = $_SESSION['annonce_id'];
$annonce_query = $bdd->prepare("SELECT * FROM annonces WHERE id = :annonce_id");
$annonce_query->bindParam(':annonce_id', $annonce_id);
$annonce_query->execute();


$annonce = $annonce_query->fetch(PDO::FETCH_ASSOC);


if (!$annonce) {
    exit();
}

if (isset($_POST['comment_btn'])) {
    $user_id = $_SESSION["user_id"];
    $username = $_SESSION["username"];
    $annonce_id = $_SESSION['annonce_id'];
    $content = $_POST['comment_content'];

    $annonce_requete = $bdd->prepare('INSERT INTO annonces_comments (user_id, username, body, annonces_id) VALUES (:user_id, :username, :content, :annonce_id)');
    $annonce_requete->execute([
        "user_id" => $user_id,
        "username" => $username,
        "content" => $content,
        "annonce_id" => $annonce_id,
    ]);

    if ($annonce_requete) {
        echo "Insertion réussie.";
    } else {
        echo "Échec de l'insertion.";
    }
}

$comment_query = $bdd->prepare('SELECT * FROM annonces_comments WHERE annonces_id = :annonce_id');
$comment_query->bindParam(':annonce_id', $annonce_id);
$comment_query->execute();
$user_comment = $comment_query->fetchAll(PDO::FETCH_ASSOC);


$users_query = $bdd->prepare('SELECT users.username FROM users INNER JOIN annonces_comments ON users.id = annonces_comments.user_id');
$users_query->execute();
$usernames = $users_query->fetchAll(PDO::FETCH_COLUMN);


if (isset($_POST["reservation_ok"])) {
    if (!isset($_SESSION["user_id"])) {
        echo "<script>alert('Erreur : Vous devez être connecté pour effectuer une réservation.');</script>";
    } else {
        $user_id = $_SESSION["user_id"];
        $annonce_id = $_GET['id'];
        $annonce_price = $_SESSION["price"];
        $annonce_date = $_POST['date_input'];

        $existing_reservation_query = $bdd->prepare("SELECT * FROM reservations WHERE annonces_id = :annonce_id AND annonces_date = :date_input");
        $existing_reservation_query->execute([
            "annonce_id" => $annonce_id,
            "date_input" => $annonce_date,
        ]);

        if ($existing_reservation_query->rowCount() > 0) {
            echo "<script>alert('La date sélectionnée n\'est pas disponible. Veuillez choisir une autre date.');</script>";
        } else {
            $requete = $bdd->prepare('INSERT INTO reservations (users_id, annonces_id, annonces_date, reservations_price) VALUES (:user_id, :id, :date_input, :price)');
            $requete->execute([
                "user_id" => $user_id,
                "id" => $annonce_id,
                "date_input" => $annonce_date,
                "price" => $annonce_price,
            ]);

            if ($requete) {
                echo "<script>alert('Votre annonce est réservée');</script>";
            }
        }
    }
}
?>