<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', 'root');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

$users_id =  $_SESSION["user_id"];

$user_query = $bdd->prepare("SELECT * FROM users WHERE id = :users_id");
$user_query->bindParam(':users_id', $users_id);
$user_query->execute();
$users = $user_query->fetchAll(PDO::FETCH_ASSOC);


$reservations_query = $bdd->prepare("SELECT reservations.*, annonces.images3 FROM reservations INNER JOIN annonces ON reservations.annonces_id = annonces.id WHERE reservations.users_id = :users_id");
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
    <link rel="stylesheet" href="./index.css">
    <title>Document</title>
</head>

<body>
    <?php foreach ($users as $user) : ?>
        <h1>Informations de l'utilisateur</h1>
        <form action="./update_user.php" method="post">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" name="username" value="<?php echo $user['username']; ?>">
            <button type="submit" name="update_btn">Mettre à jour</button>
            <label for="username">Adresse E-mail :</label>
            <input type="text" name="mail" value="<?php echo $user['mail']; ?>">
            <button type="submit" name="update_btn">Mettre à jour</button>
            <label for="username">Date de naissance (Exemple : 2004-11-19) :</label>
            <input type="text" name="birthdate" value="<?php echo $user['birthdate']; ?>">
            <button type="date" name="update_btn">Mettre à jour</button>
        </form>
        <form action="" method="post">
            <button name="log_out_button">Se Déconnecter</button>
        </form>
        <h1>Réservations de l'utilisateur</h1>

        <?php foreach ($reservations as $reservation) : ?>
            <?php $reservation_annonce_id = $reservation['annonces_id']; ?>
            <?php $reservation_annonce_image = $reservation['images3']; ?>
            <?php $reservation_id = $reservation['id'] ?>

            <?php $reservationQuery = $bdd->prepare("SELECT * FROM annonces WHERE id = :annonce_id");
            $reservationQuery->bindParam(':annonce_id', $reservation_annonce_id);
            $reservationQuery->execute();
            $reservation_annonce = $reservationQuery->fetch(PDO::FETCH_ASSOC); ?>

            <?php if ($reservation_annonce) : ?>
                <form action="./index.php" method="post">
                    <div class="reservation">
                        <div class="img">
                            <img src="../annonces_post_part.php/dossier_images/<?php echo $reservation_annonce_image; ?>" alt="">
                            <p>Date de réservation: <?php echo $reservation['annonces_date']; ?></p>
                            <button name="remove_btn">Annuler la réservation</button>
                        </div>
                </form>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

    <?php endforeach; ?>
</body>

</html>

<?php
if (isset($_POST['remove_btn'])) {

    $reservation_id;

    $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', 'root');
    $delete_reservation = $bdd->prepare('DELETE FROM reservations WHERE id = :reservation_id ');
    $delete_reservation->bindValue(':reservation_id', $reservation_id);
    $delete_reservation->execute();

    echo "<script>alert('Votre réservation a été annuler');</script>";
}

if (isset($_POST['log_out_button'])) {
    session_destroy();
    header("Location: ../home/home.php"); 
    exit();
}

?>

<a href="../home/home.php"></a>