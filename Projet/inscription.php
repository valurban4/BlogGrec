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
    <title>Connexion</title>
</head>

<body>

    <?php
        include("function.php");
        include("requeteSql.php");
    ?>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-4 text-center">
                    <h1 class="text-center mb-4 mt-3">Inscription</h1>
                    <a href="se_connecter.php" class='btn btn-outline-light'>Retour connexion</a>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Pseudo: </label>
                        <input type="text" id="pseudo" name="pseudo" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">mot de passe: </label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password2" class="form-label">confirmer mot de passe: </label>
                        <input type="password" id="password2" name="password2" class="form-control" required>
                    </div>

                    <button type="submit" name="btn_inscription" class="btn btn-outline-dark">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>

    <hr>
    <div class="container">
        <h3 class="text-center mb-5">Mot de Passe: </h3>

        <?php
            if (isset($_POST['btn_inscription'])) {
                $valider = true;
                if ($_POST['password'] != $_POST['password2']) {
                    echo "<p>Les 2 mots de passe sont différents.</p>";
                    $valider = false;
                }

                if (!preg_match('/[a-z]/',$_POST['password'])) {
                    echo "<p>Il faut au moins une minuscule.</p>";
                    $valider = false;
                }

                if (!preg_match('/[A-Z]/',$_POST['password'])) {
                    echo "<p>Il faut au moins une majuscule.</p>";
                    $valider = false;
                }

                if (!preg_match('/[0-9]/',$_POST['password'])) {
                    echo "<p>Il faut au moins un chiffre.</p>";
                    $valider = false;
                }

                if (strlen($_POST['password']) < 12) {
                    echo "<p>Il faut au moins 12 caractères.</p>";
                    $valider = false;
                }
                
                if ($valider == true) {

                    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    requete_inscription();

                    echo "Inscription effectuée.";

                    header('Refresh: 1.5; se_connecter.php');
                }
            }
            
            if (!isset($_POST['password'])) {
                echo "<p class='text-center textContent'>Il faut au moins une minuscule.</p>";
                echo "<p class='text-center textContent'>Il faut au moins une majuscule.</p>";
                echo "<p class='text-center textContent'>Il faut au moins un chiffre.</p>";
                echo "<p class='text-center textContent'>Il faut au moins 12 caractères.</p>";
            }       
        ?>
    </div>
    
</body>

</html>