<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', 'root');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

$user_query = $bdd->query("SELECT * FROM users WHERE id = 14");
$users = $user_query->fetchAll(PDO::FETCH_ASSOC);

$users_id =  $_SESSION["user_id"];

$reservations_query = $bdd->prepare("SELECT * FROM reservations WHERE users_id = :users_id");
$reservations_query->bindParam(':users_id', $users_id);
$reservations_query->execute();
$reservations = $reservations_query->fetchAll(PDO::FETCH_ASSOC);

$annonce_id = $_SESSION['annonce_id'];

$annonceQuery = $bdd->prepare("SELECT * FROM annonces WHERE id = :annonce_id");
$annonceQuery->bindParam(':annonce_id', $annonce_id);
$annonceQuery->execute();
$annonce = $annonceQuery->fetch(PDO::FETCH_ASSOC);

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
        <h1>Informations de l'utilisateur</h1>
        <p><?php echo $user['mail']; ?></p>
        <p><?php echo $user['username']; ?></p>
        <p><?php echo $user['users_password']; ?></p>
        <p><?php echo $user['birthdate']; ?></p>
        <p><?php echo $user['created_at']; ?></p>

        <h1>Réservations de l'utilisateur</h1>

        <?php if ($annonce) : ?>
            <img src="../annonces_post_part.php/dossier_images/<?php echo $annonce['images3']; ?>" alt="">
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Annonce ID</th>
                    <th>Date de réservation</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation) : ?>
                    <?php $reservation_annonce_id = $reservation['annonces_id']; ?>
                    <?php $reservationQuery = $bdd->prepare("SELECT * FROM annonces WHERE id = :annonce_id");
                    $reservationQuery->bindParam(':annonce_id', $reservation_annonce_id);
                    $reservationQuery->execute();
                    $reservation_annonce = $reservationQuery->fetch(PDO::FETCH_ASSOC); ?>

                    <?php if ($reservation_annonce) : ?>
                        <tr>
                            <td><?php echo $reservation_annonce['id']; ?></td>
                            <td><?php echo $reservation['annonces_date']; ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endforeach; ?>
</body>

</html>
