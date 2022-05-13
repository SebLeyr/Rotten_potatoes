<?php
    session_start();
    include_once("../Controllers/jeu_controller.php");
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rotten potatoes : reviews de jeux vidéos par la communauté pour la communauté</title>
    <link rel="stylesheet" href="./template.css">
    <link rel="stylesheet" href="./jeu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&display=swap" rel="stylesheet">
    <meta name="description" content="Rotten potatoes, site communautaire de notation et de review de jeux vidéos, venez vous tenir au courant des dernières actus et partager votre avis !">
</head>

<body>
    <?php
        include('../Views/header.php');
    ?>
    <div id="Container">
        <div class="containerList">
            <div class="titre">
                <h2>Les plus populaires</h2>
                <a href="">Tout voir</a>
            </div>
            <ul>
                <li>
                    <p>lien jeu populaire</p>
                    <img class="imgNote" src="../images/potatoe.png">
                </li>
                <li>
                    <p>lien jeu populaire2</p>
                    <img class="imgNote" src="../images/potatoe.png">
                </li>
                <li>
                    <p>lien jeu populaire3</p>
                    <img class="imgNote" src="../images/potatoe.png">
                </li>
                <li>
                    <p>lien jeu populaire4</p>
                    <img class="imgNote" src="../images/potatoe.png">
                </li>
                <li>
                    <p>lien jeu populaire5</p>
                    <img class="imgNote" src="../images/potatoe.png">
                </li>
            </ul>
        </div>
        <div class="jeu">
            <div class="videoYT">
                <!--<iframe width="2544" height="1132" src="<?= $trailer ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
--></div>
            <div id="blocJeu">
                <img class="cover" src="<?= $jaquette ?>">
                <div class="description">
                    <ul>
                        <li><?= $nom_jeu ?></li>
                        <li>
                            <div class="note">
                                <img class="imgNote" src="../images/potatoe.png">
                                <p>note</p>
                            </div>
                            <?= $noter ?>
                        </li>
                        <li>Studio : <a href="http://localhost/Rotten_potatoes/Views/studio_view.php?nom=<?= $studio ?>"><?= $studio ?></a></li>
                        <li>Éditeur : <?= $editeur ?></li>
                        <li>Date de sortie : <?= $date_sortie ?></li>
                        <li>Plateformes : <?= $plateforme ?></li>
                        <!--prix par plateforme-->
                        <li>Genre : <?= $genre ?></li>
                        <li>multijoueurs : </li>
                        <li>Nombre de joueurs : <?= $nbr_joueurs ?></li>
                        <!--lien wiki-->
                    </ul>
                </div>
            </div>
            <div>
                <h2 class="catégorie">Résumé</h2>
                <p><?= $resume ?></p>
            </div>
            <div>
                <h2 class="catégorie">Vidéos</h2>
                <div class="carousel">
                    <!--<iframe width="2544" height="1132" src="<?= $video ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
--></div>
            </div>
            <div>
                <h2 class="catégorie">Photos</h2>
                <div class="carousel">
                    <img src="<?= $image ?>">
                </div>
            </div>
            <div>
                <h2 class="catégorie">Commentaires</h2>
                
            </div>
        </div>
    </div>
    <?php
        include('../Views/footer.php');
    ?>
    <script src="./Scripts/CreerCompte.js"></script>
    <script src="./Scripts/noter.js"></script>
    <!--<script src="carousel.js"></script>-->
</body>
</html>