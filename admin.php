<?php
session_start();
$sql = new PDO("mysql:host=localhost:3306;dbname=airbnb","root","root");

$prepare = $sql->query("SELECT * FROM `users`");


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .liste{
            display: flex;
            justify-content: space-around;
            text-align: center;
        }
        .truc{
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav> 
<table class="table table-striped">
  <div class="liste">
      <p>utilisateur</p>
      <p>is_staf</p>
      <p>is_admin</p>
      <p>is_active</p>
  </div>
    
    <? while($user = $prepare -> fetch(mode: pdo::FETCH_ASSOC)){

        ?>
        <div class="truc" >
            <form action="delete.php" >
              <p><?= $user['username']?></p>
              <? $_SESSION['id'] = $user['id']?>
              <button>delete</button>
            </form>
            



            <form action="handle_admin.php" method="post">
                <input type="hidden" name="is_admin" value="<?= $user['is_admin']?>">
                <input type="hidden" name="id" value="<?= $user['id']?>">
                <p><?= $user['is_admin']?></p>
                <? if($user['is_admin'] == 0 ){?>
                <button type="submit"> is_admin</button>
                <?};?>
                <? if($user['is_admin'] == 1 ){?>
                <button type="submit"> not_admin</button>
                <?};?>
            </form>


            <form action="handle_staf.php" method="post">
            <input type="hidden" name="is_staf" value="<?= $user['is_staf']?>">
            <input type="hidden" name="id" value="<?= $user['id']?>">
            <p><?= $user['is_staf']?></p>

            <? if($user['is_staf'] == 0 ){?>
            <button type="submit"> is_staf</button>
            <?};?>

            <? if($user['is_staf'] == 1 ){?>
            <button type="submit"> not_staf</button>
            <?};?>
            </form>


            <form action="handle_active.php" method="post">
            <input type="hidden" name="is_active" value="<?= $user['is_active']?>">
            <input type="hidden" name="id" value="<?= $user['id']?>">
            <p><?= $user['is_active']?></p>

            <? if($user['is_active'] == 0 ){?>
            <button type="submit"> is_active</button>
            <?};?>

            <? if($user['is_active'] == 1 ){?>
            <button type="submit"> not_active</button>
            <?};?>
            </form>




            
        </div>
    <?};?>


  
  
</table>


    
</body>
</html>