<?php
    session_start();
?>
<?php
    include('../Controllers/creerPlateformeEtGenre_controller.php');
?>
<!DOCTYPE html>
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

    <container>
        <h2>Ajouter une plateforme ou un genre</h2>
        <form id="creaPlateforme" method="POST" action="">
            <ul>
                <li>
                    <label for="nomPlat">Nom plateforme</label>
                    <input type="text" name="nomPlat" maxlength="30" id="nomPlat"/>
                </li>
                <li>
                    <input type='submit' name='postPlateforme' value='Ajouter la plateforme'>
                </li>
            </ul>
        </form>
        <form id="creaGenre" method="POST" action="">
            <ul>
                <li>
                    <label for="nomGenre">Nom genre</label>
                    <input type="text" name="nomGenre" maxlength="30" id="nomGenre"/>
                </li>
                <li>
                    <input type='submit' name='postGenre' value='Ajouter le genre'>
                </li>
            </ul>
        </form>
    </container>

    <?php
        include('../Views/footer.php');
    ?>

    </script> -->
    <script src="../Views/Scripts/CreerCompte.js"></script>
    <!-- <script src="carousel.js"></script> -->

</body>
</html>