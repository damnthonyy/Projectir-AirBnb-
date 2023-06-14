<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./publication.css">
  <title>Document</title>
</head>
<body>
  <section class="header">
    <header>
       <div class="menu-search">
          <div class="menu">
             <ion-icon class="icn" name="menu-outline"></ion-icon>
             <span>Menu</span>
          </div>
          <div class="search">
             <ion-icon name="heart-outline"></ion-icon>
             <span>Mes favoris</span>
          </div>
       </div>
       <div class="logo">
          <img src="images/Logo.png" alt="Logo">
       </div>
       <div class="reservations">
          <div class="cart-icon">
             <ion-icon name="bed-outline"></ion-icon>
             <div class="cart-count">0</div>
          </div>
          <span class="reservation-btn"><a href="">Réservations</a></span>
           <span>se connecter</span>
       </div>
    </header>
    <div class="menu-items menu-above-video">
       <div class="menu-search "></div>
       <span class="icon">
          <ion-icon class="icn" name="close-outline"></ion-icon>
       </span>
       <span>se connecter</span>
       <hr>
       <span>Mes favoris</span>
       <hr>
       <span>Mes réservations</span>
       <hr>
       <span>Contact : +33 06-89-75-45-90</span>
       <hr>
       <span>Aide</span>
       <hr>
       <span>
          <span>Sélectionnez votre devise</span><br>
          <select class="form-control">
             <option value="EUR">€EUR</option>
             <option value="USD">$USD</option>
          </select>
       </span>
    </div>
 </section>
  <div class="annonces_form">
    <form action="">
      <div class="annonce_page">
        <div class="page active fade-in" data-aos="fade-up" data-aos-delay="300">
          <label for="Titre de l'annonce">Titre de l'annonce<br>(type:appartement)</label>
          <input type="text" name="annonce_title" value="">
        </div>
        <div class="page fade-in" data-aos="fade-up" data-aos-delay="300">
          <label for="Adresse de l'annonce">Adresse de l'annonce</label>
          <input type="text" name="address" value="">
        </div>
        <div class="page fade-in" data-aos="fade-up" data-aos-delay="300">
          <label for="Prix de l'annonce">Prix de l'annonce(par nuit)</label>
          <input type="text" name="annonce_price" value="">
        </div>
        <div class="page fade-in" data-aos="fade-up" data-aos-delay="300">
          <label for="Nombre de place de l'annonce">Nombre de place de l'annonce</label>
          <input type="text" name="available_place" value="">
        </div>
        <div class="page fade-in" data-aos="fade-up" data-aos-delay="300">
          <label for="Description de l'annonce">Description du logement</label>
          <input type="text" name="annonce_resume" value="">
        </div>
        <div class="page fade-in" data-aos="fade-up" data-aos-delay="300">
          <div class="container">
            <label for="Photo du logement1">Photo du logement 1</label>
            <input type="file" style="display: none;" name="first_picture" id="file" accept="image/*" hidden>
            <div class="img-area" data-img="hello.png">
              <ion-icon class="icon" name="images-outline"></ion-icon>
              <h3>Choisissez une image</h3>
            </div>
            <button class="select-image">Choisissez depuis votre appareil</button>
          </div>
        </div>
        <div class="page fade-in" data-aos="fade-up" data-aos-delay="300">
          <div class="container">
            <label for="Photo du logement2">Photo du logement 2</label>
            <input type="file" style="display: none;" name="second_picture" id="file" accept="image/*" hidden>
            <div class="img-area" data-img="hello.png">
              <ion-icon class="icon" name="images-outline"></ion-icon>
              <h3>Choisissez une image</h3>
            </div>
            <button class="select-image">Choisissez depuis votre appareil</button>
          </div>
        </div>
        <div class="page fade-in" data-aos="fade-up" data-aos-delay="300">
          <div class="container">
            <label for="Photo du logement3">Photo du logement 3</label>
            <input type="file" style="display: none;" name="third_picture" id="file" accept="image/*" hidden>
            <div class="img-area" data-img="hello.png">
              <ion-icon class="icon" name="images-outline"></ion-icon>
              <h3>Choisissez une image</h3>
            </div>
            <button class="select-image">Choisissez depuis votre appareil</button>
          </div>
        </div>
        <div class="page fade-in" data-aos="fade-up" data-aos-delay="300">
          <div class="container">
            <label for="Photo du logement4">Photo du logement 4</label>
            <input type="file" style="display: none;" name="fourth_picture" id="file" accept="image/*" hidden>
            <div class="img-area" data-img="hello.png">
              <ion-icon class="icon" name="images-outline"></ion-icon>
              <h3>Choisissez une image</h3>
            </div>
            <button class="select-image">Choisissez depuis votre appareil</button>
          </div>
        </div>
        <div class="page fade-in" data-aos="fade-up" data-aos-delay="300">
          <div class="container">
            <label for="Photo du logement5">Photo du logement 5</label>
            <input type="file" style="display: none;" name="fifth_picture" id="file" accept="image/*" hidden>
            <div class="img-area" data-img="hello.png">
              <ion-icon class="icon" name="images-outline"></ion-icon>
              <h3>Choisissez une image</h3>
            </div>
            <button class="select-image">Choisissez depuis votre appareil</button>
          </div>
        </div>
        <div class="page fade-in" data-aos="fade-up" data-aos-delay="300">
          <h1>Terminez et publiez</h1>
        </div>
      </div>
      <div class="nextback">
        <a href="#" class="back-button" onclick="previousPage()">Retour</a>
        <button class="next-button" onclick="nextPage()">Suivant</button>
      </div>
    </form>
  </div>


  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="./publication.js"></script>
</body>
</html>