<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>Article</title>
</head>
<body>
<?php include("header.php"); ?>
    <div class="container mb-3">
    
        <div class="row">
            <div class="col-md-12 mb-5">
                    <?php

                        include ("function.php");
                        include ("requeteSql.php");

                        $data = requete_lire_article_title_get();
                        $user = requete_lire_user($data[0]->id_user);

                        echo "<h1 class='text-center mt-3'>".htmlspecialchars($data[0]->title)."</h1>";
                       
                        if (isset($_SESSION['id_role'])) {
                            if ($_SESSION['id_role']=='1') {

                    ?>

                        <a href="confirmer_supprimer.php?nom=<?= htmlspecialchars($data[0]->title) ?>"><span class="material-icons" name="<?= htmlspecialchars($data[0]->title) ?>">highlight_off</span></a>

                    <?php

                            }
                        }

                    ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <img src="images/<?= $data[0]->image ?>" class="w-75">
            </div>
            <div class="col-md-4">
                <?php
                    echo "<p class='mb-5 textContent'>".htmlspecialchars($data[0]->content)."</p>";
                    echo "<p class='text-center textAuthor pb-4 border-bottom'>Article mis en ligne par ".htmlspecialchars(ucfirst($user[0]->pseudo)).", le ".date('d-m-Y H:i:s',strtotime($data[0]->time)).".</p>";
                    // var_dump($_GET);
                ?>
                    <form action="traitement_comment" method="post">
                        <h5>Écrivez un commentaire !</h5>
                        <input type="text" placeholder="Écrivez...">
                        <button type="submit">Poster</button>
                    </form>


                <a href="index.php" class='btn btn-outline-dark mt-5'>Retour accueil</a>
            </div>
        </div>
    </div>

</body>
</html>