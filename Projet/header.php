<header>
    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <h1 class="text-center mt-3 mb-4" id='top'>Mythologie Grecque</h1>
            </div>
        </div>
        <div class="row sticky-top">
            <div class="btn-group mb-4 ">
                <?php
                    if (!empty($_SESSION['user'])) {
                        echo "<a href='index.php' class='btn btn-outline-light mx auto'>Accueil</a>";
                        echo "<a href='creer_article.php' class='btn btn-outline-light mx-auto'>Créer un article</a> ";
                        echo "<a href='se_deconnecter.php' class='btn btn-outline-light mx-auto'>Déconnexion</a> ";
                    }

                    if (empty($_SESSION['user'])) {
                        echo "<a href='se_connecter.php' class='btn btn-outline-light'>Connexion</a>";
                    }
                ?>
            </div>
        </div>
    </div>
</header>
