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

        if (!empty($_SESSION['user'])) {
            header('location: index.php');
        }

        include("function.php");
        include("requeteSql.php");

    ?>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-4 text-center">
                    <h1 class="text-center mb-4 mt-3">Page de connexion</h1>
                    <a href="index.php" class='btn btn-outline-light'>Retour accueil</a>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="" method="POST" class="mb-5">
                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Pseudo</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox" name="check">
                        <label class="form-check-label" for="checkbox">Rester connecté</label>
                    </div>
                    <button type="submit" class="btn btn-outline-dark" name="btn_connexion">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
    
    <?php
        if (isset($_POST['btn_connexion'])) {
            $connexion = requete_connexion();
            if (!$connexion) {
                echo "Pseudo inexistant !";
            } else if ($_POST['pseudo'] == $connexion[0]->pseudo) {
                if (password_verify($_POST['password'], $connexion[0]->password)) {
                    echo "c'est OK !";
                    $_SESSION['user'] = $_POST['pseudo'];
                    $_SESSION['id_role']=$connexion[0]->id_role;
                    $_SESSION['id_user']=$connexion[0]->id_user;
                    if ($_POST['check']=="on") {
                        $_SESSION['check'] = "on";
                        setcookie('user', $_SESSION['user'],time() + 60 * 60,null,null,true,true);
                        setcookie('id_user', $_SESSION['id_user'],time() + 60 * 60,null,null,true,true);
                        setcookie('id_role', $_SESSION['id_role'],time() + 60 * 60,null,null,true,true);
                    }
                    header('location: index.php');
                } else {
                    echo "Mot de passe ou identifiant incorrect !";
                }
            }
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <a href="inscription.php" class="myLink">Vous n'êtes pas encore inscrit ?</a>
            </div>
        </div>
    </div>
    
</body>

</html>