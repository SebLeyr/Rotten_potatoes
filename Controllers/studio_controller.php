<?php
    include('../Utilitaires/connec_bdd.php');
    include('../Models/studio_model.php');
    $newStudio = new Studio();

    $url = $_GET['nom'];
    $req = $newStudio->setNom_studio($url);
    $req = $newStudio->readSingleStudio();
    $donnees = $req->fetch();

    $nom_studio = $donnees['nom_studio'];

    $req2 = $newStudio->setId_studio($donnees['id_studio']);
    $req2 = $newStudio->readImageByIdStudio();
    $donnees2 = $req2->fetch();
    $image = $donnees2['url_img'];

    $liste_jeux = "";
    $req2 = $newStudio->readStudioGames();
    while ($donnees2 = $req2->fetch()) {
        $liste_jeux .= 
                    '<li>
                        <a href="http://localhost/Rotten_potatoes/Views/jeu_view.php?nom='.$donnees2['nom_jeu'].'">'.$donnees2['nom_jeu'].'</a>
                        <img class="imgNote" src="./image/potatoe.png">
                    </li>';
    }
?>