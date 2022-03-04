<!-----------header------------>
<header id="mainHeader">
        <h1>Rotten Potatoes</h1>
        <input id="search" type="search" placeholder="Rechercher un jeu, un studio...">
        <nav id="menu">
            <ul>
                <!--<li><a href="./CreerCompte.html">Créer un compte</a></li>-->
                <li id="creaCpt">Créer un compte</li>
                <li>Se connecter</li>
                <li>Mon compte</li>
            </ul>
            <ul>
                <li><a href="./accueil_view.php">Actualités</a></li>
                <li>Jeux</li>
                <li><a href="./editeur_view.php">Editeurs</a></li>
                <li><a href="./studio_view.php">Studios</a></li>
                <li>Ma liste</li>
                <li><a href="./creerJeu_view.php">Ajouter un jeu</a></li>
                <li><a href="./admin_view.php">Administration</a></li>
            </ul>
        </nav>
    </header>
<!----------------------------->
<!--Modale création de compte-->
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
                            <label for="mdp">Mot de passe </label>
                            <input type="password" name="mdp" minlength="8" maxlength="25" id="mdp"/>
                        </li>
                        <li>
                            <label for="confirmMdp">Confirmer le mot de passe </label>
                            <input type="password" name="confirmMdp" minlength="8" maxlength="25" id="confirmMdp"/>
                        </li>
                        <li>
                            <input type="checkbox" id="CondUtilisat">
                            <label for="CondUtilisat">Je souhaite m'inscrire à la newletter du site </label>
                        </li>
                    </ul>
                </form>
            </div>
            
            <footer>
                <input type="submit" name="Crea" value="Créer votre compte"> <!--vérifier si le fait qu'il soit en dehors du form ne pose pas de prob-->
                <p>Déjà un compte ?  Identifiez vous ici</p>
            </footer>
        </div>
    </div>
<!----------------------------->
<!------Modale connexion------->
<div id="connection" class="modal">
        <div class="modal-container">
            <header>
                <span id="close">&times;</span>
                <h3>Se connecter</h3>
            </header>

            <div>
                <form id="login" method="POST" action="">
                    <ul>
                        <li>
                            <label for="pseudoLog">Pseudo </label>
                            <input type="text" name="pseudoLog" maxlength="20" id="pseudoLog"/>
                        </li>
                        <li>
                            <label for="mdpLog">Mot de passe </label>
                            <input type="password" name="mdpLog" minlength="8" maxlength="25" id="mdpLog"/>
                        </li>
                    </ul>
                </form>
            </div>
            
            <footer>
                <input type="submit" name="Connec" value="S'identifier"> <!--vérifier si le fait qu'il soit en dehors du form ne pose pas de prob-->
            </footer>
        </div>
    </div>
<!----------------------------->