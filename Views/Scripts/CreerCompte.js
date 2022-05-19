//récupérer du background de la modale de création de compte
var crea = document.querySelector("#creaCompte");
var back = crea.style.background;

//récupérer la modale
var modal = document.querySelector("#modalCrea");

//récupérer le bouton d'ouverture de la page
var open = document.getElementById("creaCpt");

//récupérer le bouton de fermeture de la page
var close = document.getElementById("close");

//ouverture de la page avec le bouton
open.addEventListener("click", function() {
    crea.style.display = "flex";
    crea.style.animation = "fadeIn 0.5s";
    modal.style.animation = "slideTop 0.5s";
})

//fermeture de la page avec le bouton
close.addEventListener("click", function() {
    crea.style.animation = "fadeOut 0.5s";
    modal.style.animation = "slideOut 0.5s";
    setTimeout(function() {
        crea.style.display = "none";
    }, 400);
})

//fermeture de la page avec le background
window.addEventListener("click", function(event) {
    if (event.target == crea) {
        crea.style.animation = "fadeOut 0.5s";
        modal.style.animation = "slideOut 0.5s";
        setTimeout(function() {
            crea.style.display = "none";
        }, 400);
    }
})

//clean des formulaires apres submit
// formPlat = document.getElementById("creaPlateforme").reset();
// formGenre = document.getElementById("creaGenre").reset();

//récupérer la page de connexion
var connec = document.querySelector("#connexionCompte");
var backCo = crea.style.background;

//récupérer la modale
var modalCo = document.querySelector("#modalCo");

//récupérer le bouton d'ouverture de la page
var openCo = document.getElementById("connexion");

//récupérer le bouton de fermeture de la page
var closeCo = document.getElementById("closeCo");

//ouverture de la page avec le bouton
openCo.addEventListener("click", function() {
    connec.style.display = "flex";
    connec.style.animation = "fadeIn 0.5s";
    modalCo.style.animation = "slideTop 0.5s";
})

//fermeture de la page avec le bouton
closeCo.addEventListener("click", function() {
    connec.style.animation = "fadeOut 0.5s";
    modalCo.style.animation = "slideOut 0.5s";
    setTimeout(function() {
        connec.style.display = "none";
    }, 400);
})

//fermeture de la page avec le background
window.addEventListener("click", function(event) {
    if (event.target == connec) {
        connec.style.animation = "fadeOut 0.5s";
        modalCo.style.animation = "slideOut 0.5s";
        setTimeout(function() {
            connec.style.display = "none";
        }, 400);
    }
})

//récupérer le bouton d'ouverture de la page
var openCoFromCrea = document.getElementById("connexionCrea");

//ouverture de la modale de connexion depuis la modale de création de compte
openCoFromCrea.addEventListener("click", function() {
    crea.style.animation = "fadeOut 0.5s";
    modal.style.animation = "slideOut 0.5s";
    setTimeout(function() {
        crea.style.display = "none";
    }, 400);
    connec.style.display = "flex";
    connec.style.animation = "fadeIn 0.5s";
    modalCo.style.animation = "slideTop 0.5s";
})