<?php include_once "header.php";?>

    <section>
        <img class="img" src="../service/img/premier maison.jpg" alt="">
        <h1>Taches à faire</h1>

        <?php
            echo "Bonjour ". $_SESSION['username'];
        ?>
        <div class="statut">
            <h2>Le 01/01/2023 - 07/07/2023</h2>
            <p>Statue : en cours</p>
        </div>
        <hr>

        <div class="adresse">
            <h3>Adresse</h3>
            <p>Amet Consecteur Adipiscing Elit Pellentesque</p>

            <div class="tache">
                <img src="../service/img/deuxieme maison.jpg" alt="maison adresse">
                <div class="listache">
                    <h5>Tache à faire</h5>
                    <ul>
                        <li>est ullamcorper eget nulla facilisi</li>
                        <li>habitant morbi tristique senectus</li>
                        <li>ac placerat vestibulum lectus mauris</li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>

        <div class="note">
            <h5>Note en cours</h5>
            <input type="text" >
            <div class="nte">
                <h5>Note</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Vitae suscipit tellus mauris a. Nec ullamcorper sit amet risus nullam eget felis. 
                    Tortor vitae purus faucibus ornare suspendisse sed nisi lacus sed. Nullam ac tortor 
                    vitae purus faucibus ornare suspendisse sed.
                </p>
            </div>
        </div>
        <button class="ok">Fait</button>
    </section>
<?php include_once "footer.php";?>