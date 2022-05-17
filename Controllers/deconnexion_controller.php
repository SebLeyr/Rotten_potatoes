<?php
//destruction des varriables de session et redirection vers l'acceuil lors de la déconnexion
if(isset($_POST['deconnexion'])){
    session_unset();
    session_destroy();
    header("location: ../Views/accueil_view.php");
}
?>