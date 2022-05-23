<?php
    include('../Utilitaires/connec_bdd.php');
    include('../Models/jeu_model.php');
    $newjeu = new Jeu();
    include('../Utilitaires/utilitaires.php');
    $verif = new Outils();

    //affichage des données du jeu présentes en BDD en récupérant le nom présent dans l'url
    $url = $_GET['nom'];
    $req = $newjeu->setNom_jeu($url);
    $req = $newjeu->readSingleJeu();
    $donnees = $req->fetch();

    $nom_jeu = $donnees['nom_jeu'];
    $date_sortie = $donnees['date_sortie_jeu'];
    $nbr_joueurs = $donnees['nombre_de_joueurs'];
    $resume = $donnees['resume_jeu'];

    //utilisation des fonctions read des différents modèles concernés pour récupérer les données requises en BDD

    $req2 = $newjeu->readStudioByGame();
    $donnees2 = $req2->fetch();
    $studio = $donnees2['nom_studio'];

    $req2 = $newjeu->readEditeurByGame();
    $donnees2 = $req2->fetch();
    $editeur = $donnees2['nom_editeur'];

    $req2 = $newjeu->readPlateformeByNomJeu();
    $donnees2 = $req2->fetch();
    $plateforme = $donnees2['nom_plateforme'];

    $req2 = $newjeu->readGenreByNOmJeu();
    $donnees2 = $req2->fetch();
    $genre = $donnees2['nom_genre'];

    $req2 = $newjeu->readImageByNomJeu();
    $donnees2 = $req2->fetch();
    $jaquette = $donnees2['url_img'];

    $req2 = $newjeu->readVideoByNomJeu();
    $donnees2 = $req2->fetch();
    $trailer = $donnees2['nom_video'];

    $req2 = $newjeu->readImageByNomJeu();
    $donnees2 = $req2->fetch();
    $image = $donnees2['url_img'];

    $req2 = $newjeu->readVideoByNomJeu();
    $donnees2 = $req2->fetch();
    $video = $donnees2['nom_video'];

    //affichage du bouton "noter" si utilisateur connecté
    if(isset($_SESSION['id'])) {
        $noter = '<!--<a id="noter">Noter</a>-->
                    <div id="modalNote">
                        <p>Ma note :</p>
                        <div class="notes">
                            <span class="fa fa-star fa-2x" data-value=1></span><span class="fa fa-star fa-2x" data-value=2></span><span class="fa fa-star fa-2x" data-value=3></span><span class="fa fa-star fa-2x" data-value=4></span><span class="fa fa-star fa-2x" data-value=5></span><span class="fa fa-star fa-2x" data-value=6></span><span class="fa fa-star fa-2x" data-value=7></span><span class="fa fa-star fa-2x" data-value=8></span><span class="fa fa-star fa-2x" data-value=9></span><span class="fa fa-star fa-2x" data-value=10></span>
                            <input type="hidden" name="postNote" id="note" value="0">
                        </div>
                    </div>';
    } else {
        $noter ="";
    }
?>