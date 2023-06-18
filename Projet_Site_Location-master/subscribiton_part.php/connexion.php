<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.cdnfonts.com/css/audrey" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="logo">
        <a href="http://localhost/Projet_Site_Location-master"><img src="./subsription_part_images.php/Consisto-removebg-preview.png" alt=""></a>
    </div>
    <div class="form_container">
        <div class="form_login">
            <div class="left_side">
                <h3>DÉJÀ INSCRIT(E) ?</h3>
                <p>Si vous êtes déjà inscrit(e) chez blabla, veuillez vous connecter ici :</p>
                <?if(isset($_GET['error'])==1){?>
                    <div class="wrong">
                        <ion-icon name="close-circle-sharp"></ion-icon><span style="padding-left: 10px;color:red">Mauvais mots de passe ou email</span>
                    </div>
                <?};?>
                <form action="password.php" method="post">
                    <div class="log_in_input">
                        <input type="text" placeholder="Adresse email *" name="log_in_email">
                        <input type="password" placeholder="Mot de passe *" name="log_in_password">
                        <button class="log_in_button" name="log_in_button">CONNEXION</button>
                    </div>
                </form>
                <p> <a href="./update_password.php"> Vous avez oublié votre mot de passe ?</a></p>
                </p>
            </div>
        </div>
        <div class="form_sign_in">
            <div class="right_side">
                <h3>CRÉEZ VOTRE COMPTE</h3>
                <p>Inscrivez-vous et profitez de nos appartements.</p>
                <div class="sign_in_input">
                    <form action="handle_inscription.php" class="sign_in_form" method="POST">
                        <input type="text" placeholder="Adresse email *" name="email">
                        <input type="password" placeholder="Mot de passe *" name="password">
                        <input type="text" placeholder="Nom d'utilisateur" name="username">
                        <div class="radio" name='gender'>
                            <label for="homme">Homme</label>
                            <input type="radio" placeholder="" name="gender" value="male">
                            <label for="homme">Femme</label>
                            <input type="radio" placeholder="" name="gender" value="female">
                            <label for="non précisé">Non Précisé</label>
                            <input type="radio" placeholder="" name="gender" value="other">
                        </div>
                        <input type="date" name="birthdate">
                </div>
                <button class="sign_in_button" name="sign_in_ok">S'INSCRIRE</button>
                </form>
                <!-- <p class="or">OU</p>
                <button class="Google">Continuer avec Google</button>
                <button class="Twitter">Continuer avec Twitter</button> -->
            </div>
        </div>
    </div>
</body>

</html>



<script src="./script.js"></script>