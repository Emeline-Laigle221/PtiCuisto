const categorieContainer = document.querySelector(".categorie-container");
const titreContainer = document.querySelector(".titre-container");
const ingredientContainer = document.querySelector(".ingredient-container");
const categorieTriggers = document.querySelectorAll(".categorie");
const titreTriggers = document.querySelectorAll(".titre");
const ingredientTriggers = document.querySelectorAll(".ingredient");
const entree = document.getElementById("entree");
const plats = document.getElementById("plats");
const dessert = document.getElementById("dessert");
const VCategorie = document.getElementById("valider-categorie");
const titre = document.getElementById("titre");
const VTitre = document.getElementById("valider-titre");
const VIngredient = document.getElementById("valider-ingredients");

categorieTriggers.forEach(trigger =>
    trigger.addEventListener("click", ()=>{
        categorieContainer.classList.toggle("active");
    })
);

titreTriggers.forEach(trigger =>
    trigger.addEventListener("click", ()=>{
        titreContainer.classList.toggle("active");
    })
);

ingredientTriggers.forEach(trigger =>
    trigger.addEventListener("click", ()=>{
        ingredientContainer.classList.toggle("active");
    })
);

VCategorie.addEventListener("click", ()=>{
    localStorage.setItem('entree', entree.checked);
    localStorage.setItem('plats', plats.checked);
    localStorage.setItem('dessert', dessert.checked);
});

VTitre.addEventListener("click", ()=>{
    localStorage.setItem('titre', titre.value);
});

