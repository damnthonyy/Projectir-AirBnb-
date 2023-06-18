<?php
session_start();

// Après une connexion réussie

$_SESSION['username'];
setcookie('session_id', session_id(), time() + 60, '/');

if (isset($_COOKIE['session_id']) && !empty($_COOKIE['session_id'])) {
    // session_id($_COOKIE['session_id']);
    // Récupère les informations de session
    // $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    // Autres traitements...
} else {
    // L'utilisateur n'est pas connecté
    header("Location: ../sendmail/index.php");
}


