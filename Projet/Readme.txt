compte admin: 

-admin

-Azerty1234567

compte utilisateur:

-blabla

-Qsdfgh1234567


<?php
                    echo "<p class='mb-5 textContent'>".htmlspecialchars($data[0]->content)."</p>";
                    echo "<p class='text-center textAuthor pb-4 border-bottom'>Article mis en ligne par ".htmlspecialchars(ucfirst($user[0]->pseudo)).", le ".date('d-m-Y H:i:s',strtotime($data[0]->time)).".</p>";
                    var_dump($_GET);
                 ?>

                 <div class="col-md-8">
                <img src="images/<?= $data[0]->image ?>" class="w-75">
            </div>

<?php include ('header.php'); ?>
                    <!-- <?php

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

                    ?> -->