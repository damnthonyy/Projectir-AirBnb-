

<?php
require_once("../function.php");
try {
    $bdd = (new Sql())-> getPdo();
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


    // Déplacer les fichiers téléchargés vers un dossier sur le serveur
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
        header("location:http://localhost/Projet_Site_Location-master");
    } else {
        
        header("location:index.php");
    }
}
?>