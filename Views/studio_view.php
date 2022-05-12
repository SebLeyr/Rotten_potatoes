<?php
    session_start();
    include_once("../Controllers/studio_controller.php");
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rotten potatoes : reviews de jeux vidéos par la communauté pour la communauté</title>
    <link rel="stylesheet" href="./template.css">
    <link rel="stylesheet" href="./studio.css">
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
                    <img class="imgNote" src="./image/potatoe.png">
                </li>
                <li>
                    <p>lien jeu populaire2</p>
                    <img class="imgNote" src="./image/potatoe.png">
                </li>
                <li>
                    <p>lien jeu populaire3</p>
                    <img class="imgNote" src="./image/potatoe.png">
                </li>
                <li>
                    <p>lien jeu populaire4</p>
                    <img class="imgNote" src="./image/potatoe.png">
                </li>
                <li>
                    <p>lien jeu populaire5</p>
                    <img class="imgNote" src="./image/potatoe.png">
                </li>
            </ul>
        </div>
        <div class="studio">
            <div class="description">
                <img src="<?= $image ?>">
                <ul>
                    <li><?= $nom_studio ?></li>
                    <!--
                    <li>date création</li>
                    <li>nombre de personnes</li>
                    <li>pays</li>
                    -->
                </ul>
            </div>
            <div class="jeux">
                <div class="jeu">
                    <h2>Jeux</h2>
                </div>
                <ul>
                    <?= $liste_jeux ?>
                </ul>
            </div>
        </div>
    </div>
    <?php
        include('../Views/footer.php');
    ?>
    <script src="../Views/Scripts/CreerCompte.js"></script>
    <script src="carousel.js"></script>
</body>
</html>