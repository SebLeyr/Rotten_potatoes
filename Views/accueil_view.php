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
        <div class="container">
            <div class="titre">
                <h2>Les nouvelles sorties</h2>
                <a href="">Tout voir</a>
            </div>
            <!--carousel nouvelle sorties-->
            <div class="carousel">
                <!--boutton précédent-->
                <!-- <div class="precedent" onclick="changeslide(-1)">&#10094;</div> -->
                <div class="slide">
                    <img class="cover" src="./image/ex nouv sortie.jpg">
                    <div class="note">
                        <img class="imgNote" src="../images/potatoe.png">
                        <p>note</p>
                    </div>
                    <a href="./old views/Jeu.html">Sable</a>
                </div>

                <div class="slide">
                    <img class="cover" src="./image/Icarus.jpg">
                    <div class="note">
                        <img class="imgNote" src="../images/potatoe.png">
                        <p>note</p>
                    </div>
                    <a href="./Jeu.html">Icarus</a>
                </div>

                <div class="slide">
                    <img class="cover" src="./image/death stranding.jpg">
                    <div class="note">
                        <img class="imgNote" src="./image/potatoe.png">
                        <p>note</p>
                    </div>
                    <a href="./Jeu.html">Death Stranding</a>
                </div>

                <div class="slide">
                    <img class="cover" src="./image/Halo_Infinite.png">
                    <div class="note">
                        <img class="imgNote" src="./image/potatoe.png">
                        <p>note</p>
                    </div>
                    <a href="./Jeu.html">Halo infinite</a>
                </div>

                <div class="slide">
                    <img class="cover" src="./image/Solar_Ash.jpg">
                    <div class="note">
                        <img class="imgNote" src="./image/potatoe.png">
                        <p>note</p>
                    </div>
                    <a href="./Jeu.html">Solar ash</a>
                </div>

                <div class="slide">
                    <img class="cover" src="./image/The_Gunk.jpg">
                    <div class="note">
                        <img class="imgNote" src="./image/potatoe.png">
                        <p>note</p>
                    </div>
                    <a href="./Jeu.html">The Gunk</a>
                </div>

                <div class="slide">
                    <img class="cover" src="./image/Final_Fantasy_XIV_Endwalker.jpg">
                    <div class="note">
                        <img class="imgNote" src="./image/potatoe.png">
                        <p>note</p>
                    </div>
                    <a href="./Jeu.html">Final Fantasy XIV: Endwalker</a>
                </div>
                <!--boutton suivant-->
                <!-- <div class="suivant" onclick="changeslide(1)">&#10095;</div> -->
            </div>
        </div>
        <div class="container">
            <div class="titre">
                <h2>Prochainement</h2>
                <a href="">Tout voir</a>
            </div>
            <div class="carousel">
                <div>
                    <img class="cover" src="./image/ex proch.jpg">
                    <p class="date">28 Octobre 2021</p>
                    <a href="">Age of empire IV</a>
                </div>
            </div>
        </div>
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
    </div>
    <?php
        include('../Views/footer.php');
    ?>
    <script src="../Views/Scripts/CreerCompte.js"></script>
    <script src="carousel.js"></script>
</body>
</html>