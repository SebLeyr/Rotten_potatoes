<?php
    include('../Utilitaires/connec_bdd.php');
    include('../Models/genre_model.php');
    $genre = new Genre();
    include('../Models/plateforme_model.php');
    $plateforme = new Plateforme();
    include('../Utilitaires/utilitaires.php');
    $verif = new Outils();

    if(isset($_POST['nomPlat'])) {
        //stockage des valeur avec vérification (suppression des caractères spéciaux, slashs, espaces)
        $nomPlat = $verif->valid_donnees($_POST['nomPlat']);

        //insertion en BDD
        try{
            $plateforme->setNom_plateforme($nomPlat);
            $req = $plateforme->createPlateforme();
            header("location: ../Views/creerPlateformeEtGenre_view.php");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    } else if(isset($_POST['nomGenre'])) {
        //stockage des valeur avec vérification (suppression des caractères spéciaux, slashs, espaces)
        $nomGenre = $verif->valid_donnees($_POST['nomGenre']);

        //insertion en BDD
        try{
            $genre->setNom_genre($nomGenre);
            $req = $genre->createGenre();
            header("location: ../Views/creerPlateformeEtGenre_view.php");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
?>