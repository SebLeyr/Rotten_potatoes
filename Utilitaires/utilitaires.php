<?php
class Outils {

    //fonction de récupération de l'url
    public function getUrl(){
        $currentPageUrl = 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        return $currentPageUrl;
    }

    //fonction regroupant trois fonctions de sécurité :  : trim, stripslashes et
    //htmlspecialchars. je m'assure ainsi qu'il n'y ai pas d'espaces ou de caractères spéciaux 
    //dans les champs du formulaire. De cette manière on se protège de toute faille XSS
    public function valid_donnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }
}
?>