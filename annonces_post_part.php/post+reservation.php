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
    <?php foreach ($annonces as $annonce): ?>
        <div class="post_container">
        <h2><?php echo $annonce['title']?></h2>
        <p>Ville : <?php echo $annonce['region']; ?></p>
        <div class="img"></div>
        <input type='hidden' name='id' value="<?php echo $annonce['id']?>">
        <a href="./reservation_page.php"><img src="dossier_images/<?php echo $annonce['images3']; ?>" alt="Image annonce"></a>
        <p>Prix : <?php echo $annonce['prices']; ?> €</p>
        <p>Nombre de place :  <?php echo $annonce['places']; ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>
