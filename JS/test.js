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


const logo =document.getElementById('logo_ovalXV');
const menu_burger= document.createElement("div");
const showcase=document.getElementsByClassName('showcase');
const header=document.querySelector("header");

function onClick2()
{
    menu_burger.setAttribute("id","menu_ouvert")
    menu_burger.innerHTML = "<li> <a href='#apropos'>  A Propos </a></li></br> contactez nous</br> connexion </br> fermer";
    menu_burger.style.height= "200px";
    menu_burger.style.backgroundColor="green";
    header.appendChild(menu_burger);
    
   
}

function onClick3()
{
    header.removeChild(menu_burger);
}
const menu_ouvert=document.getElementById('menu_ouvert');


console.log("Kawi");
menu_burger.addEventListener('click',onClick3);

logo.addEventListener('click',onClick2);


