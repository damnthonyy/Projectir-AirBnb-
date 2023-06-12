<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', 'root');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST["log_in_button"])) {
    $email = $_POST['log_in_email'];
    $password = $_POST['log_in_password'];

    $requete = $bdd->prepare('SELECT * FROM users WHERE mail = :email');
    $requete->execute(["email" => $email]);
    $user = $requete->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user["users_password"])) {
            echo "successfully connected";
            $_SESSION["username"] = $user["username"];
            $_SESSION["user_id"] = $user["id"];
            header("Location: http://localhost/Projet_Air_BnB/bdd.php");
            exit();
        }
    }
    header("Location: http://localhost/Projet_Air_BnB/wrong_password.php");
}
