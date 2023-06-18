<?php
session_start();
require('../function.php');
$sql = (new Sql())->getPdo();


$prepare = $sql->query("SELECT * FROM `users`");


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    

<section class="header">
         <header>
            
            <div class="logo">
              <a href="http://localhost/Projet_Site_Location-master/"><img src="/Projet_Site_Location-master/images/Logo.png" alt="Logo"></a> 
            </div>
            <div class="reservations">
         
               
                <?php
                
                if (isset($_SESSION["username"])) {
                    $username = ucfirst($_SESSION["username"]);
                    echo "<span class='sign-in'><a href='/Projet_Site_Location-master/profil_part/index.php'>" . $username . "</a></span>";
                } else {
                    echo "<span class='sign-in'><a href='subscribiton_part.php/connexion.php'>Se connecter</a></span>";
                }
            ?>
            </div>
         </header>
         <div class="menu-items menu-above-video">
            <div class="menu-search "></div>
            <span class="icon">
               <ion-icon class="icn" name="close-outline"></ion-icon>
            </span>
            <?php
    if (isset($_SESSION["username"])) {   
        $username = ucfirst($_SESSION["username"]);
        echo "<span class='sign-in'><input>" . $username . "</input></span>";
    } else {
        echo "<span class='sign-in'><a href='subscribiton_part.php/connexion.php'>Se connecter</a></span>";
    }
?>

<?php if($_SESSION['is_admin'] ==1){?>
            
         </div>
      </section>

    <div class="banner">
        <img src="./image/banner.jpg" alt="banner">
        <h1>Admin</h1>
    </div>
  <div class="liste">
      <h2>Utilisateur</h2>
      <h2>Admin</h2>
      <h2>Staf</h2>
      <h2>Active</h2>
  </div>
    
    <? while($user = $prepare -> fetch(mode: pdo::FETCH_ASSOC)){

        ?>
        <div classe="table">
            <ul>
                <li class="user">
                    <form action="handle_delete_user.php" method="post">
                      <p><?= $user['username']?></p>
                      <? $_SESSION['id'] = $user['id']?>
                      <button>delete</button>
                    </form>
                    
                </li>
                <li class="is_admin">
                    <form action="handle_admin.php" method="post">
                        <input type="hidden" name="is_admin" value="<?= $user['is_admin']?>">
                        <input type="hidden" name="id" value="<?= $user['id']?>">
                        <p><?= $user['is_admin']?></p>
                        <? if($user['is_admin'] == 0 ){?>
                        <button type="submit"> On</button>
                        <?};?>
                        <? if($user['is_admin'] == 1 ){?>
                        <button type="submit"> Off</button>
                        <?};?>
                    </form>
                </li>
                <li class="is_staf">
                    <form action="handle_staf.php" method="post">
                    <input type="hidden" name="is_staf" value="<?= $user['is_staf']?>">
                    <input type="hidden" name="id" value="<?= $user['id']?>">
                    <p><?= $user['is_staf']?></p>
                    <? if($user['is_staf'] == 0 ){?>
                    <button type="submit"> On</button>
                    <?};?>
                    <? if($user['is_staf'] == 1 ){?>
                    <button type="submit"> Off</button>
                    <?};?>
                    </form>
                </li>
                <li class="is_active">
                    <form action="handle_active.php" method="post">
                    <input type="hidden" name="is_active" value="<?= $user['is_active']?>">
                    <input type="hidden" name="id" value="<?= $user['id']?>">
                    <p><?= $user['is_active']?></p>
                    <? if($user['is_active'] == 0 ){?>
                    <button type="submit"> On</button>
                    <?};?>
                    <? if($user['is_active'] == 1 ){?>
                    <button type="submit"> Off</button>
                    <?};?>
                    </form>
                </li>
                
            </ul>
        </div>
    <?};?>


<?php } else{ echo("Vous n'avez pas l'autorisation de voir se page");
};?>
    
</body>
</html>