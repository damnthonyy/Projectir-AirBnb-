<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', 'root');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

if (!empty($_POST['sign_in_ok'])) {
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
    header("location: connexion.php");
}else{header("location: connexion.php");};
?>
