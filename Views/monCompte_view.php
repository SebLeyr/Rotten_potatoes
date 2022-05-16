<?php
    session_start();
    include('../Controllers/compte_controller.php')
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rotten potatoes : reviews de jeux vidéos par la communauté pour la communauté</title>
    <link rel="stylesheet" href="./template.css">
    <link rel="stylesheet" href="./monCompte.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&display=swap" rel="stylesheet">
    <meta name="description" content="Rotten potatoes, site communautaire de notation et de review de jeux vidéos, venez vous tenir au courant des dernières actus et partager votre avis !">
</head>

<body>

    <?php
        include('../Views/header.php');
    ?>
    <h2>Mon compte</h2>
    <!--display des message d'erreurs-->
    <?= $log ?>
    <!--informations du compte connecté-->
    <div id="infos">
        <?= $compte ?>
    </div>
    <!--Modale modif pseudo-->
    <div class="modalBackground" id="modalBPseudo">
        <div class="modaleModif" id="modalPseudo">
            <header>
                <span class="close" id="closePseudo">&times;</span>
                <h3>Entrez un nouveau pseudo :</h3>
            </header>
            <form id="modifyPseudo" method="POST" action="#">
                <ul>
                    <li>
                        <label for="newPseudo">Pseudo :</label>
                        <input type="text" name="newPseudo" maxlength="20" id="newPseudo"/>
                    </li>
                    <li><input type="submit" name="submit" value="Modifier"></li>
                </ul>
            </form>
        </div>
    </div>
    <!-------------------------------------->
    <!--Modale modif email-->
    <div class="modalBackground" id="modalBMail">
        <div class="modaleModif" id="modalMail">
            <header>
                <span class="close" id="closeMail">&times;</span>
                <h3>Entrez un nouvel Email :</h3>
            </header>
            <form id="modifyMail" method="POST" action="">
                <ul>
                    <li>
                        <label for="newMail">Email :</label>
                        <input type="email" name="newMail" maxlength="30" id="newMail" required/>
                    </li>
                    <li><input type="submit" name="submit" value="Modifier"></li>
                </ul>
            </form>
        </div>
    </div>
    <!-------------------------------------->
    <!--Modale modif mdp-->
    <div class="modalBackground" id="modalBPassword">
        <div class="modaleModif"id="modalPassword">
            <header>
                <span class="close" id="closePassword">&times;</span>
                <h3>Entrez un nouveau mot de passe :</h3>
            </header>
            <form id="modifyPassword" method="POST" action="">
                <ul>
                    <li>
                        <label for="Mdp">Mot de passe actuel :</label>
                        <input type="password" name="Mdp" id="Mdp" required/>
                    </li>
                    <li>
                        <label for="newMdp">Nouveau mot de passe :</label>
                        <input type="password" name="newMdp" id="newMdp" required/>
                    </li>
                    <li>
                        <label for="newMdpConf">Confirmez le nouveau mot de passe :</label>
                        <input type="password" name="newMdpConf" id="newMdpConf" required/>
                    </li>
                    <li><input type="submit" name="submit" value="Modifier"></li>
                </ul>
            </form>
        </div>
    </div>
    <!-----------Supprimer compte---------->
    <div class="modalBackground" id="modalBDelete">
        <div class="modaleModif" id="modalDelete">
            <header>
                <span class="close" id="closeDelete">&times;</span>
                <h3>Supprimez votre compte :</h3>
            </header>
            <form id="DeleteAccount" method="POST" action="">
            <h3>Cette action est permanante, êtes-vous sûrs ?</h3> 
                <ul>
                    <li>
                        <label for="passwordSuppr">Votre mot de passe</label>
                        <input type="password" name="passwordSuppr" required> 
                    </li>
                    <li><input type="submit" name="submit" value="Supprimer"></li>
                </ul>
            </form>
        </div>
    </div>
    <?php
        include('../Views/footer.php');
    ?>
    <script src="./Scripts/CreerCompte.js"></script>
    <script src="./Scripts/monCompte.js"></script>
    <!--<script src="carousel.js"></script>-->
</body>
</html>