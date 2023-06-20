<?php session_start(); ?>

<?php
try {
   $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
} catch (PDOException $e) {
   die('Erreur : ' . $e->getMessage());
}

$annonceQuery = $bdd->query("SELECT * FROM annonces");
$annonces = $annonceQuery->fetchAll(PDO::FETCH_ASSOC);

if (!$annonces) {
   exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="home.css">
   <title>Home consisto-Paris</title>
</head>

<body>
   <section class="header">
      <header>
         <div class="logo">
            <img src="../subscribiton_part.php/subsription_part_images.php/Consisto-removebg-preview.png" alt="Logo">
         </div>
         <div class="reservations">
               <?php
               if (isset($_SESSION["username"])) {
                  $username = ucfirst($_SESSION["username"]);
                  echo "<a href='../profil_part/'><span class='sign-in'>" . $username . "</span></a>";
               } else {
                  echo "<span class='sign-in'><a href='../home/home_password.php'>Se connecter</a></span>";
               }
               ?>
         </div>
      </header>
      <div class="menu-items menu-above-video">
         <div class="menu-search "></div>
         <span class="icon">
            <ion-icon class="icn" name="close-outline"></ion-icon>
         </span>
         <?php
         if (isset($_SESSION["username"])) {
            $username = ucfirst($_SESSION["username"]);
            echo "<span class='sign-in'>" . $username . "</span>";
         } else {
            echo "<span class='sign-in'><a href='../subscribiton_part.php/index.php'>Se connecter</a></span>";
         }
         ?>
         <a href=""></a>
      </div>
   </section>
   <section class="video">
      <div class="video-section">
         <video class="video-background" autoplay loop muted>
            <source src="../home/dossier_images/aprt.mp4" type="video/mp4">
         </video>
         <div class="video-overlay"></div>
         <div class="mute-icon">
            <ion-icon class="high" name="volume-high-outline"></ion-icon>
            <ion-icon class="mute" name="volume-mute-outline"></ion-icon>
         </div>
         <div class="pause-icon">
            <ion-icon class="pause" name="pause-outline"></ion-icon>
            <ion-icon class="play" name="play-outline"></ion-icon>
         </div>
         <h1>CONSISTO PARIS</h1>
         <div class="search-bar">
            <div class="container">
               <form action="" method="post">
                  <div class="arrival">
                     <ion-icon name="calendar-outline"></ion-icon>
                     <input type="text" name="arrival" id="arrival" placeholder="Arrival">
                  </div>
                  <span></span>
                  <div class="depature">
                     <ion-icon name="calendar-outline"></ion-icon>
                     <input type="text" name="depature" id="depature" placeholder="Depature">
                  </div>
                  <span></span>
                  <div class="guest">
                     <ion-icon name="person-outline"></ion-icon>
                     <select name="Person" id="Person">
                        <option>Person</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                     </select>
                  </div>
                  <input type="submit" id="search" value="search">
               </form>
            </div>
            <div class="button">
               <button>
                  <ion-icon class="search" name="search-outline"></ion-icon>
                  <span>Trouve ton appartement</span>
               </button>
            </div>
         </div>
      </div>
   </section>
   <section class="annonces">
      <h1>Find a stay in our apartments and rooms</h1>
      <?php foreach ($annonces as $annonce) : ?>
         <div class="annonces_items">
            <div class="img" data-aos="fade-right">
               <a href="../reservation_part.php/reservation_page.php ?id=<?php echo $_SESSION['annonce_id'] = $annonce['id']; ?>"><img src="../annonces_post_part.php/dossier_images/<?php echo $annonce['images3']; ?>" alt=""></a>
            </div>
            <div class="description" data-aos="fade-up">
               <h1 data-aos="fade-up" data-aos-delay="50"><?php echo $annonce['title']; ?></h1>
               <h2 data-aos="fade-up" data-aos-delay="150"><?php echo $annonce['region']; ?></h2>
               <p data-aos="fade-up" data-aos-delay="100"><?php echo $annonce['prices']; ?> € par nuit</p>
               <a href="../reservation_part.php/reservation_page.php?id=<?php echo $_SESSION['annonce_id'] = $annonce['id']; ?>">Voir plus</a>
            </div>
         </div>
      <?php endforeach; ?>
      <div class="annonces_items">
         <div class="img" data-aos="fade-right">
            <img src="images/paris75.png" alt="">
         </div>
      </div>
      <hr>
   </section>
   <section class="guest_box">
      <h1>Be our guest</h1>
      <h2>Relax whilst our team takes care of the details.</h2>
      <div class="guest_items">
         <div class="img" data-aos="zoom-in-down">
            <div class="overlay" data-aos="zoom-in-down">
               <p>We prepare the home, villa or chalet with professional housekeeping, high quality linens & toiletries.</p>
            </div>
         </div>
         <p class="active">We prepare the home, villa or chalet with professional housekeeping, high quality linens & toiletries.</p>
         <div class="img_text">
            <div class="img_text_item noreverse">
               <div class="image" data-aos="fade-down-right" data-aos-delay="50">
               </div>
               <div class="text" data-aos="fade-down-left" data-aos-delay="150">
                  <p>We welcome you in person upon arrival.</p>
               </div>
            </div>
            <div class="img_text_item reverse">
               <div class="text" data-aos="fade-up-right" data-aos-delay="50">
                  <p>We are here for you around the clock.</p>
               </div>
               <div class="image" data-aos="fade-up-left" data-aos-delay="100">
                  <!-- <img src="	" alt=""> -->
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="footer" data-aos="fade-right" data-aos-anchor-placement="center-bottom">
      <footer>
         <ul>
            <h3 data-aos-delay="50" data-aos="fade-right">CONSISTO</h3>
            <br><br>
            <li data-aos-delay="100" data-aos="fade-right">A propos</li>
            <br>
            <li data-aos-delay="150" data-aos="fade-right">Carrières</li>
            <br>
            <li data-aos-delay="200" data-aos="fade-right">Application</li>
            <br>
            <li data-aos-delay="250" data-aos="fade-right">Media</li>
            <br>
            <li data-aos-delay="300" data-aos="fade-right">Inspirations</li>
            <br>
         </ul>
         <ul>
            <h3 data-aos-delay="350" data-aos="fade-right">CONTACT</h3>
            <br><br>
            <li data-aos-delay="400" data-aos="fade-right">Nous contacter</li>
            <br>
            <li data-aos-delay="450" data-aos="fade-right">Presse</li>
            <br>
            <li data-aos-delay="500" data-aos="fade-right">Devenez partenaire</li>
            <br>
         </ul>
         <ul>
            <h3 data-aos-delay="550" data-aos="fade-right">TERME ET CONDITIONS</h3>
            <br><br>
            <li data-aos-delay="600" data-aos="fade-right">Conditions générales</li>
            <br>
            <li data-aos-delay="650" data-aos="fade-right">Mentions légales</li>
            <br>
            <li data-aos-delay="700" data-aos="fade-right">Fonctionnalité du site</li>
            <br>
         </ul>
         <ul class="input">
            <h3 data-aos-delay="750" data-aos="fade-right">ABONNEZ-VOUS A NOTRE NEWSLETTER</h3>
            <br data-aos-delay="800" data-aos="fade-right"><br>
            <input data-aos-delay="850" data-aos="fade-right" type="text" placeholder="Email"><br><br>
            <button data-aos-delay="900" data-aos="fade-right" type="submit">JE M'ABONNE</button>
         </ul>
      </footer>
      <div class="logo">
         <img src="images/Logo.png" alt="">
      </div>
   </section>
   <script src="./home.js"></script>
   <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
   <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script>
      AOS.init();
   </script>
</body>

</html>

<?php

if (isset($_POST['log_out_button'])) {
   session_destroy();
   header("Location: ../home/home.php");
   exit();
}

?>