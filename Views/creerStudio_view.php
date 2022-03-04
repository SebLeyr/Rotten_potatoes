<?php
    include('../Controllers/creerStudio_controller.php');
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
        <h2>Ajouter un studio</h2>
        <form id="creaStudio" method="POST" enctype="multipart/form-data">
            <ul>
                <li>
                    <label for="nomStudio">Nom Studio</label>
                    <input type="text" name="nomStudio" maxlength="30" id="nomStudio"/>
                </li>
                <li>
                    <label for="logoStudio">Logo du studio</label>
                    <input type="file" name="logoStudio" accept="image/png, image/jpeg" id="logoStudio"/>
                </li>
                <li>
                    <input type='submit' name='postStudio' value='Ajouter le studio'>
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