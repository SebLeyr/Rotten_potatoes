<?php
    include('../Utilitaires/connec_bdd.php');
    include('../Models/jeu_model.php');
    $newjeu = new Jeu();
    include('../Models/image_model.php');
    $newimg = new Image();
    include('../Models/video_model.php');
    $newVideo = new Video();
    include('../Models/genre_model.php');
    $genreForm = new Genre();
    include('../Models/plateforme_model.php');
    $plateformeForm = new Plateforme();
    include('../Models/editeur_model.php');
    $editeurForm = new Editeur();
    include('../Models/studio_model.php');
    $studioForm = new Studio();
    include('../Models/appartenir_jeu_img_model.php');
    $appart = new Appartenir();
    include('../Models/associer_jeu_genre_model.php');
    $assos = new Associer();
    include('../Models/distribuer_jeu_plateforme_model.php');
    $distrib = new Distribuer();
    include('../Utilitaires/utilitaires.php');
    $verif = new Outils();

    //récupération de la liste des champs concernés
    $studioList = "";
    $req = $studioForm->readStudio();
    while($donnees = $req->fetch()) {
        $studioList .= "<option value='".$donnees['nom_studio']."'>".$donnees['nom_studio']."</option>";
    }

    $editeurList = "";
    $req = $editeurForm->readEditeur();
    while($donnees = $req->fetch()) {
        $editeurList .= "<option value='".$donnees['nom_editeur']."'>".$donnees['nom_editeur']."</option>";
    }

    $plateformeList = "";
    $req = $plateformeForm->readPlateforme();
    while($donnees = $req->fetch()) {
        $plateformeList .= "<option value='".$donnees['nom_plateforme']."'>".$donnees['nom_plateforme']."</option>";
    }

    $genreList = "";
    $req = $genreForm->readGenre();
    while($donnees = $req->fetch()) {
        $genreList .= "<option value='".$donnees['nom_genre']."'>".$donnees['nom_genre']."</option>";
    }

    //vérification présence champs
    if(isset($_POST['nom']) && 
        isset($_POST['studio']) && 
        isset($_POST['editeur']) && 
        isset($_POST['date']) &&
        isset($_POST['plateforme']) &&
        isset($_POST['genre']) &&
        isset($_POST['nbrJoueur']) &&
        isset($_POST['resume']) && 
        isset($_FILE['jaquette']) &&
        isset($_POST['trailer']) &&
        isset($_POST['images']) &&
        isset($_POST['videos'])) {

            //stockage des valeur avec vérification (suppression des caractères spéciaux, slashs, espaces)
            $nom = $verif->valid_donnees($_POST['nom']);
            $date = $verif->valid_donnees($_POST['date']);
            $nbrJoueur = $verif->valid_donnees($_POST['nbrJoueur']);
            $resume = $verif->valid_donnees($_POST['resume']);
            $trailer = $verif->valid_donnees($_POST['trailer']);
            $videos = $verif->valid_donnees($_POST['videos']);
            //paramètres des images
            $tmpNomJqt = $_FILES['jaquette']['tmp_name'];
            $nomJqt = $_FILES['jaquette']['name'];
            $tailleJqt = $_FILES['jaquette']['size'];
            $tmpNomImg = $_FILES['images']['tmp_name'];
            $nomImg = $_FILES['images']['name'];
            $tailleImg = $_FILES['images']['size'];

            //insertion en BDD
            try {
                //insertion du jeu
                $newjeu->setNom_jeu($nom);
                $newjeu->setId_studio($studio);
                $newjeu->setId_editeur($editeur);
                $newjeu->setDate_sortie_jeu($date);
                $newjeu->setNombre_de_joueurs($nbrJoueur);
                $newjeu->setResume_jeu($resume);

                $req = $jeu->createJeu();

                //insertion association distribuer(jeu/plateforme)
                $distrib->setId_jeu($newjeu->connect->lastInsertId());
                $distrib->setId_plateforme($plateforme);

                $req = $distrib->createDistrib();

                //insertion association associer(jeu/genre)
                $assos->setId_jeu($newjeu->connect->lastInsertId()());
                $assos->setId_genre($genre);

                $req = $distrib->createDistrib();

                //insertion jaquette
                $newimg->setUrl_img($nomJaqt);

                $req = $newimg->createImage();

                //insertion association appartenir(jeu/image)
                $appart->setId_jeu($newjeu->connect->lastInsertId());
                $appart->setId_img($newimg->connect->lastInsertId());

                $req = $appart->createAppart();

                //insertion trailer
                $newVideo->setNom_video($trailer);
                $newVideo->createVideo();
                
                //insertion image
                //insertion videos

                header("location: ../Views/creerJeu_view.php");

            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }
?>