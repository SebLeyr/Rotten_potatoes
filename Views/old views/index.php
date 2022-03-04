<?php
// si on clique sur un lien : "index.php?p=*", on récupère le nom de la page recherchée dans $p
if (isset($_GET['p'])) {
    $p = $_GET['p'];
} 
//si aucun paramètre, la page home est chargée par défaut
else {
    $p = 'accueil';
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
//si pas de paramètre id, ben voilà
else {
    $id = '';
} //écrire le lien : "index.php?p=sujet&id=5"

ob_start();

include('../Utilitaires/connec_bdd.php');
include('../Utilitaires/utilitaires.php');

    //démarrage de session
    session_start();

        //vérification connexion
        //à compléter !!

        //sauvegarde du terme recherché
    if (isset($_POST['search'])){
        $_SESSION['recherche'] = $_POST['search'];
    }

//on appelle les controlers
include('Controlers/connexion_controler.php');
include('Controlers/deconnexion_controler.php');
require ('../Controllers/'.$p.'_controler.php');

//qu'on stocke dans le $content avant d'être effacé
$content = ob_get_clean();


//on appelle le template, qui remplacera $content par la vue obtenue par le controler
require '../Views/mainPage.php';
?>