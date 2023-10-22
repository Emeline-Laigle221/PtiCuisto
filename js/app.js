const categorieContainer = document.querySelector(".categorie-container");
const titreContainer = document.querySelector(".titre-container");
const ingredientContainer = document.querySelector(".ingredient-container");
const categorieTriggers = document.querySelectorAll(".categrie");
const titreTriggers = document.querySelectorAll(".titre");
const ingredientTriggers = document.querySelectorAll(".ingredient");

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