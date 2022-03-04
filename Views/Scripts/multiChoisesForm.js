//récupération des boutons du formulaire
let plateforme = document.getElementById("plateforme");
let morePlateformes = document.getElementById("morePlateformes");
let plateforme1 = document.querySelector("#plateforme1");
let morePlateformes1 = document.querySelector("#morePlateformes1");
let plateforme2 = document.querySelector("#plateforme2");
let morePlateformes2 = document.querySelector("#morePlateformes2");
let plateforme3 = document.querySelector("#plateforme3");
let morePlateformes3 = document.querySelector("#morePlateformes3");
let plateforme4 = document.querySelector("#plateforme4");
let morePlateformes4 = document.querySelector("#morePlateformes4");
let plateforme5 = document.querySelector("#plateforme5");
let morePlateformes5 = document.querySelector("#morePlateformes5");
// let tabPlateformes = [];
// let moreGenres = document.querySelector("#moreGenres");
// let moreImg = document.querySelector("#moreImg");
// let moreVid = document.querySelector("#moreVid");

//ajout d'une ligne dans le tableau
morePlateformes.addEventListener("click", event=> {
    event.preventDefault();
    morePlateformes.style.display = "none";
    plateforme1.style.display = "block";
    morePlateformes1.style.display = "block"
})

morePlateformes1.addEventListener("click", event=> {
    event.preventDefault();
    morePlateformes1.style.display = "none";
    plateforme2.style.display = "block";
    morePlateformes2.style.display = "block"
})

morePlateformes2.addEventListener("click", event=> {
    event.preventDefault();
    morePlateformes2.style.display = "none";
    plateforme3.style.display = "block";
    morePlateformes3.style.display = "block"
})

morePlateformes3.addEventListener("click", event=> {
    event.preventDefault();
    morePlateformes3.style.display = "none";
    plateforme4.style.display = "block";
    morePlateformes4.style.display = "block"
})

morePlateformes4.addEventListener("click", event=> {
    event.preventDefault();
    morePlateformes4.style.display = "none";
    plateforme5.style.display = "block";
    morePlateformes5.style.display = "block"
})
