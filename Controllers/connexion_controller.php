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

    //vérification de la présence et de la validité des champs
    if(isset($_POST['pseudoLog']) 
        && !empty($_POST['pseudoLog']) 
        && isset($_POST['mdpLog']) 
        && !empty($_POST['mdpLog'])) {

        //protection contre les failles XSS (voir utilitaires.php)
        $pseudo = $verif->valid_donnees($_POST['pseudoLog']);
        $password = $verif->valid_donnees($_POST['mdpLog']);

        try{
            $user->setPseudo_user($pseudo);
            $user->setPassword_user($password);

            $req = $user->getSingleUser();

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        //vérification de l'existence de l'utilisateur
        $verif = $req->fetch();

        if($verif == true) {
            // je compare mot de passe reçu avec celui de la BDD
            // si il ne sont pas identiques je retourne un message d'erreur
            if(!password_verify($password, $verif['password_user'])) {
                //$log = "Erreur dans votre mot de passe, veuillez recommencer";
                echo "<script>alert('Erreur dans votre mot de passe, veuillez recommencer')</script>";
                // s'ils sont identiques je continue le log
            } else if (password_verify($user->getPassword_user(), $verif['password_user'])) {
                //Je renseignes les champs pertinents dans la variable $_SESSION de PHP pour qu'ils soit disponibles sur toutes les pages
                $_SESSION['id'] = $verif['id_user'];
                $_SESSION['pseudo'] = $verif['pseudo_user'];
                $_SESSION['id_droit'] = $idDroit['id_droit'];

                //redirection vers l'accueil une fois connecté
                header("location: ../Views/accueil_view.php");
            } else {
                //$log = "Error in second password verify";
                echo "<script>alert('Error in second password verify')</script>";
            }
        } else {
            //$log = "L'utilisateur n'existe pas";
            echo "<script>alert('L'utilisateur n'existe pas')</script>";
        }
    }

    //------------------------------------------------------//
    //---------Affichage quand utilisateur connecté---------//
    //------------------------------------------------------//

    //Gestion de l'affiche du menu de connexion et d'accès à l'espace mon compte quand connecté ou déconnecté
    if(isset($_SESSION['id'])){
        $pseudo = $_SESSION['pseudo'];
        $account = '<a href="./monCompte_view.php">'.$pseudo.'</a>';
        $connexion = '<form action="" method="POST"> <input type="submit" id="deconnexion" name="deconnexion" value="Déconnexion"></form>';
    } else {
        $account = '<a id="creaCpt">Créer un compte</a>';
        $connexion = '<a id="connexion">Se connecter</a>';
    }
?>