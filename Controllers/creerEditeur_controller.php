<?php
    include('../Utilitaires/connec_bdd.php');
    include('../Models/editeur_model.php');
    $newEditeur = new Editeur();
    include('../Utilitaires/utilitaires.php');
    $verif = new Outils();
    
    if(isset($_POST['nomEditeur'])) {
        //stockage des valeur avec vérification (suppression des caractères spéciaux, slashs, espaces)
        $nomEditeur = $verif->valid_donnees($_POST['nomEditeur']);

        //insertion en BDD
        try{
            //insertion de l'éditeur
            $newEditeur->setNom_editeur($nomEditeur);
            $req = $newEditeur->createEditeur();

            header("location: ../Views/creerEditeur_view.php");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
?>