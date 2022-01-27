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
    <title>Confirmation</title>
</head>
<body>

    <?php

        include ('function.php');
        include ('requeteSql.php');

        if ((!isset($_GET['nom'])) && (!isset($_GET['supprimer_article'])) && (!isset($_GET['annuler']))) {
             header ('location: index.php');
        }

        if (isset($_GET['nom'])) {

    ?>

    <div class="container">
        <form action="" method="GET" class="form-group text-center">
            <h2 class="text-center mb-5 mt-5">Voulez vous vraiment supprimer l'article <?= htmlspecialchars($_GET['nom']) ?> ?</h2>
            <button class="btn btn-danger mx-auto" name="supprimer_article" value="<?= $_GET['nom'] ?>" id="supprBtn">SUPPRIMER</button>
            <button type="submit" class="btn btn-outline-success mx-auto" name="annuler" value="test" id="annuler">ANNULER</button>
        </form>
    </div>

    <?php

        }

        if (isset($_GET['annuler'])) {
            echo "<h1 class='text-center'>Suppression annulée</h1>";
            echo "<p class='text-center'>Vous allez être redirigé vers la page d'accueil.</p>";
            header('Refresh: 3; index.php');
        }

        if (isset($_GET['supprimer_article'])) {
            requete_supprimer_article();
            echo "<h1 class='text-center mt-5'>Suppression effectuée.</h1>";  
        }

    ?>

    <div class="container text-center mt-3">
        <a href='index.php' class='btn btn-outline-dark'>Retour accueil</a>
    </div>

</body>
</html>