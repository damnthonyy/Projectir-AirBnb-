<?php

require "../bd.php";

if(isset($_GET['token']) && $_GET['token']!= ''){
    $stmt = $bdd -> prepare("SELECT mail FROM users WHERE token = ?");
    $stmt -> execute([
        $_GET['token']
    ]);
    $email = $stmt -> fetch();
    
    if ($email) {
        ?>
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/style.css">
            <title>CHANGER DE MOT DE PASSE</title>
        </head>
        <body class="update_password_body">
            <div class="logo">
                <img src="../img/Consisto-removebg-preview.png" alt="">
            </div>
            <div class="update_password_form">
                <h3>CHANGER DE MOT DE PASSE</h3>
                <form action="" method="POST">
                    <div class="change_password_input">
                        <input type="text" placeholder="Adresse email" name="email">
                        <input type="password" placeholder="Nouveau mots de passe" name="validate_password">
                        <button class="log_in_button" name="update_password">CHANGER DE MOT DE PASSE</button>
                    </div>
                </form>
            </div>
        </body>
        </html>

        <?php
    }
}

if (isset($_POST["update_password"])) {
    $email = $_POST["email"];
    
    $new_password = $_POST["validate_password"];
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $stmt = $bdd->prepare("UPDATE users SET users_password = :validate_password, token=NULL WHERE mail = :email");
    $stmt->bindValue(':validate_password', $hashed_password);
    $stmt->bindValue(':email', $email);
    $result = $stmt->execute();

    if ($result) {

        //Rédiriger l'utilisateur vers la page de connexion après avoir modifier le mot de passe,
        header('Location: http://localhost/Projet_Site_Location-2/sendmail/pageconnexion.php');

        // et envoyer un mail pour notifier la modification du mot de passe.
        $subject = "Votre mot de passe a été modifié";

        $url = "http://localhost/Projet_Site_Location-2/sendmail/token/update_password.php?";

        $message = "Bonjour, votre mot de passe a été modifié avec succès. Si vous n'êtes à l'origine de ce changement veuillez cliquer sur le lien pour modifier votre mot de passe: $url";
        $headers = "content-Type: text/plain; charset=utf-8";
        $headers ="From: consisto185@gmail.com";


        if (mail($_POST['email'], $subject, $message, $headers)) {
            $bd = "UPDATE users SET token = ? WHERE mail = ?";
            $requete = $bdd->prepare($bd);
            $requete -> execute([
                $token,
                $_POST['email'],
            ]);
        }
    
        exit();

    } else {
        // header('Location: http://localhost/Projet_Air_BnB/update_fail.php');
        exit();
    }
}
