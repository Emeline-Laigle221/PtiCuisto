const burger = document.getElementById("burger");
const menu = document.getElementById("menuPortable");
menu.classList.add('burger-hidden');

burger.addEventListener('click', () =>{
    menu.classList.toggle('burger-hidden');
    menu.classList.toggle('menuPortable');
});