<?php require './controller/handle_post_reservation.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <title>Liste des annonces</title>
</head>

<body>
    <?php foreach ($annonces as $annonce) : ?>
        <div class="post_container">
            <h2><?php echo $annonce['title']; ?></h2>
            <p>Ville : <?php echo $annonce['region']; ?></p>
            <img src="./annonces_post_part.php/dossier_images/<?php echo $annonce['images3']; ?>" alt="Image annonce">
            <p>Prix : <?php echo $annonce['prices']; ?> €</p>
            <p>Nombre de place : <?php echo $annonce['places']; ?></p>
            <a href="http://localhost/Projet_Air_BnB/reservation_part.php/reservation_page.php?id=<?php echo $_SESSION['annonce_id'] = $annonce['id']; ?>">Voir plus</a>
            <form action="./controller/delete_annonce.php" method="post">
            <button name="delete_btn" >SUPPRIMER L'ANNONCE</button>
            </form>
        </div>
    <?php endforeach; ?>
</body>

</html>
