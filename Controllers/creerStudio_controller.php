<?php
    include('../Utilitaires/connec_bdd.php');
    include('../Models/studio_model.php');
    $newStudio = new Studio();
    include('../Models/image_model.php');
    $newimg = new Image();
    include('../Models/rattacher_img_studio_model.php');
    $rattacher = new Rattacher();
    include('../Utilitaires/utilitaires.php');
    $verif = new Outils();
    
    if(isset($_POST['nomStudio']) && isset($_FILES['logoStudio'])) {
        //stockage des valeur avec vérification (suppression des caractères spéciaux, slashs, espaces)
        $nomStudio = $verif->valid_donnees($_POST['nomStudio']);
        $tmpNomLogoStudio = $_FILES['logoStudio']['tmp_name'];
        $nomLogoStudio = $_FILES['logoStudio']['name'];
        $tailleLogoStudio = $_FILES['logoStudio']['size'];

        //insertion en BDD
        try{
            //insertion du studio
            $newStudio->setNom_studio($nomStudio);
            $req = $newStudio->createStudio();

            //insertion image
            $newimg->setUrl_img("../images/$nomLogoStudio");
            $req = $newimg->createImage();
            $fichier = move_uploaded_file($tmpNomLogoStudio, "../images/$nomLogoStudio");

            //insertion association rattacher(studio/image)
            $rattacher->setId_studio($newStudio->connect->lastInsertId());
            $rattacher->setId_img($newStudio->connect->lastInsertId());
            $req = $rattacher->createRattacher();

            header("location: ../Views/creerStudio_view.php");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
?>