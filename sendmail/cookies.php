<?php
session_start();

// Après une connexion réussie

setcookie('session_id', session_id(), time() + 3600, '/');

if (isset($_COOKIE['session_id']) && !empty($_COOKIE['session_id'])) {
    
    // Récupère les informations de session
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    
} else {

    // L'utilisateur n'est pas connecté
    //on le rédirige vers la page de connexion
    header("Location: ../sendmail/index.php");
    unset($_COOKIE);
    // setcookie('session_id', '', time()- 10 , '/');
}