import getXhr from "./utilities.js";
import populateEtudiantTable from "./helpers.js";


let form = document.getElementById("formulaire");
form.addEventListener("submit", addEtudiant);

function addEtudiant(e) {
    e.preventDefault();
    let xhr = getXhr();
    xhr.open("POST","../../controllers/EtudiantController.php",true);
    xhr.addEventListener("readystatechange",function(){
        console.log(xhr.readyState+' '+xhr.status);
        if (xhr.readyState == 4 && xhr.status == 200) {
            let res = xhr.responseText;
            console.log(res);
            if(res == "ok"){
                document.getElementById("succes").hidden = false;
                setTimeout(function() {
                    document.getElementById("succes").hidden = true;  
                },5000);
                listAllEtudiants();
            }
            else{
                document.getElementById("failed").hidden = false;
                setTimeout(function() {
                    document.getElementById("failed").hidden = true;  
                },5000);
            }
        }
    });

    let data = new FormData(form);
    data.append("action","ajouter");
    xhr.send(data)
    
}

function listAllEtudiants() {
    let xhr = getXhr();
    xhr.open("POST","../../controllers/EtudiantController.php",true);
    xhr.addEventListener("readystatechange",function(){
        if (xhr.readyState == 4 && xhr.status == 200) {
            let res = xhr.responseText;
            let obj = JSON.parse(res);
            document.getElementById("listStudent").innerHTML = populateEtudiantTable(obj); 
            //TODO: addEventListener selon les ids 
        }
    });
    let data = new FormData();
    data.append("action","afficherTous");
    xhr.send(data);
    
}
listAllEtudiants();

document.addEventListener("click",deleteStudent);
function deleteStudent(e) {
    let id_student = e.target.parentElement.parentElement.children[0].value;
    let xhr = getXhr();
    xhr.open("POST","../../controllers/EtudiantController.php",true);
    xhr.addEventListener("readystatechange",function(){
        if (xhr.readyState == 4 && xhr.status == 200) {
            listAllEtudiants();
        }
        else{
            console.log("operation non effectuer")
        }
    });
    let data = new FormData();
    data.append("action","supprimer");
    data.append("id",id_student);
    xhr.send(data);
}

