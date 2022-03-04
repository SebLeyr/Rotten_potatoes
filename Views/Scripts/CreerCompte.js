//récupérer la page de connexion
var crea = document.querySelector(".modal");

var back = crea.style.background;
//récupérer la modale
var modal = document.querySelector(".modal-container");

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