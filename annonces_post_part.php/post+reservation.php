<?php session_start(); ?>

<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', 'root');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <title>Liste des annonces</title>
</head>

<body>
    <?php foreach ($annonces as $annonce) : ?>
        <div class="post_container">
            <h2><?php echo $annonce['title']; ?></h2>
            <p>Ville : <?php echo $annonce['region']; ?></p>
            <img src="dossier_images/<?php echo $annonce['images3']; ?>" alt="Image annonce">
            <p>Prix : <?php echo $annonce['prices']; ?> €</p>
            <p>Nombre de place : <?php echo $annonce['places']; ?></p>
            <a href="http://localhost/Projet_Air_BnB/reservation_part.php/reservation_page.php?id=<?php echo $_SESSION['annonce_id'] = $annonce['id']; ?>">Voir plus</a>
            <form action="./delete_annonce.php" method="post">
            <button name="delete_btn" >SUPPRIMER L'ANNONCE</button>
            </form>
        </div>
    <?php endforeach; ?>
</body>

</html>
