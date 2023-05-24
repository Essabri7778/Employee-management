import { populateModuleList,populateTableModuleOfEtudiant,verifyCheckbox,getIdModulesList,getIdModulesListFromTable,resetPopulateCheckbox} from "./AffectationEtdModuleHelpers.js";
import getXhr from "./utilities.js";


let inputSuccess = document.getElementById('success');
let inputFailed = document.getElementById('failed');
let form = document.getElementById("formulaire");
let id_etudiant = document.getElementById("id_etudiant").name;
console.log(id_etudiant);
let delete_btn = document.getElementById("deleteModules");
let update_btn = document.getElementById("updateModules");
let submit_btn = document.getElementById("ajouter");
let action = "ajouter";

//initialise la liste de checkbox avec les modules existant dans la base de donnée
function InitializeForm() {
    let xhr = getXhr();
    xhr.open("POST","../../controllers/ModuleController.php",true);
    xhr.addEventListener("readystatechange",function(){
        if (xhr.readyState == 4 && xhr.status == 200) {
            let res = xhr.responseText;
            let obj = JSON.parse(res);
            document.getElementById("checkbox-list").innerHTML = populateModuleList(obj);
        }
    });
    let data = new FormData();
    data.append("action","afficherTous");
    xhr.send(data)
}
InitializeForm();

//initialise la tables avec les modules affectées à un etudiant
function InitializeTable() {
    let xhr = getXhr();
    xhr.open("POST","../../controllers/AffectationEtudiantModuleController.php",true);
    xhr.addEventListener("readystatechange",function(){
        if (xhr.readyState == 4 && xhr.status == 200) {
            let res = xhr.responseText;
            let obj = JSON.parse(res);
            if(populateTableModuleOfEtudiant(obj) == ""){
                action="ajouter";
                update_btn.disabled = true ;
                submit_btn.disabled = false;
            }
            else{
                action="modifier";
                update_btn.disabled = false ;
                submit_btn.disabled = true;
                
            }
            document.getElementById("listStudent").innerHTML = populateTableModuleOfEtudiant(obj);
            
        }
    });
    let data = new FormData();
    data.append("action","afficher");
    data.append("id_etd",id_etudiant);
    xhr.send(data);
}
InitializeTable();

//verifier si 6 modules sont cochés puis ajouter les modules
form.addEventListener("submit", function(e){
    e.preventDefault();
    if(action == "ajouter"){
        if(verifyCheckbox()){
            affecterModules();
            inputSuccess.hidden = false;
            inputSuccess.innerHTML= "Modules affectées avec succes";
            setTimeout(function() {
                inputSuccess.hidden = true;  
            },5000);
            resetPopulateCheckbox(false);
        }
        else{
            inputFailed.hidden = false;
            inputFailed.innerHTML= "Veuillez affecté 6 modules";
            setTimeout(function() {
                inputFailed.hidden = true;  
            },5000);
        } 
    }     
    if(action == "modifier"){
        if(verifyCheckbox()){
            updateModules();
            inputSuccess.hidden = false;
            inputSuccess.innerHTML= "Mise à jours affectées avec succes";
            setTimeout(function() {
                inputSuccess.hidden = true;  
            },5000);
            resetPopulateCheckbox(false);
        }
        else{
            inputFailed.hidden = false;
            inputFailed.innerHTML= "Veuillez affecté 6 modules";
            setTimeout(function() {
                inputFailed.hidden = true;  
            },5000);
        }  
    }
    

    
});

//affecter des modules à un étudiant
function affecterModules() {
    let xhr = getXhr();
    xhr.open("POST","../../controllers/AffectationEtudiantModuleController.php",true);
    xhr.addEventListener("readystatechange",function(){
    if (xhr.readyState == 4 && xhr.status == 200) {
        let res = xhr.responseText;
        if(res == "ok"){
            inputSuccess.hidden = false;
            inputSuccess.innerHTML= "Affectation Modules effectuée avec succes";
            setTimeout(function() {
                inputSuccess.hidden = true;  
            },5000);
        }
        
        else{
            inputFailed.hidden = false;
            inputFailed.innerHTML= "Affectation Modules échouée";
            setTimeout(function() {
                document.getElementById("failed").hidden = true;  
            },5000);
        }
        InitializeTable();
    }
    });
    let data = new FormData();
    data.append("action","ajouter");
    data.append("id_etd",id_etudiant);
    data.append("id_modules_list",getIdModulesList());
    xhr.send(data);
    
}


//Supprimer les modules affectées à un étudiant
delete_btn.addEventListener("click",deleteModules);
function deleteModules() {
    let xhr = getXhr();
    xhr.open("POST","../../controllers/AffectationEtudiantModuleController.php",true);
    xhr.addEventListener("readystatechange",function(){
    if (xhr.readyState == 4 && xhr.status == 200) {
        let res = xhr.responseText;
        if(res == "ok"){
            inputSuccess.hidden = false;
            inputSuccess.innerHTML= "Suppression Modules effectuée avec succes";
            setTimeout(function() {
                inputSuccess.hidden = true;  
            },5000);
            
        }
        else{
            inputFailed.hidden = false;
            inputFailed.innerHTML= "Suppression Modules échouée";
            setTimeout(function() {
                inputFailed.hidden = true;  
            },5000);
        }
        resetPopulateCheckbox(false);
        InitializeTable();

    }
    });
    let data = new FormData();
    data.append("action","supprimer");
    data.append("id_etd",id_etudiant);
    xhr.send(data)
    
}

//mettre à jour les modules affectées
update_btn.addEventListener("click",function(){
    resetPopulateCheckbox(true); 
    submit_btn.disabled = false;  
})

function updateModules() {
    let xhr = getXhr();
    xhr.open("POST","../../controllers/AffectationEtudiantModuleController.php",true);
    xhr.addEventListener("readystatechange",function(){
    if (xhr.readyState == 4 && xhr.status == 200) {
        let res = xhr.responseText;
        console.log(res);
        if(res == "ok"){
            inputSuccess.hidden = false;
            inputSuccess.innerHTML= "Mise à jour effectuée avec succes";
            setTimeout(function() {
                inputSuccess.hidden = true;  
            },5000);
            
        }
        else{
            inputFailed.hidden = false;
            inputFailed.innerHTML= "Mise à jour échouée";
            setTimeout(function() {
                inputFailed.hidden = true;  
            },5000);
        }
        InitializeTable();
    }
    });
    let data = new FormData();
    data.append("action","modifier");
    data.append("id_etd",id_etudiant);
    data.append("id_modules_list",getIdModulesList());
    data.append("id_old_modules_list",getIdModulesListFromTable());
    xhr.send(data);
}