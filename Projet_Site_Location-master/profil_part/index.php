<?php
session_start();
require_once('../function.php');


try {
    $bdd = (new Sql())->getPdo();
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

$user_query = $bdd->query("SELECT * FROM users WHERE id = ". $_SESSION["user_id"]);
$users = $user_query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach ($users as $user) : ?>
       <p> <?php echo $user['mail']; ?> </p>
        <p><?php echo $user['username']; ?></p>
       
        <p><?php echo $user['birthdate']; ?></p>
        
    <?php endforeach; ?>
</body>
</html>