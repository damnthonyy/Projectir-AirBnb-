<?php

use src\Factory\Sql;

try {
    require './vendor/autoload.php';
    

    $bdd = (new Sql())->getPdo();
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['sign_in_ok'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $birthdate = $_POST['birthdate'];
    $gender = strtoupper($_POST['gender'][0]);

    $requete = $bdd->prepare('INSERT INTO users (mail, username, users_password, birthdate, gender) VALUES ( :mail, :username, :user_password, :birthdate, :gender)');
    $requete->execute([
        "mail" => $email,
        "username" => $username,
        "user_password" => $hashedPassword,
        "birthdate" => $birthdate,
        "gender" => $gender,
    ]);
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
            header("Location: http://localhost/Projet_Site_Location-Aboubakar");
            exit();
        }
    }
    header("Location: error");
}
?>

