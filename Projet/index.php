<?php
        session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>Accueil</title>
</head>
<body>

    <?php

        if (!empty($_COOKIE['user'])) {
            $_SESSION['user'] = $_COOKIE['user'];
        }

        if (!empty($_COOKIE['id_user'])) {
            $_SESSION['id_user'] = $_COOKIE['id_user'];
        }

        if (!empty($_COOKIE['id_role'])) {
            $_SESSION['id_role'] = $_COOKIE['id_role'];
        }

        include ('header.php');
        include ('function.php');
        include ('requeteSql.php');
 
        $data = requete_lire_table_article();
         
        echo "<div class='text-center' id='titre-top'>";
        echo "<h1 class> Nos derniers articles</h1>";
        echo "</div>"; ?>
        
  <div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3></h3> <br><br><br><br>
      </div>

      <ul class="list-unstyled components">
        <p>Nos articles récents</p>
        <?php 
        foreach($data as $key => $valeur) {
          echo "<li class='active'>";
          echo "<a href='article_detail.php?name=".htmlspecialchars($valeur->title)."'>".htmlspecialchars($valeur->title)."</a>";
          echo "</li>";
        }

        
        
 ?>

    </nav>
    <?php
        echo "<div class='container'>";
        echo "<div class='row'>";
        echo "<div class='col-md-5 mx-auto'>";
        echo "<ul class='list-group-flush mt-5 mb-5 p-0'>";
        echo "</ul>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        foreach($data as $cle => $valeur) {
            echo "<div class=' mt-3 mb-2 mx-auto card bg-dark text-white colg-lg-3 col-md-4 col-6'>";
            
            echo "<a href='article_detail.php?name=".htmlspecialchars($valeur->title)."' class='text-white' id='color-blue'>";
            echo "<h5 class='text-center'>".htmlspecialchars($valeur->title)."</h5>";
            echo "<img class='card-img img-thumbnail' id='".htmlspecialchars($valeur->title)."' src='images/".htmlspecialchars($valeur->image)."' alt='card image'>";
            echo "</a>";
            echo "</div>";
        }

    ?>
    <div class='container'>
        <div class="row">
            <div class="col-md-12 mt-5 mb-5 text-center">
                <a href="#top" class='btn btn-outline-dark' id="top-page">Haut de page</a>
            </div>
        </div>
    </div>
    
</body>
</html>