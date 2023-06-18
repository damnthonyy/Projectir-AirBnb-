<?php
require_once("/MAMP/htdocs/Projet_Site_Location-master/function.php");
try {
    $bdd = (new Sql)->getPdo();
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


$requete = $bdd->prepare('SELECT * FROM annonces WHERE id = :id');
$requete->execute([":id" => $_POST['id']]);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="reservation.css">
    <link rel="stylesheet" href="reservation_page.css">
    <title>Home consisto-Paris</title>
</head>

<body>
    <section class="header">
        <header>
            
            <div class="logo">
                <a href="http://localhost/Projet_Site_Location-master/"><img src="../subscribiton_part.php/subsription_part_images.php/Consisto-removebg-preview.png" alt="Logo"></a>
            </div>
            <div class="reservations">
                <div class="cart-icon">
                    <ion-icon name="bed-outline"></ion-icon>
                    <div class="cart-count">0</div>
                </div>
                <span class="reservation-btn"><a href="">Réservations</a></span>
                <?php
                session_start();
                if (isset($_SESSION["username"])) {
                    $username = ucfirst($_SESSION["username"]);
                    echo "<span class='sign-in'>" . $username . "</span>";
                } else {
                    echo "<span class='sign-in'><a href='http://localhost/Projet_Air_BnB/subscribiton_part.php/'>Se connecter</a></span>";
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
                echo "<span class='sign-in'><a href='http://localhost/Projet_Site_Location/subscribiton_part.php/'>Se connecter</a></span>";
            }
            ?>
       
        </div>
    </section>
 
    <script>
        const $reservInfo = document.querySelector('.reserv_info');

        window.addEventListener('scroll', function() {
            const $imagesContainer = document.querySelector('.reserv_img');
            const $scrollPosition = window.scrollY + window.innerHeight;
            const $imagesContainerBottom = $imagesContainer.offsetTop + $imagesContainer.offsetHeight;

            if ($scrollPosition >= $imagesContainerBottom) {
                $reservInfo.classList.remove('fixed');
            } else {
                $reservInfo.classList.add('fixed');
            }
        });
    </script>
    <? while($page_resa = $requete->fetch(mode: pdo::FETCH_ASSOC)){?>
    <section class="reservation">
        <div class="reservation_item">
            <div class="reserv_img">
                <img src="dossier_images/<?= $page_resa['images1']?>" alt="">
                <img src="dossier_images/<?= $page_resa['images2']?>" alt="">
                <img src="dossier_images/<?= $page_resa['images3']?>" alt="">
                <img src="dossier_images/<?= $page_resa['images4']?>" alt="">
                <img src="dossier_images/<?= $page_resa['images5']?>" alt="">
                
            </div>
            <div class="reserv_info fixed">
                <div class="info">
                    <span>Nouveau</span>
                    <h1><?= $page_resa['title']?></h1>
                    <div class="fav">
                        <span>Sauvegarder</span>
                        <ion-icon name="heart-outline"></ion-icon>
                    </div>
                    <span class="price"><?= $page_resa['prices']?> € par nuit</span>
                    <button type="submit">RSERVER</button>
                    <a href="#details">Details</a>
                </div>
            </div>
        </div>
        <section id="details">
            <div class="details_item">
                <div class="reservation_details">
                    <p><?= $page_resa['summury']?></p>
                    <span>Details</span>
                    <hr>
                </div>
                <div class="reservation_details_item">
                    <ul>
                        <li>Piscine</li>
                        <li>Cuisine</li>
                        <li>Wifi</li>
                        <li>Vue sur le parc</li>
                    </ul>
                    <ul>
                        <li>TV HD 80 , Netflix</li>
                        <li>Espace de travail</li>
                        <li>Vue sur le jardin</li>
                        <li>Livres et de quoi lire</li>
                    </ul>
                </div>
            </div>
            
        </section>
    </section>
    <section class="footer">
        <footer>
            <ul>
                <h3>CONSISTO</h3>
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
            <a href="http://localhost/Projet_Site_Location-master/"><img src="images/Logo.png" alt=""></a>
        </div>
    </section>
    <script src="./home.js"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./index.js"></script>
    <?};?>
</body>

</html>
