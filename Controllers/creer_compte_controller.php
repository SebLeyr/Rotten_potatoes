<?php
    //appel des fichiers nécesssaires
    include_once('../Utilitaires/connec_bdd.php');
    include_once('../Models/Utilisateur_model.php');
    include_once('../Utilitaires/utilitaires.php');
    $verif = new Outils();

    // création de la variable de display info, laissé vide au start pour éviter des erreurs
    $log = "";

    if(isset($_POST['pseudo'])
        && isset($_POST['email'])
        && isset($_POST['confEmail'])
        && isset($_POST['mdp'])
        && isset($_POST['confirmMdp'])) {

        // je commence par créer des variables qui vont stocker les données envoyées par l'utilisateur 
        // en sécurisant les données grâce aux trois composant de ma fonction valid_donnees : trim, stripslashes et
        //htmlspecialchars. je m'assure ainsi qu'il n'y ai pas d'espaces ou de caractères spéciaux dans les champs
        //du formulaire. De cette manière on se protège de toute faille XSS

        $pseudoUser = $verif->valid_donnees($_POST['pseudo']);
        $mailUser = $verif->valid_donnees($_POST['email']);
        $confMail = $verif->valid_donnees($_POST['confEmail']);
        $passwordUser = $verif->valid_donnees($_POST['mdp']);
        $confPassword = $verif->valid_donnees($_POST['confirmMdp']);

        // ensuite je vérifie que password et confPassword sont identiques
        if($passwordUser !== $confPassword) {
            //Si différents je passe une valeur à la variable $log pour traiter cette erreur
            //$log = 'Les mots de passe doivent correspondre';
            echo "<script>alert('Les mots de passe doivent correspondre')</script>";
        } else {
            // je vérifie si la valeur de $mail est bien un mail grâce à la fonction filter_var
            // qui prend la donnée en paramètre ainsi que FILTER_VALIDATE_EMAIL pour demander la vérification
            if(!filter_var($mailUser, FILTER_VALIDATE_EMAIL)){
                //Si ça ne correspond pas à un mail je passe une valeur à la variable $log pour traiter cette erreur
                //$log = "L'E-mail est incorrect";
                echo "<script>alert('L'E-mail est incorrect')</script>";
            }
            // et je renouvelle cette opération pour la valeur de la variable $confMail
            else if(!filter_var($confMail, FILTER_VALIDATE_EMAIL)){
                //$log = "L'E-mail de confirmation est incorrect";
                echo "<script>alert('L'E-mail de confirmation est incorrect')</script>";
            }
            // je vérifie maintenant que les mails sont identiques
            else if($mailUser !== $confMail){
                //Si ils sont différents je passe une valeur à la variable $log pour traiter cette erreur
                //$log = "les E-mails doivent correspondres";
                echo "<script>alert('les E-mails doivent correspondres')</script>";
            } else {
                //Je créer une noucelle instance d'utilisateur pour faire l'insertion dans la BDD
                $newUser = new User();

                // et j'utilise les setters de la classe User pour affecter les valeurs des variables aux attributs de la classe
                $newUser->setPseudo_user($verifPseudoUser);
                $newUser->setEmail_user($verifMailUser);
                $newUser->setId_droit(0);
                // pour l'affectation du mot de passe je vais également utiliser la fonction de hash de BCRIPT
                // pour crypter le mot de passe.
                $newUser->setPassword_user(password_hash($verifPasswordUser, PASSWORD_BCRYPT));
                
                // avant de pourvoir procéder à l'insertion en base de données
                // je vais vérifier que le pseudo et le mail n'existent pas déjà dans ma base de données
                // je stocke dans une variable le retour de la fonction qui se trouve dans ma classe User
                $checkMail = $newUser->verifyMail();
                // puis je stocke dans une variable le résultat du décompte du nombre de ligne
                // de ce retour grâce à la fonction PHP rowCount()
                $nbrLignes = $checkMail->rowCount();

                if($nbrLignes > 0) {
                    //$log = "E-mail déjà utilisé";
                    echo "<script>alert('E-mail déjà utilisé')</script>";
                } else {
                    $checkPseudo = $newUser->verifyPseudo();
                    $nbrLignes = $checkPseudo->rowCount();

                    if($nbrLignes > 0) {
                        //$log = "Pseudo déjà utilisé";
                        echo "<script>alert('Pseudo déjà utilisé')</script>";
                    } else {
                        //je vérifie ensuite que la fonction de création s'est bien exécutée et que l'utilisateur
                        //est bien présent dans la BDD
                        if($newUser->createUser()){
                            $myReturn = $newUser->getSingleUser();
                            $nbrUsers = $myReturn->rowCount();

                            if($nbrUsers == 0){
                                //$log = "Something went wrong, please contact an administrator";
                                echo "<script>alert('Something went wrong, please contact an administrator')</script>";

                            } else if($nbrUsers >1){
                                //$log ="Compte déjà présent";
                                echo "<script>alert('Compte déjà présent')</script>";

                            } else if ($nbrUsers == 1) {
                                echo '<script>alert("Compte créé avec succès")</script>';
                            }
                        } else {
                            //$log = "Error during the register";
                            echo "<script>alert('Error during the register')</script>";
                        }
                    }
                }
            }
        }
    }
?>