<?php
    session_start();
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rotten potatoes : reviews de jeux vidéos par la communauté pour la communauté</title>
    <link rel="stylesheet" href="./template.css">
    <link rel="stylesheet" href="./accueil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&display=swap" rel="stylesheet">
    <meta name="description" content="Rotten potatoes, site communautaire de notation et de review de jeux vidéos, venez vous tenir au courant des dernières actus et partager votre avis !">
</head>

<body>
    <?php
        include('../Views/header.php');
    ?>
    <div id="Container">
        <div class="containerList">
            <div class="titre">
                <h2>Les plus populaires</h2>
                <a href="">Tout voir</a>
            </div>
            <ul>
                <li>
                    <p>lien jeu populaire</p>
                    <img class="imgNote" src="./image/potatoe.png">
                </li>
                <li>
                    <p>lien jeu populaire2</p>
                    <img class="imgNote" src="./image/potatoe.png">
                </li>
                <li>
                    <p>lien jeu populaire3</p>
                    <img class="imgNote" src="./image/potatoe.png">
                </li>
                <li>
                    <p>lien jeu populaire4</p>
                    <img class="imgNote" src="./image/potatoe.png">
                </li>
                <li>
                    <p>lien jeu populaire5</p>
                    <img class="imgNote" src="./image/potatoe.png">
                </li>
            </ul>
        </div>
        <div class="jeu">
            <div class="videoYT">
                <iframe width="2544" height="1132" src="https://www.youtube.com/embed/a0evJUp7-aw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div id="blocJeu">
                <img class="cover" src="./image/ex nouv sortie.jpg">
                <div class="description">
                    <ul>
                        <li>Sable</li>
                        <li>
                            <div class="note">
                                <img class="imgNote" src="./image/potatoe.png">
                                <p>note</p>
                            </div>
                        </li>
                        <li>Studio : <a href="./Studio.html">Shedworks</a></li>
                        <li>Éditeur : </li>
                        <li>Date de sortie : </li>
                        <li>Plateformes : </li>
                        <!--prix par plateforme-->
                        <li>Genre : </li>
                        <li>multijoueurs : </li>
                        <li>Nombre de joueurs : </li>
                        <!--lien wiki-->
                    </ul>
                </div>
            </div>
            <div>
                <h2 class="catégorie">Résumé</h2>
                <p>Embarquez pour un inoubliable voyage en incarnant Sable au cours de sa quête initiatique, qui la conduira dans des déserts immenses et des paysages fascinants ornés de carcasses de vaisseaux spatiaux et de vestiges de merveilles d'un lointain passé.<br/>
                    <br/>
                    Explorez les dunes sur votre aérocycle, gravissez des ruines monumentales et croisez d'autres nomades, tout en découvrant les mystères enfouis de ce monde et en apprenant qui Sable est vraiment derrière son masque.<br/>
                    <br/>
                    Plongez dans le monde de Sable et explorez-le à votre guise, en profitant de sa direction artistique unique et de sa bande originale composée par Japanese Breakfast. Ses secrets n'attendent que d'être découverts. Plongez sans crainte dans cet univers.
                </p>
            </div>
            <div>
                <h2 class="catégorie">Vidéos</h2>
                <div class="carousel">
                    <iframe width="2544" height="1132" src="https://www.youtube.com/embed/Fojy_YRseGk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div>
                <h2 class="catégorie">Photos</h2>
                <div class="carousel">
                    <img src="./image/sable.jpg">
                </div>
            </div>
        </div>
    </div>
    <?php
        include('../Views/footer.php');
    ?>
    <script src="../Views/Scripts/CreerCompte.js"></script>
    <!--<script src="carousel.js"></script>-->
</body>
</html>