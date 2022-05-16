<?php
    //appel des fichiers nécesssaires
    include_once('../Utilitaires/connec_bdd.php');
    include_once('../Models/Utilisateur_model.php');

    $success = 0;
    $msg = "Une erreur est survenue dans le php";
    $data = [];
    // création de la variable de display info, laissé vide au start pour éviter des erreurs
    $log = "";

    if(isset($_POST['pseudo'])
        && isset($_POST['email'])
        && isset($_POST['confEmail'])
        && isset($_POST['mdp'])
        && isset($_POST['confirmMdp'])) {

        // je commence par créer des variables qui vont stocker les données envoyées par l'utilisateur 
        // en enlevant les blanc devant et derrière chaque données

        $pseudoUser = trim($_POST['pseudo']);
        $mailUser = trim($_POST['email']);
        $confMail = trim($_POST['confEmail']);
        $passwordUser = trim($_POST['mdp']);
        $confPassword = trim($_POST['confirmMdp']);

        // ensuite je vérifie que password et confPassword sont identiques
        if($passwordUser !== $confPassword) {
            // je passe une valeur à la variable $msg pour traiter cette erreur
            //$log = 'Les mots de passe doivent correspondre';
            echo "<script>alert('Les mots de passe doivent correspondre')</script>";
        } else {
            // je vérifie si la valeur de $mail est bien un mail grâce à la fonction filter_var
            // qui prend la donnée en paramètre ainsi que FILTER_VALIDATE_EMAIL pour demander la vérification
            if(!filter_var($mailUser, FILTER_VALIDATE_EMAIL)){
                // je passe une valeur à la variable $msg pour traiter cette erreur
                //$log = "L'E-mail est incorrect";
                echo "<script>alert('L'E-mail est incorrect')</script>";
            }
            // et je renouvelle cette opération pour la valeur de la variable $confMail
            else if(!filter_var($confMail, FILTER_VALIDATE_EMAIL)){
                // je passe une valeur à la variable $msg pour traiter cette erreur
                //$log = "L'E-mail de confirmation est incorrect";
                echo "<script>alert('L'E-mail de confirmation est incorrect')</script>";
            }
            // je vérifie maintenant que les mails sont  identiques
            else if($mailUser !== $confMail){
                // je passe une valeur à la variable $msg pour traiter cette erreur
                //$log = "les E-mails doivent correspondres";
                echo "<script>alert('les E-mails doivent correspondres')</script>";
            } else {
                // Ici je vais vérifier les champs suivants : $pseudo, email et $mdp.
                // Afin de sécuriser nos données nous allons effectuer des traitements à nos variables
                // en utilisant des fonctions PHP.
                // En effet nous allons vouloir nous protéger de toute injection de code HTML et/ou Javascript
                // par l'intermédiaire des variables qui contiennent les données envoyées par l'utilisateur.
                // Ces possibles failles sont appelées des failles XSS (Cross-Site Scripting).
                // Nous allons utiliser la fonction strip_tags qui permet de supprimer les balises HTML,
                // et la fonction htmlspecialchars qui permet de neutraliser les caractères &, ", ', <, >,
                // en les remplaçant par leurs codes &amp;, &quot;, &#039;, &lt; &gt;

                $verifPseudoUser = htmlspecialchars(strip_tags($pseudoUser));
                $verifMailUser = htmlspecialchars(strip_tags($mailUser));
                $verifPasswordUser = htmlspecialchars(strip_tags($passwordUser));

                $newUser = new User();

                // et j'utilise les setters de la classe User pour affecter les valeurs des variables aux attributs de la classe
                $newUser->setPseudo_user($verifPseudoUser);
                $newUser->setEmail_user($verifMailUser);
                // pour l'affectation du mot de passe je vais également utiliser la fonction de hash de BCRIPT
                // pour crypter le mot de passe.
                $newUser->setPassword_user(password_hash($verifPasswordUser, PASSWORD_BCRYPT));
                $newUser->setId_droit(0);

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
                        if($newUser->createUser()){
                            $myReturn = $newUser->getSingleUser();
                            $nbrUsers = $myReturn->rowCount();

                            if($nbrUsers == 0){
                                //$log = "Something went wrong, please contact an administrator";
                                echo "<script>alert('Something went wrong, please contact an administrator')</script>";

                            } else if($nbrUsers >1){
                                //$log ="Mail déjà utilisé";
                                echo "<script>alert('Mail déjà utilisé')</script>";

                            } else if ($nbrUsers == 1) {
                                echo '<script>alert("Compte créé avec succès")</script>';

                                //à rétablir si besoin des données utilisateur dans une variable
                                // while($rowUser = $myReturn->fetch()){
                                //     extract($rowUser);
                                //     $success = 1;
                                //     $log = "User created with success";
                                //     $data['id_user'] = intval($rowUser['id_user'], 10);
                                //     $data['nom_user'] = $rowUser['nom_user'];
                                //     $data['prenom_user'] = $rowUser['prenom_user'];
                                // }
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