const stars = document.querySelectorAll(".fa-star");
const note = document.querySelector("#note");

//boucle sur les étoiles avec des écouteurs d'evenements
for(star of stars){
    star.addEventListener("mouseover", function(){
        resetStars();
        this.style.color = "orange";

        //ciblage de l'étoile précédente de celle que l'ont survole
        let previousStar = this.previousElementSibling
        //boucle qui cible l'étoile précédente tant qu'il y a des étoiles précédentes derrière 
        //l'étoile sélectionnée et qui applique la couleur
        while(previousStar){
            previousStar.style.color = "orange";
            previousStar = previousStar.previousElementSibling
        }
    });

    // On écoute le clic pour changer la valeur de la note
    star.addEventListener("click", function(){
        note.value = this.dataset.value;
    });

    //on repasse toute sles étoiles en noir lorque que l'on arrêter de survoler
    star.addEventListener("mouseout", function(){
        resetStars(note.value);
    });
}

function resetStars(note = 0){
    for(star of stars){
        if(star.dataset.value > note){
            star.style.color = "black";
        } else{
            star.style.color = "orange";
        }
    }
}
