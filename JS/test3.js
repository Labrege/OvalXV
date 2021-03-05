const menuIcon=document.querySelector('.hamburger-menu');
const navbar=document.querySelector(".navbar");
const header=document.querySelector("#sommaire");

menuIcon.addEventListener('click', onClick);
menuIcon.addEventListener('click', onClick2);

function onClick()
{
    navbar.classList.toggle('change');
}

function onClick2()
{
    header.classList.toggle('change');
}