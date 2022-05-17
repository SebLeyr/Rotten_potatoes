<?php
    include_once('../Utilitaires/connec_bdd.php');
    include_once('../Utilitaires/utilitaires.php');
    include_once('../Models/Utilisateur_model.php');
    include_once('../Models/droit_model.php');
    $user = new User();
    $droit = new Droit();
    $verif = new Outils();

    // création de la variable de display info, laissé vide au start pour éviter des erreurs
    $log = "";

    if(isset($_SESSION['id'])){
        //récupération des données de l'utilisateur connecté via une fonction du modèle utilisateur et du pseudo stocké dans la session
        $user->setPseudo_user($_SESSION['pseudo']);
        $req = $user->getSingleUser();
        $donnees = $req->fetch();

        $user->setIdUser($_SESSION['id']);
        $user->setPseudo_user($donnees['pseudo_user']);
        $user->setEmail_user($donnees['email_user']);
        $user->setPassword_user($donnees['password_user']);
        $user->setId_droit($donnees['id_droit']);

        //affichage des infos du compte
        $pseudo = $user->getPseudo_user();
        $email = $user->getEmail_user();

        //Variable contenant l'affichage des informations du comtpe en HTML pour avoir un affichage uniquement quand l'utilsiateur est connecté
        $compte = '
                <div>
                    <p id="test"><b>Pseudo :</b> '.$pseudo.'</p>
                    <a class="btnModal" id="btnModifyPseudo">Modifier</a>
                </div>
                <div>
                    <p><b>Email :</b> '.$email.'</p>
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
                //si le champ n'est pas vide, vérification que le pseudo n'est pas déjà présent dans la BDD
                $user->setPseudo_user($verifNewPseudo);
                
                $checkPseudo = $user->verifyPseudo();
                $nbrLignes = $checkPseudo->rowCount();

                if($nbrLignes > 0) {
                    //$log = "Pseudo déjà utilisé";
                    echo "<script>alert('Pseudo déjà utilisé')</script>";
                } else if($user->updateUser()) {
                        //si la modification réussie, modification du pseudo stocké dans la variable $_SESSION puis redirection vers la page mon compte
                        $_SESSION['pseudo'] = $user->getPseudo_user();
                        header("location: http://localhost/Rotten_potatoes/Views/monCompte_view.php");
                    }
            } else {
                //$log = "Veuillez entrer un pseudo";
                echo "<script>alert('Veuillez entrer un pseudo')</script>";
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
                    //$log = "Email déjà utilisé";
                    echo "<script>alert('Email déjà utilisé')</script>";
                } else if($user->updateUser()) {
                        header("location: http://localhost/Rotten_potatoes/Views/monCompte_view.php");
                    }
            } else {
                //$log = "Veuillez entrer un Mail";
                echo "<script>alert('Veuillez entrer un Mail')</script>";
            }
        }

        //changement mdp
        if (isset($_POST['Mdp']) && isset($_POST['newMdp']) && isset($_POST['newMdpConf'])) {

            $verifPassword = $verif->valid_donnees($_POST['Mdp']);
            $verifNewPassword = $verif->valid_donnees($_POST['newMdp']);
            $verifNewPasswordConf = $verif->valid_donnees($_POST['newMdpConf']);

            // je compare mot de passe reçu avec celui de la BDD
            // si il ne sont pas identiques je retourne un message d'erreur
            if(!password_verify($verifPassword, $donnees['password_user'])) {
                //$log = "Erreur dans votre mot de passe, veuillez recommencer";
                echo "<script>alert('Erreur dans votre mot de passe, veuillez recommencer')</script>";
            } else if($verifNewPassword !== $verifNewPasswordConf) {
                    //$log = "la confirmation ne correspond pas au nouveau mot de passe";
                    echo "<script>alert('la confirmation ne correspond pas au nouveau mot de passe')</script>";
                } else if ($verifNewPassword != ""){
                        $user->setPassword_user(password_hash($verifNewPassword, PASSWORD_BCRYPT));
                        $user->updateUser();
                        header("location: http://localhost/Rotten_potatoes/Views/monCompte_view.php");
                    } else {
                        //$log = "Veuillez entrer un nouveau mot de passe";
                        echo "<script>alert('Veuillez entrer un nouveau mot de passe')</script>";
                    }
        }

        //suppression compte
        if(isset($_POST['passwordSuppr'])) {

            $verifPassword = $verif->valid_donnees($_POST['passwordSuppr']);
            if(!password_verify($verifPassword, $donnees['password_user'])) {
                //$log = "Erreur dans votre mot de passe, veuillez recommencer";
                echo "<script>alert('Erreur dans votre mot de passe, veuillez recommencer')</script>";
            } else {
                //si le mot de passe est correct, utlisation de la fonction de utilisateur pour supprimer le compte
                //dans la BDD et suppression de la session avant de rediriger vers l'acceuil
                $user->deleteUser();
                session_unset();
                session_destroy();
                header("location: http://localhost/Rotten_potatoes/Views/accueil_view.php");
            }
        }
    }else { 
        $compte = "Please log in";
    }
?>