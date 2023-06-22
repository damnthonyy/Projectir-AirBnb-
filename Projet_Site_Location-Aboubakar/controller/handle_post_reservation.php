<?php

use src\Factory\Sql;

 session_start(); 


try {
    require './vendor/autoload.php';
    

    $bdd = (new Sql())->getPdo();
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

$annonceQuery = $bdd->query("SELECT * FROM annonces");
$annonces = $annonceQuery->fetchAll(PDO::FETCH_ASSOC);

if (!$annonces) {
    exit();
}
?>