<?php
    include('../Utilitaires/connec_bdd.php');
    include('../Models/jeu_model.php');
    $newjeu = new Jeu();
    include('../Models/image_model.php');
    $newimg = new Image();
    include('../Models/video_model.php');
    $newVideo = new Video();
    include('../Models/genre_model.php');
    $newGenre = new Genre();
    include('../Models/plateforme_model.php');
    $newPlateforme = new Plateforme();
    include('../Models/editeur_model.php');
    $newEditeur = new Editeur();
    include('../Models/studio_model.php');
    $newStudio = new Studio();
    include('../Models/appartenir_jeu_img_model.php');
    $appart = new Appartenir();
    include('../Models/contenir_jeu_video_model.php');
    $contient = new Contenir();
    include('../Utilitaires/utilitaires.php');
    $verif = new Outils();

    $url = $_GET['nom'];
    $req = $newjeu->setNom_jeu($url);
    $req = $newjeu->readSingleJeu();
    $donnees = $req->fetch();

    $nom_jeu = $donnees['nom_jeu'];

    $date_sortie = $donnees['date_sortie_jeu'];

    $nbr_joueurs = $donnees['nombre_de_joueurs'];

    $resume = $donnees['resume_jeu'];

    $req2 = $newStudio->setId_studio($donnees['id_studio']);
    $req2 = $newStudio->readSingleStudioById();
    $donnees2 = $req2->fetch();
    $studio = $donnees2['nom_studio'];

    $req2 = $newEditeur->setId_editeur($donnees['id_editeur']);
    $req2 = $newEditeur->readSingleEditeurById();
    $donnees2 = $req2->fetch();
    $editeur = $donnees2['nom_editeur'];

    $req2 = $newjeu->setId_jeu($donnees['id_jeu']);
    $req2 = $newjeu->readPlateformeByIdJeu();
    $donnees2 = $req2->fetch();
    $plateforme = $donnees2['nom_plateforme'];

    $req2 = $newjeu->setId_jeu($donnees['id_jeu']);
    $req2 = $newjeu->readGenreByIdJeu();
    $donnees2 = $req2->fetch();
    $genre = $donnees2['nom_genre'];

    /*$jaquette 
    $trailer
    $images
    $videos*/
?>