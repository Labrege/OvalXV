/*const elt=document.getElementById('offres');
const elt2=document.querySelector("h1");

function onClick(){
    elt2.innerHTML = "C'est cliqué !";
                  // On change le contenu de notre élément pour afficher "C'est cliqué !"
    elt.style.backgroundColor="#000";
}
console.log("Kiwi");
elt.addEventListener('click',onClick);

elt2.addEventListener('click',onClick);

const titres_blanc= document.getElementsByClassName('titre-fblanc');
const titre_apropos = titres_blanc[0];*/

/*
elt.addEventListener('click',function(){titre_apropos.style.backgroundColor="000";});
console.log("Kawi");*/


/*var test= document.getElementById("apropos");
test.innerHTML=" test java";*/

//selection d'un element du document
let htlm_menu="<div id=\"enxtention_burger\"> <ul class='liste_burger'><li> <a href='#apropos'>  A Propos </a></li><li> <a href='#offres'> Nos Offres </a></li><li> <a href='#reseaux-fond'> Contactez-nous </a></li><li> <a href='login.php' target='_blank'> Connexion </a></li></div>"
let image_croix_menu="https://img.icons8.com/ios/100/000000/circled-x.png"
let image_burger_menu="https://img.icons8.com/ultraviolet/120/000000/menu--v1.png"

const logo =document.getElementById('logo_ovalXV');
//const showcase=document.getElementsByClassName('showcase');
const header=document.querySelector("header");
const bouton_burger=document.querySelector('.icone_burger');
const bouton_ovrt_fermer=document.querySelector("#container_icone_burger img")
const container_button_burger=document.getElementById('container_icone_burger');


const icone_croix=document.getElementById('icone_croix');
const liste1=document.querySelector("li")
//creation d'une div
const menu_burger= document.createElement("div");

function onClick2()
{
    menu_burger.innerHTML = htlm_menu;
    container_button_burger.innerHTML=image_burger_menu;
    header.appendChild(menu_burger);
}

function onClick3()
{
    header.removeChild(menu_burger);
    container_button_burger.innerHTML=image_burger_menu;
}

console.log(bouton_burger);

if(bouton_burger!=null)
{console.log("bouton burger");
bouton_ovrt_fermer.addEventListener('click',onClick3);}


console.log(icone_croix);

if(icone_croix!=null)
{console.log("bouton croix");
    bouton_ovrt_fermer.addEventListener('click',onClick2);
    //
}

liste1.addEventListener('click',onClick3);