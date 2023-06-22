<?php require './controller/handle_view_reservation.php';?>

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
    <link rel="stylesheet" href="./style/reservation.css">
    <title>Home consisto-Paris</title>
</head>

<body>
    <?php if ($annonce) : ?>
        <section class="header">
            <header>
                <div class="logo">
                    <a href="http://localhost/Projet_Site_Location-Aboubakar/"><img src="./footer/Consisto-removebg-preview.png" alt="Logo"></a>
                </div>
                <?php
                if (isset($_SESSION["username"])) {
                    $username = ucfirst($_SESSION["username"]);
                    echo "<span class='sign-in'><a href='profil'>" . $username . "</a></span>";
                } else {
                    echo "<span class='sign-in'><a href='connexion'>Se connecter</a></span>";
                }
                ?>
                </div>
            </header>
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
        <section class="reservation">
            <div class="reservation_item">
                <div class="reserv_img">
                    <img src="../annonces_post_part.php/dossier_images/<?php echo $annonce['images3']; ?>" alt="Image de l'annonce">
                    <img src="../annonces_post_part.php/dossier_images/<?php echo $annonce['images2']; ?>" alt="Image de l'annonce">
                    <img src="../annonces_post_part.php/dossier_images/<?php echo $annonce['images1']; ?>" alt="Image de l'annonce">
                    <img src="../annonces_post_part.php/dossier_images/<?php echo $annonce['images4']; ?>" alt="Image de l'annonce">
                    <img src="../annonces_post_part.php/dossier_images/<?php echo $annonce['images5']; ?>" alt="Image de l'annonce">

                </div>

                <div class="reserv_info fixed">
                    <div class="info">
                        <h1><?php echo $annonce['title'] ?></h1>
                        <span class="price"><?php echo $_SESSION["price"] = $annonce['prices'] ?> € par nuit </span>
                        <form action="" method="post">
                            <input type="date" name="date_input"></input>
                            <button type="submit" name="reservation_ok">RESERVER</button>
                        </form>
                        <a href="#details">Details</a>
                    </div>
                </div>
            </div>
            <section id="details">
                <div class="details_item">
                    <div class="reservation_details">
                        <h3>Description de l'annonce : </h3>
                        <p><?php echo $annonce['summury'] ?></< /p>
                    </div>
                </div>
            </section>
        </section>
        <div class="reservation_details">
            <h2>Commentaires</h2>
            <form method="post">
                <input type="text" name="comment_content"><button name="comment_btn">Commentez</button>
                <?php
                $currentUsername = '';

                foreach ($user_comment as $comment) :
                    if ($comment['username'] != $currentUsername) :
                        $currentUsername = $comment['username'];
                        echo "<h2>$currentUsername</h2>";
                    endif;
                ?>
                    <ul>
                        <li><?php echo $comment['body']; ?></li>
                        <li><?php echo $comment['created_at']; ?></li>
                    </ul>
                <?php endforeach; ?>

            </form>
        </div>
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
            </footer>
            <div class="logo">
                <img src="images/Logo.png" alt="">
            </div>
        </section>
        <script src="./home.js"></script>
        <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="./index.js"></script>
    <?php endif; ?>
</body>

</html>

