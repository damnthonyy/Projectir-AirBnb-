<?php

use src\Factory\Sql;

if (isset($_POST["update_password"])) {
    $mail = $_POST["email"];
    $new_password = $_POST["validate_password"];
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    require './vendor/autoload.php';
    

    $bdd = (new Sql())->getPdo();

    $stmt = $bdd->prepare("UPDATE users SET users_password = :validate_password WHERE mail = :email");
    $stmt->bindValue(':validate_password', $hashed_password);
    $stmt->bindValue(':email', $mail);
    $result = $stmt->execute();

    if ($result) {
        header('Location: connexion');
        exit();
    } else {
        header('Location: fails');
        exit();
    }
}
?>
