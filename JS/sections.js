

//Boutton pour ajouter une section
const btnSections = document.querySelector("#btn-sections");

//Selection de la div contenant toutes les sections
const sectionsContainer = document.querySelector(".sections-container");

//Si btn ajouter section est cliqué
btnSections.addEventListener('click', onClick);

//Création d'un id unique pour la section
idSection = 2;
idExo = 1;

function onClick()
{
    sectionsContainer.innerHTML += "<div id='section-titre-"+idSection+"' class='section-titre section-titre-"+idSection+"'> <div class='section-titre-header'><input type='text' placeholder='Nom de la Section'> <button id='"+idSection+"' class='supprSection' onClick='remove_section(this.id)'> - </button> <button id='"+idSection+"' class='addExo' onClick='append_section(this.id)'> + </button></div><div id='section-exo-"+idSection+"' class='section-exo section-exo-"+idSection+"'></div></div>";
    idSection+=1;
}
 
function append_section(clicked_id)
{
    const sectionExo = document.getElementById("section-exo-"+clicked_id);
    sectionExo.innerHTML += "<div id='exo-"+idExo+"' class='exo' onClick='remove_exo(this.id)'><button> - </button></div>";
    idExo+=1;
}

function remove_section(clicked_id)
{
    const sectionTitre = document.getElementById("section-titre-"+clicked_id);
    if (clicked_id!=1){
        sectionTitre.parentNode.removeChild(sectionTitre);
    }

}

function remove_exo(clicked_id)
{
    console.log(clicked_id);
    const exo = document.getElementById(clicked_id);
    exo.parentNode.removeChild(exo);
}