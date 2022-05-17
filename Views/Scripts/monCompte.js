//background modales
let modalBPseudo = document.getElementById("modalBPseudo");
let modalBMail = document.getElementById("modalBMail");
let modalBPassword = document.getElementById("modalBPassword");
let modalBDelete = document.getElementById("modalBDelete");
//modales
let modalPseudo = document.getElementById("modalPseudo");
let modalMail = document.getElementById("modalMail");
let modalPassword = document.getElementById("modalPassword");
let modalDelete = document.getElementById("modalDelete");
//boutons ouverture modales
let btnModifyPseudo = document.getElementById("btnModifyPseudo");
let btnModifyMail = document.getElementById("btnModifyMail");
let btnModifyPassword = document.getElementById("btnModifyPassword");
let btnDelete = document.getElementById("btnDelete");
//bouton fermeture
let closePseudo = document.getElementById("closePseudo");
let closeMail = document.getElementById("closeMail");
let closePassword = document.getElementById("closePassword");
let closeDelete = document.getElementById("closeDelete");

//modalPseudo
//ouverture de la page avec le bouton
btnModifyPseudo.addEventListener("click", function() {
    modalBPseudo.style.display = "flex";
    modalBPseudo.style.animation = "fadeIn 0.5s";
    modalPseudo.style.animation = "slideTop 0.5s";
})

//fermeture de la page avec le bouton
closePseudo.addEventListener("click", function() {
    modalBPseudo.style.animation = "fadeOut 0.5s";
    modalPseudo.style.animation = "slideOut 0.5s";
    setTimeout(function() {
        modalBPseudo.style.display = "none";
    }, 400);
})

//fermeture de la page avec le background
window.addEventListener("click", function(event) {
    if (event.target == modalBPseudo) {
        modalBPseudo.style.animation = "fadeOut 0.5s";
        modalPseudo.style.animation = "slideOut 0.5s";
        setTimeout(function() {
            modalBPseudo.style.display = "none";
        }, 400);
    }
})

//modalMail
//ouverture de la page avec le bouton
btnModifyMail.addEventListener("click", function() {
    modalBMail.style.display = "flex";
    modalBMail.style.animation = "fadeIn 0.5s";
    modalMail.style.animation = "slideTop 0.5s";
})

//fermeture de la page avec le bouton
closeMail.addEventListener("click", function() {
    modalBMail.style.animation = "fadeOut 0.5s";
    modalMail.style.animation = "slideOut 0.5s";
    setTimeout(function() {
        modalBMail.style.display = "none";
    }, 400);
})

//fermeture de la page avec le background
window.addEventListener("click", function(event) {
    if (event.target == modalBMail) {
        modalBMail.style.animation = "fadeOut 0.5s";
        modalMail.style.animation = "slideOut 0.5s";
        setTimeout(function() {
            modalBMail.style.display = "none";
        }, 400);
    }
})

//modalPassword
//ouverture de la page avec le bouton
btnModifyPassword.addEventListener("click", function() {
    modalBPassword.style.display = "flex";
    modalBPassword.style.animation = "fadeIn 0.5s";
    modalPassword.style.animation = "slideTop 0.5s";
})

//fermeture de la page avec le bouton
closePassword.addEventListener("click", function() {
    modalBPassword.style.animation = "fadeOut 0.5s";
    modalPassword.style.animation = "slideOut 0.5s";
    setTimeout(function() {
        modalBPassword.style.display = "none";
    }, 400);
})

//fermeture de la page avec le background
window.addEventListener("click", function(event) {
    if (event.target == modalBPassword) {
        modalBPassword.style.animation = "fadeOut 0.5s";
        modalPassword.style.animation = "slideOut 0.5s";
        setTimeout(function() {
            modalBPassword.style.display = "none";
        }, 400);
    }
})

//modalDelete
//ouverture de la page avec le bouton
btnDelete.addEventListener("click", function() {
    modalBDelete.style.display = "flex";
    modalBDelete.style.animation = "fadeIn 0.5s";
    modalDelete.style.animation = "slideTop 0.5s";
})

//fermeture de la page avec le bouton
closeDelete.addEventListener("click", function() {
    modalBDelete.style.animation = "fadeOut 0.5s";
    modalDelete.style.animation = "slideOut 0.5s";
    setTimeout(function() {
        modalBDelete.style.display = "none";
    }, 400);
})

//fermeture de la page avec le background
window.addEventListener("click", function(event) {
    if (event.target == modalBDelete) {
        modalBDelete.style.animation = "fadeOut 0.5s";
        modalDelete.style.animation = "slideOut 0.5s";
        setTimeout(function() {
            modalBDelete.style.display = "none";
        }, 400);
    }
})