<?php
    include('../Utilitaires/connec_bdd.php');
    include('../Models/jeu_model.php');
    $newjeu = new Jeu();
    include('../Models/editeur_model.php');
    $newEditeur = new Editeur();
    include('../Models/studio_model.php');
    $newStudio = new Studio();
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

    $req2 = $newjeu->readGenreByIdJeu();
    $donnees2 = $req2->fetch();
    $genre = $donnees2['nom_genre'];

    $req2 = $newjeu->readImageByIdJeu();
    $donnees2 = $req2->fetch();
    $jaquette = $donnees2['url_img'];

    $req2 = $newjeu->readVideoByIdJeu();
    $donnees2 = $req2->fetch();
    $trailer = $donnees2['nom_video'];

    $req2 = $newjeu->readImageByIdJeu();
    $donnees2 = $req2->fetch();
    $image = $donnees2['url_img'];

    $req2 = $newjeu->readVideoByIdJeu();
    $donnees2 = $req2->fetch();
    $video = $donnees2['nom_video'];
?>