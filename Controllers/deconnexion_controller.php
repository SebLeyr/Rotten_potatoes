<?php

if(isset($_POST['deconnexion'])){
    session_unset();
    session_destroy();
    header("location: ../Views/accueil_view.php");
}
?>