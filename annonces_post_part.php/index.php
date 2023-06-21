<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../annonces_post_part.php/index.css">
    <title>Poster des annonces</title>
</head>

<body>
<section class="header">
    <header>
       <div class="logo">
          <img src="../annonces_post_part.php/dossier_images/Consisto.png" alt="Logo">
       </div>
       <div class="connexion">
           <span>se connecter</span>
       </div>
    </header>
 </section>
<div class="annonces_form">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="annonce_title">Titre de l'annonce</label>
            <input type="text" name="annonce_title" required>

            <label for="region">Région</label>
            <input type="text" name="region" required>

            <label for="annonce_price">Prix de l'annonce</label>
            <input type="text" name="annonce_price" required>

            <label for="available_place">Nombre de place de l'annonce</label>
            <input type="text" name="available_place" required>

            <label for="annonce_resume">Description de l'annonce</label>
            <input type="text" name="annonce_resume" required>

            <label for="third_picture">Photo du logement 1</label>
            <input type="file" name="third_picture" required>

            <label for="second_picture">Photo du logement 2</label>
            <input type="file" name="second_picture" required>

            <label for="first_picture">Photo du logement 3</label>
            <input type="file" name="first_picture" required>

            <label for="fourth_picture">Photo du logement 4</label>
            <input type="file" name="fourth_picture" required>

            <label for="fifth_picture">Photo du logement 5</label>
            <input type="file" name="fifth_picture" required>

            <button name="post_button">Postez une annonce</button>
        </form>
    </div>
    <section class="footer" data-aos="fade-right"
      data-aos-anchor-placement="center-bottom">
         <footer>
            <ul>
               <h>CONSISTO</h3>
               <br><br>
               <li>A propos</li>
               <br>
               <li>Carrières</li>
               <br>
               <li>Application</li>
               <br>
               <li>Media</li>
               <br>
               <li>Inspirations</li>
               <br>
            </ul>
            <ul>
               <h3>CONTACT</h3>
               <br><br>
               <li>Nous contacter</li>
               <br>
               <li>Presse</li>
               <br>
               <li>Devenez partenaire</li>
               <br>
            </ul>
            <ul>
               <h3>TERME ET CONDITIONS</h3>
               <br><br>
               <li>Conditions générales</li>
               <br>
               <li>Mentions légales</li>
               <br>
               <li>Fonctionnalité du site</li>
               <br>
            </ul>
            <ul class="input">
               <h3>ABONNEZ-VOUS A NOTRE NEWSLETTER</h3>
               <br><br>
               <input type="text" placeholder="Email"><br><br>
               <button type="submit">JE M'ABONNE</button>
            </ul>
         </footer>
         <div class="logo">
            <img src="images/Logo.png" alt="">
         </div>
      </section>
</body>

</html>

<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
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
    } else {
        echo '<script>alert("Une erreur est survenue")</script>';
    }
}
?>