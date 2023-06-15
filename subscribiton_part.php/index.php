<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.cdnfonts.com/css/audrey" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="logo">
        <img src="./subsription_part_images.php/Consisto-removebg-preview.png" alt="">
    </div>
    <div class="form_container">
        <div class="form_login">
            <div class="left_side">
                <h3>DÉJÀ INSCRIT(E) ?</h3>
                <p>Si vous êtes déjà inscrit(e) chez blabla, veuillez vous connecter ici :</p>
                <form action="password.php" method="POST">
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
                    <form action="" class="sign_in_form" method="POST">
                        <input type="text" placeholder="Adresse email *" name="email">
                        <input type="password" placeholder="Mot de passe *" name="password">
                        <input type="text" placeholder="Nom d'utilisateur" name="username">
                        <div class="radio">
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
            </div>
        </div>
    </div>
</body>

</html>

<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', 'root');
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
?>


<script src="./script.js"></script>