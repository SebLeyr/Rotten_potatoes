<?php
    include_once('../Controllers/creer_compte_controller.php');
    include_once('../Controllers/connexion_controller.php');
    include_once('../Controllers/deconnexion_controller.php');
?>
<!-----------header------------>
<header id="mainHeader">
        <h1>Rotten Potatoes</h1>
        <input id="search" type="search" placeholder="Rechercher un jeu, un studio...">
        <nav id="menu">
            <!--<div id="phoneIcon">
                <div></div>
                <div></div>
                <div></div>-->
            </div>
            <ul>
                <li><?= $account ?></li>
                <li><?= $connexion ?></li>
            </ul>
            <ul>
                <li><a href="./accueil_view.php">Actualités</a></li>
                <li>Jeux</li>
                <li><a href="./editeur_view.php">Editeurs</a></li>
                <li><a href="./listeStudios_view.php">Studios</a></li>
                <li>Ma liste</li>
                <li><a href="./creerJeu_view.php">Ajouter un jeu</a></li>
                <li><a href="./admin_view.php">Administration</a></li>
            </ul>
        </nav>
    </header>
<!----------------------------->
<!--Modale création de compte-->
    <div id="creaCompte" class="modal">
        <div id="modalCrea" class="modal-container">
            <header>
                <span id="close">&times;</span>
                <h3>S'inscrire sur Rotten Potatoes</h3>
            </header>

            <div>
                <form id="createCompte" method="POST" action="">
                    <ul>
                        <li>
                            <label for="pseudo">Pseudo </label>
                            <input type="text" name="pseudo" maxlength="20" id="pseudo" required/>
                        </li>
                        <li>
                            <label for="email">E-mail </label>
                            <input type="email" name="email" id="email" required/>
                        </li>
                        <li>
                            <label for="confEmail">Confirmer l'e-mail </label>
                            <input type="email" name="confEmail" id="confEmail" required/>
                        </li>
                        <li>
                            <label for="mdp">Mot de passe </label>
                            <input type="password" name="mdp" minlength="8" maxlength="25" id="mdp" required/>
                        </li>
                        <li>
                            <label for="confirmMdp">Confirmer le mot de passe </label>
                            <input type="password" name="confirmMdp" minlength="8" maxlength="25" id="confirmMdp" required/>
                        </li>
                        <p><strong><?php echo $log; ?></strong></p>
                        <li>
                            <input type="submit" name="Crea" value="Créer votre compte">
                        </li>
                    </ul>
                </form>
            </div>
            <footer>
                <p>Déjà un compte ?  Identifiez vous <a id="connexionCrea">ici</a></p>
            </footer>
        </div>
    </div>
<!----------------------------->
<!------Modale connexion------->
<div id="connexionCompte" class="modal">
        <div id="modalCo" class="modal-container">
            <header>
                <span id="closeCo">&times;</span>
                <h3>Se connecter</h3>
            </header>

            <div>
                <form id="login" method="POST" action="">
                    <ul>
                        <li>
                            <label for="pseudoLog">Pseudo </label>
                            <input type="text" name="pseudoLog" maxlength="20" id="pseudoLog" required/>
                        </li>
                        <li>
                            <label for="mdpLog">Mot de passe </label>
                            <input type="password" name="mdpLog" minlength="8" maxlength="25" id="mdpLog" required/>
                        </li>
                        <li>
                            <input type="submit" name="Connec" value="S'identifier">
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
<!----------------------------->