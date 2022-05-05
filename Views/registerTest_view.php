<?php
    include('../Controllers/creer_compte_controller.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rotten potatoes : reviews de jeux vidéos par la communauté pour la communauté</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&display=swap" rel="stylesheet">
    <meta name="description" content="Rotten potatoes, site communautaire de notation et de review de jeux vidéos, venez vous tenir au courant des dernières actus et partager votre avis !">
</head>
<body>

    <container>
        <div id="creaCompte" class="modal">
            <div class="modal-container">
                <header>
                    <span id="close">&times;</span>
                    <h3>S'inscrire sur Rotten Potatoes</h3>
                </header>

                <div>
                    <form id="createCompte" method="POST" action="">
                        <ul>
                            <li>
                                <label for="pseudo">Pseudo </label>
                                <input type="text" name="pseudo" maxlength="20" id="pseudo"/>
                            </li>
                            <li>
                                <label for="email">E-mail </label>
                                <input type="email" name="email" id="email"/>
                            </li>
                            <li>
                                <label for="confEmail">Confirmer l'e-mail </label>
                                <input type="email" name="confEmail" id="confEmail"/>
                            </li>
                            <li>
                                <label for="mdp">Mot de passe </label>
                                <input type="password" name="mdp" minlength="8" maxlength="25" id="mdp"/>
                            </li>
                            <li>
                                <label for="confirmMdp">Confirmer le mot de passe </label>
                                <input type="password" name="confirmMdp" minlength="8" maxlength="25" id="confirmMdp"/>
                            </li>
                            <!-- <li>
                                <input type="checkbox" id="CondUtilisat">
                                <label for="CondUtilisat">Je souhaite m'inscrire à la newletter du site </label>
                            </li> -->
                            <p><strong><?php echo $log; ?></strong></p>
                            <li>
                                <input type="submit" name="Crea" value="Créer votre compte">
                            </li>
                        </ul>
                    </form>
                </div>
                <footer>
                    <p>Déjà un compte ?  Identifiez vous ici</p>
                </footer>
            </div>
        </div>
    </container>

<?php
    include('../Views/footer.php');
?>

</script> -->
<script src="../Views/Scripts/CreerCompte.js"></script>
<!-- <script src="carousel.js"></script> -->

</body>
</html>