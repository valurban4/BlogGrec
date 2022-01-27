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
    <link href="style.css" rel="stylesheet">
    <title>Créer un article</title>
</head>

<body>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-4 text-center">
                    <h1 class="text-center mb-4 mt-3">Créer un article</h1>
                    <?php
                        if ($_SESSION['id_role']==='1') {
                            echo "<a href='index.php' class='btn btn-outline-light'>Retour accueil</a>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </header>

<?php

if (isset($_SESSION['id_role'])) {
    if ($_SESSION['id_role']=='1'){
        echo "<p class='text-center mt-5 textContent'>Bienvenue dans l'espace de création d'article.</p>";
        echo "<p class='text-center mb-4 textContent'>Vous êtes connecté en tant que \"".$_SESSION['user']."\".</p>";
        ?>
        <div class="container">
            <form action="traitement_creer_article.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Titre: </label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Contenu: </label>
                    <textarea type="text" id="content" name="content" class="form-control" rows="3" minlength="100" required></textarea>
                </div>

                <div class="mb-3">
                    <input type="file" id="image" name="image" class="form-control" required>
                </div>

                <button type="submit" name="btn_creer" class="btn btn-outline-dark mb-5 mt-4">Créer l'article</button>
            </form>
        </div>
        <?php
         if (!empty($_GET["message_resultat"]))
         {
             $message = NULL;
             switch ($_GET["message_resultat"]) 
             {
                 case "existe":
                     $message = "Cet article existe déjà.";
                     break;
                 case "depasse":
                     $message = "Le fichier ne doit pas dépasser les 1 Mo";
                     break;
                 case "format":
                     $message = "Le fichier doit être un .jpg, un .jpeg ou un .png";
                     break;
                 case "depasseformat":
                     $message = "Le fichier ne doit pas dépasser les 1 Mo et le fichier doit être un .jpg, un .jpeg ou un .png";
                     break;
                 case "Erreur":
                     $message = "Erreur d'ajout dans la BDD.";
                     break;
                 case "Problème":
                     $message = "Problème  avec l'envoie.";
                     break;
                 case "OK":
                     $message = "Article créé avec succés !";
                     break;
                 default :
                     $message = "Une erreur imprévue est survenue";
             }
             echo "<p class='text-center textContent'>".$message."</p>";
         }
    } else {
        echo "<p class='text-center mt-5 textContent'>Vous ne posséder pas les autorisations nécessaire pour accéder à cette page.</p>";
        echo "<p class='text-center mb-4 textContent'>Vous allez être redirigé vers l'accueil.</p>";
        header('Refresh: 3; index.php');
    }
}
?>
</body>
</html>