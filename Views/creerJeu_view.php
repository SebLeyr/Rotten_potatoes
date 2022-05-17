<?php
    session_start();
    include('../Controllers/creerJeu_controller.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rotten potatoes : reviews de jeux vidéos par la communauté pour la communauté</title>
    <link rel="stylesheet" href="./template.css">
    <link rel="stylesheet" href="./creerJeu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&display=swap" rel="stylesheet">
    <meta name="description" content="Rotten potatoes, site communautaire de notation et de review de jeux vidéos, venez vous tenir au courant des dernières actus et partager votre avis !">
</head>
<body>

    <?php
        include('../Views/header.php');
    ?>

    <container>
        <h2>Ajouter un jeu</h2>
        <form id="creaJeu" method="POST" enctype="multipart/form-data">
            <ul>
                <li>
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" maxlength="30" id="nom"/>
                </li>
                <li>
                    <label for="studio">Studio</label>
                    <select id="studio" name="studio">
                        <?= $studioList ?>
                    </select>
                </li>
                <li>
                    <label for="editeur">Editeur</label>
                    <select id="editeur" name="editeur">
                        <?= $editeurList ?>
                    </select>
                </li>
                <li>
                    <label for="date">Date de sortie</label>
                    <input type="date" name="date" id="date"/>
                </li>
                <li>
                    <label for="plateforme">Plateformes</label>
                    <select id="plateforme" name="plateforme">
                        <?= $plateformeList ?>
                    </select>
                    <button id="morePlateformes">+</button>

                    <!-- <select id="plateforme1" name="plateforme1">
                        ?= $plateformeList ?>
                    </select>
                    <button id="morePlateformes1">+</button>

                    <select id="plateforme2" name="plateforme2">
                        ?= $plateformeList ?>
                    </select>
                    <button id="morePlateformes2">+</button>

                    <select id="plateforme3" name="plateforme3">
                        ?= $plateformeList ?>
                    </select>
                    <button id="morePlateformes3">+</button>

                    <select id="plateforme4" name="plateforme4">
                        ?= $plateformeList ?>
                    </select>
                    <button id="morePlateformes4">+</button>

                    <select id="plateforme5" name="plateforme5">
                        ?= $plateformeList ?>
                    </select>
                    <button id="morePlateformes5">+</button> -->
                </li>
                <li>
                    <label for="genre">Genres</label>
                    <select id="genre" name="genre">
                        <?= $genreList ?>
                    </select>
                    <button id="moreGenres">+</button>
                </li>
                <li>
                    <label for="nbrJoueur">Nombre de joueurs</label>
                    <input type="number" name="nbrJoueur" id="nbrJoueur"/>
                </li>
                <li>
                    <label for="resume">Résumé</label>
                    <textarea name="resume" form="creaJeu" id="resume" placeholder="Résumé du jeu..."></textarea>
                </li>
                <li>
                    <label for="jaquette">Jaquette du jeu</label>
                    <input type="file" name="jaquette" accept="image/png, image/jpeg" id="jaquette"/>
                </li>
                <li>
                    <label for="trailer">Trailer</label>
                    <input type="url" name="trailer" pattern="https://.*" id="trailer"/>
                </li>
                <li>
                    <label for="images">Autres images</label>
                    <input type="file" name="images" accept="image/png, image/jpeg" multiple id="images"/>
                    <button id="moreImg">+</button>
                </li>
                <li>
                    <label for="videos">Autres vidéos</label>
                    <input type="url" name="videos" pattern="https://.*" id="videos"/>
                    <button id="moreVid">+</button>
                </li>
                    <p><strong><?php echo $log; ?></strong></p>
                <li>
                    <input type='submit' name='postJeu' value='Ajouter le jeu'>
                </li>
            </ul>
        </form>
    </container>

    <?php
        include('../Views/footer.php    ');
    ?>

    <script src="../Views/Scripts/CreerCompte.js"></script>
    <!-- <script src="./Scripts/multiChoisesForm.js"></script> -->

</body>
</html>
