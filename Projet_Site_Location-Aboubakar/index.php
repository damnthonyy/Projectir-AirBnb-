<?php


  $url = '';
  if(isset($_GET['url'])) {
      $url = explode('/', $_GET['url']);
  }


    switch ( $url[0] ?? ""){

    case null:
        require "./view/home.php";
        break;
    case 'connexion':
        require './view/home_password.php'; 
    
        break;

    case 'profil';
        require './view/profil.php';
        break;

    case 'reservation';
        require './view/reservation_page.php';
        break;
    case 'post';
        require './view/post.php';
        break;
    case 'error';
        require './view/home_pasword_wrong.php';
        break;
    case 'delete_reservation';
        require './view/post_reservation.php';
        break;
    case 'fails';
        require './view/update_fail.php';
        break;
    case 'update_password';
        require './view/update_password.php';
        break;
    default:
    

    echo "erreur 404";
    break;
}

