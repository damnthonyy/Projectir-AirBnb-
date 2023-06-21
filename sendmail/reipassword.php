<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>
    <link rel="stylesheet" href="./css/reipassword.css">
</head>
<body class="forgot_password_body" >

    <div class="logo">
        <img src="./img/Consisto-removebg-preview.png" alt="">
    </div>

    <div class="forgot_password_form">
        <h2>Mot de passe oublié</h2>
        <form action="" method="post">
            <input type="email" placeholder="Adresse email *" name="email">
            <button type="submit" >Send a password</button>
        </form>
    </div>
</body>
</html>

<?php

// include "bd.php";

// $to=$_POST['email'] ?? "test@mail.fr";
// $subject = "réinitialisation de mot de passe";
// $url ="http://localhost/Projet_Site_Location/subscribiton_part.php/token/index.php";
// $message = "Le lien pour réinitialiser votre mo de passe est: $url";

// $headers = "content-Type: text/plain; charset=utf-8\r\n";
// $headers ="From: consisto185@gmail.com\r\n";

// ini_set('SMTP', 'smtp.example.com');
// ini_set('smtp_port', 587);

// if (mail($to, $subject, $message, $headers)) {
//     echo "Envoye !";
// } else {
//     echo "Erreur d'envoie !";
// }


if (isset($_POST['email'])) {
    include "bd.php";
    $token = uniqid();
    $subject = "Réinitialisation du mot de passe";

    $url = "http://localhost/Projet_Site_Location-2/sendmail/token/update_password.php?token=$token";

    $message = "Bonjour, voici le lien pour réinitialiser votre mot de passe: $url";
    $headers = "content-Type: text/plain; charset=utf-8";
    $headers ="From: consisto185@gmail.com";


    if (mail($_POST['email'], $subject, $message, $headers)) {
        $bd = "UPDATE users SET token = ? WHERE mail = ?";
        $requete = $bdd->prepare($bd);
        $requete -> execute([
            $token,
            $_POST['email'],
        ]);
        echo "Mail envoyé";
    } else {
        echo "Une erreur est survenue, veuillez ressayer";
    }
    
}