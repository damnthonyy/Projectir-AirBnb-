<?php 
require_once("subscribiton_part.php/function.php");

$sql = (new Sql())->getPdo();
  

if(!empty($_POST['search'])){
  $prepare = $sql->prepare("SELECT * FROM `annonces` WHERE region = :region");
  $prepare->execute(array(':region'=> $_POST['search']));

}else{
   header("location:bdd.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <h1>Votre résultats</h1>
   
   <?    
      if ($prepare->rowCount() > 0) {
      while($result = $prepare->fetch(mode: pdo::FETCH_ASSOC)){
        ?>
         <h1>ville</h1>
         <p><?=$result['title']?></p>
         <h1> titre</h1>
         <p><?= $result['title']?></p>
         <h1>prix</h1>
         <p><?=$result['prices'] ?> €</p>
         <h1>place</h1>
         <p><?= $result['places'] ?></p>
         <h1>résumer</h1>
         <p><?= $result['summury'] ?></p>
         <h1>date de créartion du poste</h1>
         <p><?= $result['created_at']?></p> 
         <h1>image</h1>
         <td><img src="../annonces_post_part.php/dossier_images/<?php echo $result['images3']; ?>" alt=""></td>
       <?
       
      };} else {
    echo "Aucun résultat trouvé pour cette recherche.";
}
   ?>

   <script src="source.js"></script>
</body>
</html>