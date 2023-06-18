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
          <a href="http://localhost/Projet_Site_Location-master"><img src="../annonces_post_part.php/dossier_images/Consisto.png" alt="Logo"></a>
       </div>
       <div class="connexion">
           <span>se connecter</span>
       </div>
    </header>
 </section>
<div class="annonces_form">
        <form action="annoces_creator.php" method="POST" enctype="multipart/form-data">
            <label for="annonce_title">Titre de l'annonce</label>
            <input type="text" name="annonce_title" required>

            <label for="region">Région</label>
            <input type="text" name="region" required>

            <label for="annonce_price">Prix de l'annonce</label>
            <input type="number" name="annonce_price" required>

            <label for="available_place">Nombre de place de l'annonce</label>
            <input type="number" name="available_place" required>

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

