<?php session_start(); ?>

<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', 'root');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

$annonce_id = $_GET['id'];
$annonce_query = $bdd->prepare("SELECT * FROM annonces WHERE id = :annonce_id");
$annonce_query->bindParam(':annonce_id', $annonce_id);
$annonce_query->execute();

$annonce = $annonce_query->fetch(PDO::FETCH_ASSOC);


if (!$annonce) {
    exit();
}


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
    <title>Home consisto-Paris</title>
</head>

<body>
    <?php if ($annonce) : ?>
        <section class="header">
            <header>
                <div class="menu-search">
                    <div class="menu">
                        <ion-icon class="icn" name="menu-outline"></ion-icon>
                        <span>Menu</span>
                    </div>
                    <div class="search">
                        <ion-icon name="heart-outline"></ion-icon>
                        <span>Mes favoris</span>
                    </div>
                </div>
                <div class="logo">
                    <img src="../subscribiton_part.php/subsription_part_images.php/Consisto-removebg-preview.png" alt="Logo">
                </div>
                <div class="reservations">
                    <div class="cart-icon">
                        <ion-icon name="bed-outline"></ion-icon>
                        <div class="cart-count">0</div>
                    </div>
                    <span class="reservation-btn"><a href="">Réservations</a></span>
                    <?php
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
                <hr>
                <span>Mes favoris</span>
                <hr>
                <span>Mes réservations</span>
                <hr>
                <span>Contact : +33 06-89-75-45-90</span>
                <hr>
                <span>Aide</span>
                <hr>
                <span>
                    <span>Sélectionnez votre devise</span><br>
                    <select class="form-control">
                        <option value="EUR">€EUR</option>
                        <option value="USD">$USD</option>
                    </select>
                </span>
            </div>
        </section>
        <style>
            html {
                scroll-behavior: smooth;
            }

            .reservation_item {
                display: flex;
            }

            .reservation .reserv_img {
                display: flex;
                flex-direction: column;
                width: 50%;
                position: relative;
            }

            .reservation .reserv_img img {
                height: 84vh;
            }

            .reserv_info {
                width: 50%;
                height: 84vh;
                display: flex;
                align-items: center;
                justify-content: center;
                position: sticky;
                top: 0;
                z-index: 1;
            }

            .reserv_info .info {
                display: flex;
                gap: 30px;
                flex-direction: column;
            }

            .reserv_info .info button {
                background: transparent;
                border: 1px solid;
                padding: 10px;
                transition: 0.5s;
                cursor: pointer;
            }

            .reserv_info .info button:hover {
                background: black;
                color: white;
            }

            .fav {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .reservation_details {
                padding: 50px 0px 20px 20px;
                width: 50%;
                display: flex;
                flex-direction: column;
                gap: 20px;
            }

            .reservation_details_item {
                width: 50%;
                display: flex;
                justify-content: space-between;
                padding: 20px 0px 50px 35px;
            }

            .location {
                padding: 0px 20px 30px 20px;
                display: flex;
                flex-direction: column;
                gap: 30px;
            }

            .location .map img {
                width: 100%;
                height: 90vh;
                object-fit: cover;
            }

            .footer {
                padding: 30px 30px;
            }

            footer {
                display: flex;
                gap: 30px;
                justify-content: space-between;
                flex-wrap: wrap;
                align-items: flex-start;
                padding: 0px 30px;
            }

            footer ul input {
                width: 90%;
                height: 30px;
                border-radius: 0px;
                border: 1px solid gray;
                padding: 2px 20px;
            }

            footer ul input:focus {
                outline: none;
            }

            footer ul button {
                width: 100%;
                height: 30px;
                border: none;
                background: #000000;
                color: white;
                padding: 0px 20px;
                cursor: pointer;
            }

            .footer .logo img {
                padding-left: 20px;
            }

            .search-bar {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, 150%);
                z-index: 1;
                background-color: rgba(255, 255, 255, 0.7);
            }

            .search-bar .container {
                width: 100%;
                margin: 0px auto;
                padding: 10px;
                background: white;
            }

            .button button {
                display: flex;
                justify-content: center;
                align-items: center;
                background: white;
                border: none;
                width: 300px;
                padding: 20px -21px;
                height: 40px;
                gap: 20px;
                cursor: pointer;
            }

            .search-bar form {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .search-bar form span {
                background: gray;
                width: 1px;
                height: 20px;
                margin-right: 20px;
            }

            .search-bar form input,
            select {
                border: none;
                text-align: center;
                cursor: pointer;
            }

            .search-bar form input:focus {
                outline: none;
            }

            .search-bar form select:focus {
                outline: none;
            }

            .search-bar .arrival,
            .depature,
            .guest {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .search-bar #Person {
                width: 150px;
                color: rgba(0, 0, 0, 0.6);
            }

            .search-bar #search {
                background: black;
                color: white;
                padding: 5px 20px;
            }

            .search-bar .button {
                display: none;
                cursor: pointer;
            }

            footer ul li {
                list-style: none;
            }

            @media (max-width: 768px) {
                .search-bar .container {
                    display: none;
                }

                .search-bar .button {
                    display: flex;
                }
            }

            @media screen and (max-width: 1200px) {
                .guest_items .img {
                    width: 90vw;
                    height: 50vh
                }
            }

            .no-overflow {
                overflow: hidden;
            }
        </style>
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
                        <span class="price"><?php echo $annonce['prices'] ?> € par nuit </span>
                        <form action="" method="post">
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

<?php
if (isset($_POST["reservation_ok"])) {
    $user_id = $_SESSION["user_id"];
    $annonce_id = $_GET['id'];
}
?>