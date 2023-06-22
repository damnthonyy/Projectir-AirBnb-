<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>CHANGER DE MOT DE PASSE</title>
</head>

<body class="update_password_body">
    <div class="logo">
        <img src="./subsription_part_images.php/Consisto-removebg-preview.png" alt="">
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

<?php require './controller/handle_update_password.php'; ?>

