import getXhr from "./utilities.js"

let form = document.getElementById("formulaire");
let res = document.getElementById("res");

form.addEventListener("submit",(e)=>{
    e.preventDefault(e);
    ajouterModule();
    listModules();
});

listModules();

function ajouterModule(){
    let xhr = getXhr();
    xhr.open("POST", "../../controllers/ModuleController.php", true);
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            res.hidden=false;
            res.innerHTML=xhr.responseText;
            listModules();
        }
    }

    let data = new FormData(form);
    data.append("action","ajouter");
    xhr.send(data);
    form.reset();
}

let tbody = document.getElementById("listModules");

function listModules(){
    let xhr = getXhr();
    let listMdl;
    xhr.open("Post", "../../controllers/ModuleController.php", true);
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            listMdl = xhr.response;
            afficherMdl(JSON.parse(listMdl));
        }
    }
    let data = new FormData();
    data.append("action","afficherTous");
    xhr.send(data);
}


function afficherMdl(Mdl){
    tbody.innerHTML="";
    for(let mdl of Mdl){
        let newmdl = `<tr>
        <td scope="row">${mdl.id}</td>
        <td>${mdl.nom}</td>
        <td>${mdl.description}</td>
        <td class="justify-content-center">
        <button class="btn btn-light btn-outline-secondary mx-1 modifier">
          <i class="fas fa-pencil-alt"></i> Modifier
        </button>
        <button class="btn btn-danger supprimer">
          <i class="fas fa-trash"></i> Supprimer
        </button>
      </td>

    </tr>`
        tbody.insertAdjacentHTML("beforeend",newmdl);
    }
    let supp=document.getElementsByClassName("supprimer");
    let sup = Array.from(supp);
    console.log(sup);
    for(let s of sup){
        s.addEventListener("click",()=>{
        supprimerMdl(s.parentElement.parentElement.children[0].textContent);
    });
    }
    let modif=document.getElementsByClassName("modifier");
    let mod = Array.from(modif);
    for(let m of mod){
        m.addEventListener("click",()=>{
        modifierMdl(m.parentElement.parentElement);
    });
    }
}

function supprimerMdl(id){
    let xhr = getXhr();
    xhr.open("Post", "../../controllers/ModuleController.php", true);
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            res.hidden=false;
            res.innerHTML=xhr.responseText;
            listModules();
        }
    }
    let data = new FormData();
    data.append("id",id);
    data.append("action","supprimer");
    xhr.send(data);
}


function modifierMdl(mdl){
    nom.value=mdl.children[1].textContent;
    description.value=mdl.children[2].textContent;
    document.getElementById("ajouter").innerHTML="Modifier";
    document.getElementById("ajouter").addEventListener("click",()=>{
        let xhr = getXhr();
        xhr.open("Post", "../../controllers/ModuleController.php", true);
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                document.getElementById("ajouter").innerHTML="Ajouter";
                res.hidden=false;
                res.innerHTML=xhr.responseText;
                listModules();
            }
        }
        let data = new FormData(form);
        data.append("id",etd.children[0].textContent);
        data.append("action","modifier");
        xhr.send(data);
    })
}