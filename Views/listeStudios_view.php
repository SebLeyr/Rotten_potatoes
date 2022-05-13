<?php
    session_start();
    include_once('../Controllers/listeStudios_controller.php');
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rotten potatoes : reviews de jeux vidéos par la communauté pour la communauté</title>
    <link rel="stylesheet" href="./template.css">
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
    <div class="studios">
                <div class="studio">
                    <h2>Studios</h2>
                </div>
                <ul>
                    <?= $liste_studios ?>
                </ul>
            </div>
    </div>
    <?php
        include('../Views/footer.php');
    ?>
    <script src="../Views/Scripts/CreerCompte.js"></script>
    <script src="carousel.js"></script>
</body>
</html>