<?php
    session_start();
?>
<?php
    include('../Controllers/creerEditeur_controller.php');
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
        <h2>Ajouter un éditeur</h2>
        <form id="creaEditeur" method="POST" action="">
            <ul>
                <li>
                    <label for="nomEditeur">Nom de l'éditeur</label>
                    <input type="text" name="nomEditeur" maxlength="30" id="nomEditeur"/>
                </li>
                <li>
                    <input type='submit' name='postEditeur' value="Ajouter l'éditeur">
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