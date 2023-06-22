<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/post.css">
    <title>Poster des annonces</title>
</head>

<body>
    <div class="annonces_form">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="Titre de l'annonce">Adresse de l'annonce</label>
            <input type="text" name="annonce_title" required>
            <label for="Région">Région</label>
            <input type="text" name="region" required>
            <label for="Prix de l'annonce">Prix de l'annonce</label>
            <input type="text" name="annonce_price" required>
            <label for="Nombre de place de l'annonce">Nombre de place de l'annonce</label>
            <input type="text" name="available_place" required>
            <label for="Descriptions de l'annonce">Description de l'annonce</label>
            <input type="text" name="annonce_resume" required>
            <label for="Photo du logement1">Photo du logement 1 (Cette image sera l'image dans l'annonce dans la page d'acceuille)</label>
            <input type="file" name="third_picture" required>
            <label for="Photo du logement2">Photo du logement 2</label>
            <input type="file" name="second_picture" required>
            <label for="Photo du logement3">Photo du logement 3</label>
            <input type="file" name="first_picture" required>
            <label for="Photo du logement3">Photo du logement 4</label>
            <input type="file" name="fourth_picture" required>
            <label for="Photo du logement3">Photo du logement 5</label>
            <input type="file" name="fifth_picture" required>
            <button name="post_button">Postez une annonce</button>
        </form>
    </div>
</body>

</html>

<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', 'root');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST["post_button"])) {
    $annonce = $_POST["annonce_title"];
    $price = $_POST["annonce_price"];
    $place = $_POST["available_place"];
    $resume = $_POST["annonce_resume"];
    $region = $_POST["region"];
    $first_pic = $_FILES["first_picture"]["name"];
    $second_pic = $_FILES["second_picture"]["name"];
    $third_pic = $_FILES["third_picture"]["name"];
    $fourth_picture = $_FILES['fourth_picture']["name"];
    $fifth_picture = $_FILES['fifth_picture']["name"];

    move_uploaded_file($_FILES["first_picture"]["tmp_name"], "dossier_images/" . $first_pic);
    move_uploaded_file($_FILES["second_picture"]["tmp_name"], "dossier_images/" . $second_pic);
    move_uploaded_file($_FILES["third_picture"]["tmp_name"], "dossier_images/" . $third_pic);
    move_uploaded_file($_FILES["fourth_picture"]["tmp_name"], "dossier_images/" . $fourth_picture);
    move_uploaded_file($_FILES["fifth_picture"]["tmp_name"], "dossier_images/" . $fifth_picture);

    $requete = $bdd->prepare('INSERT INTO annonces (title,prices, places, summury, images3, images2, images1, region, images4, images5) VALUES (:title, :prices, :places, :summury, :images3, :images2, :images1, :region, :images4, :images5)');
    $requete->execute([
        "title" => $annonce,
        "prices" => $price,
        "places" => $place,
        "summury" => $resume,
        "images1" => $first_pic,
        "images2" => $second_pic,
        "images3" => $third_pic,
        "region" => $region,
        "images4" => $fourth_picture,
        "images5" => $fifth_picture,
    ]);

    if ($requete) {
        echo '<script>alert("Votre annonce à été poster avec succés")</script>';
        header("Location: http://localhost/Projet_Air_BnB/home/home.php");
    } else {
        echo '<script>alert("Une erreur est survenue")</script>';
    }
}
?>