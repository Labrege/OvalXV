

//Boutton pour ajouter une section
const btnSections = document.querySelector("#btn-sections");

//Si btn ajouter section est cliqué
btnSections.addEventListener('click', onClick);

//Création d'un id unique pour la section
idSection = 1;
idExo = 1;

//fonction qui rajoute une section
function onClick()
{
    var sectionsContainer = document.querySelector(".section");
    idSection+=1;
    sectionsContainer.insertAdjacentHTML('beforeend', "<div id='section-"+idSection+"' class='section section-"+idSection+"'> <div id='section-"+idSection+"-header' class='section-header'><input type='text' placeholder='Nom de la Section' class='titre-section' value='titre-section-"+idSection+"'><input type='text' placeholder='effectif' value='effectif-section-"+idSection+"'> <button id='"+idSection+"' class='addExo' onClick='append_section(this.id)'> + </button><button id='"+idSection+"' class='supprSection' onClick='remove_section(this.id)'> <i class='fa fa-trash' ariria-hidden='true'></i> </button> </div><div id='section-exo-"+idSection+"' class='section-exo section-exo-"+idSection+"'></div></div>");
}

//fonction qui rajoute un exo
function append_section(clicked_id)
{
    console.log(clicked_id);
        const sectionExo = document.getElementById('section-exo-'+clicked_id+'');
        sectionExo.insertAdjacentHTML('beforeend',"<div id='exo-"+idExo+"' class='exo'> <input type='text' placeholder='Affecter une vidéo !'> </input>  <input type='text' placeholder='Temps exo'> </input> <button id='"+idExo+"' class='supprExo' onClick='remove_exo(this.id)'><i class='fa fa-trash' ariria-hidden='true'></i></button></div>");
        idExo+=1;
}

//fonction qui enleve la section
function remove_section(clicked_id)
{
    const sectionTitre = document.getElementById("section-"+clicked_id);
    if (clicked_id!=1){
        setTimeout(function(){sectionTitre.parentNode.removeChild(sectionTitre);}, 100);
    }
}

//fonction qui enleve l'exo
function remove_exo(clicked_id)
{
    const exo = document.getElementById('exo-'+clicked_id);
    exo.parentNode.removeChild(exo);
}


function pwdLength($pwd){
    $result;
    if (strlen($pwd) >= 8) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}