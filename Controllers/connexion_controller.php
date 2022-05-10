<?php
    include_once('../Utilitaires/connec_bdd.php');
    include_once('../Models/Utilisateur_model.php');
    include_once('../Models/droit_model.php');
    $user = new User();
    $droit = new Droit();
    $verif = new Outils();

    $log = "";

    //vérification des champs
    if(isset($_POST['pseudoLog']) && !empty($_POST['pseudoLog']) && isset($_POST['mdpLog']) && !empty($_POST['mdpLog'])) {

        $pseudo = $verif->valid_donnees($_POST['pseudoLog']);
        $password = $verif->valid_donnees($_POST['mdpLog']);

        try{
            $user->setPseudo_user($pseudo);
            $user->setMdpUser($password);

            $req = $user->getSingleUser();
            $reqTable = $user->getTable()

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        //vérification de l'existence de l'utilisateur
        $verif = $req->fetch();

        if($verif == true) {
            // je compare mot de passe reçu avec celui de la BDD
            // si il ne sont pas identiques je retourne un message d'erreur
            if(!password_verify($password, $verif['password_user'])) {
                $log = "Erreur dans votre mot de passe, veuillez recommencer";
                // s'ils sont identiques je continue le log
            } else if (password_verify($user->getPassword_user(), $verif['password_user'])) {
                $_SESSION['id'] = $verif['id_user'];
                $_SESSION['pseudo'] = $verif['pseudo_user'];
                $_SESSION['id_droit'] = $idDroit['id_droit'];

                header("location: ../Views/accueil_view.php");
            } else {
                $log = "Error in second password verify";
            }
        } else {
            $log = "L'utilsiateur n'existe pas";
        }
    }

    //------------------------------------------------------//
    //---------Affichage quand utilisateur connecté---------//
    //------------------------------------------------------//

    //affichage deconnexion et accès espace compte et affichage des données de session quand connecté
    if(isset($_SESSION['id'])){

        //modification affichage lien liste parents/profs en fonction du type d'utilisateur
    } else {
        $account = '';
    }
?>