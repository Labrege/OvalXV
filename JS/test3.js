const menuIcon=document.querySelector('.hamburger-menu');
const navbar=document.querySelector(".navbar");
const navlist=document.querySelector(".navlist");
const header=document.querySelector("#sommaire");
const rest=document.querySelector('body');

menuIcon.addEventListener('click', onClick);

function onClick()
{
    menuIcon.classList.toggle('change');
    rest.classList.toggle('noScroll');
    navbar.classList.toggle('change');
    navlist.classList.toggle('scroll');
}
