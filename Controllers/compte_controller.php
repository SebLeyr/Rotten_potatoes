<?php
    include_once('../Utilitaires/connec_bdd.php');
    include_once('../Utilitaires/utilitaires.php');
    include_once('../Models/Utilisateur_model.php');
    include_once('../Models/droit_model.php');
    $user = new User();
    $droit = new Droit();
    $verif = new Outils();

    $log = "";

    if(isset($_SESSION['id'])){
        $user->setPseudo_user($_SESSION['pseudo']);
        $req = $user->getSingleUser();
        $donnees = $req->fetch();

        $user->setIdUser($_SESSION['id']);
        $user->setPseudo_user($donnees['pseudo_user']);
        $user->setEmail_user($donnees['email_user']);
        $user->setId_droit($donnees['id_droit']);

        //affichage des infos du compte
        $pseudo = $user->getPseudo_user();
        $email = $user->getEmail_user();

        $compte = '
                <div>
                    <p>Pseudo : '.$pseudo.'</p>
                    <a class="btnModal" id="btnModifyPseudo">Modifier</a>
                </div>
                <div>
                    <p>Email : '.$email.'</p>
                    <a class="btnModal" id="btnModifyMail">Modifier</a>
                </div>
                <br>
                <div>
                    <a class="btnModal" id="btnModifyPassword">Modifier son mot de passe</a>
                </div>
                <br>
                <div>
                    <a class="btnModal" id="btnDelete">Supprimez votre compte</a>
                </div><br>';
                
        //changement pseudo
        if(isset($_POST['newPseudo'])) {
            $verifNewPseudo = $verif->valid_donnees($_POST['newPseudo']);
            if($verifNewPseudo != ""){
                $user->setPseudo_user($verifNewPseudo);
                
                $checkPseudo = $user->verifyPseudo();
                $nbrLignes = $checkPseudo->rowCount();

                if($nbrLignes > 0) {
                    $log = "Pseudo déjà utilisé";
                } else {
                    if($user->updateUser()) {
                        $_SESSION['pseudo'] = $user->getPseudo_user();
                        header("location: http://localhost/Rotten_potatoes/Views/monCompte_view.php");
                    }
                }
            } else {
                $log = "Veuillez entrer un pseudo";
            }
        }

        //changement email
        if(isset($_POST['newMail'])) {
            $verifNewMail = $verif->valid_donnees($_POST['newMail']);
            if($verifNewMail != ""){
                $user->setEmail_user($verifNewMail);
                
                $checkMail = $user->verifyMail();
                $nbrLignes = $checkMail->rowCount();

                if($nbrLignes > 0) {
                    $log = "Email déjà utilisé";
                } else {
                    if($user->updateUser()) {
                        header("location: http://localhost/Rotten_potatoes/Views/monCompte_view.php");
                    }
                }
            } else {
                $log = "Veuillez entrer un Mail";
            }
        }

        //changement mdp
        

        //suppression compte

    }else { 
        $compte = "Please log in";
    }
?>