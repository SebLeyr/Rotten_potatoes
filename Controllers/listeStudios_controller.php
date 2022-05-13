<?php
    include('../Utilitaires/connec_bdd.php');
    include('../Models/studio_model.php');
    $newStudio = new Studio();

    $liste_studios = "";
    $req = $newStudio->readStudio();
    while ($donnees = $req->fetch()) {
        $liste_studios .= 
                    '<li>
                        <a href="http://localhost/Rotten_potatoes/Views/studio_view.php?nom='.$donnees['nom_studio'].'">'.$donnees['nom_studio'].'</a>
                    </li>';
    }
?>