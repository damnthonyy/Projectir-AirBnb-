<?php session_start(); ?>
<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', 'root');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

$user_query = $bdd->query("SELECT * FROM users WHERE id = 14");
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
        <?php echo $user['mail'] ?>
        <?php echo $user['username'] ?>
        <?php echo $user['users_password'] ?>
        <?php echo $user['birthdate'] ?>
        <?php echo $user['created_at'] ?>
</body>
<? endforeach; ?>

</html>

<?php

?>