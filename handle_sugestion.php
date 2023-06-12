<?php 


$sql = new PDO("mysql:host=localhost:3306;dbname=airbnb","root","root");
  

if(!empty($_POST['search'])){
  $prepare = $sql->prepare("SELECT * FROM `annonces` WHERE ville = :ville");
  $prepare->execute(array(':ville'=> $_POST['search']));

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
         <p><?=$result['ville']?></p>
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

       <?
       
      };} else {
    echo "Aucun résultat trouvé pour cette recherche.";
}
   ?>
</body>
</html>