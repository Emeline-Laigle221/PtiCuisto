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

// Récupérez l'état des cases à cocher depuis le localStorage
const isEntreeChecked = localStorage.getItem('entree') === 'true';
const isPlatsChecked = localStorage.getItem('plats') === 'true';
const isDessertChecked = localStorage.getItem('dessert') === 'true';

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

// Cochez les cases à cocher en fonction de l'état stocké
entree.checked = isEntreeChecked;
plats.checked = isPlatsChecked;
dessert.checked = isDessertChecked;

// Ajoutez des gestionnaires d'événements pour sauvegarder l'état lorsqu'une case à cocher change
entree.addEventListener('change', () => {
    localStorage.setItem('entree', entree.checked);
});
plats.addEventListener('change', () => {
    localStorage.setItem('plats', plats.checked);
});
dessert.addEventListener('change', () => {
    localStorage.setItem('dessert', dessert.checked);
});

// Récupérez la valeur du titre depuis le localStorage
const savedTitre = localStorage.getItem('titre');

// Remplissez le champ de titre avec la valeur sauvegardée
if (savedTitre) {
    titre.value = savedTitre;
}

// Ajoutez un gestionnaire d'événements pour sauvegarder le titre lorsqu'il change
titre.addEventListener('input', () => {
    localStorage.setItem('titre', titre.value);
});