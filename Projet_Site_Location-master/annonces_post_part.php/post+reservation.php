<?php 
session_start();
require_once("../function.php");

try {
    $bdd = (new Sql())->getPdo();
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

  
if(!empty($_POST['search'])){
    $annonceQuery = $bdd->prepare("SELECT * FROM `annonces` WHERE region = :region");
  $annonceQuery->execute(array(':region'=> $_POST['search']));

}else{
   header("location:index.php");
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
<h1>Votre résultats</h1>
    <?php if ($annonceQuery->rowCount() > 0) {
        while ($annonce = $annonceQuery->fetch(mode: PDO::FETCH_ASSOC)){ ?>
        <div class="post_container">
            <h2><?php echo $annonce['title']; ?></h2>
            <p>Ville : <?php echo $annonce['region']; ?></p>
            <img src="dossier_images/<?php echo $annonce['images3']; ?>" alt="Image annonce">
            <p>Prix : <?php echo $annonce['prices']; ?> €</p>
            <p>Nombre de place : <?php echo $annonce['places']; ?></p>
            <form action="reservation_page.php" method="post">
                <button type="submit" name="id" value="<?= $annonce['id']?>" >Voir plus</a>
                <input type="hidden" >
            </form>
            <form action="delete_annonce.php" method="post">
                <button name="id" value="<?= $annonce['id']?>">SUPPRIMER L'ANNONCE</button>
                
            </form>
        </div>
        <?};} else {echo "Aucun résultat trouvé pour cette recherche.";}
 ?>
    
</body>

</html>
