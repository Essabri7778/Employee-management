import { populateModuleList,populateTableAndFormModuleOfEtudiant} from "./AffectationEtdModuleHelpers.js";
import getXhr from "./utilities.js";


//
function InitializeForm() {
    let xhr = getXhr();
    xhr.open("POST","../../controllers/ModuleController.php",true);
    xhr.addEventListener("readystatechange",function(){
        console.log(xhr.readyState+' '+xhr.status);
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

function InitializeTable() {
    let xhr = getXhr();
    xhr.open("POST","../../controllers/AffectationEtudiantModuleController.php",true);
    xhr.addEventListener("readystatechange",function(){
        console.log(xhr.readyState+' '+xhr.status);
        if (xhr.readyState == 4 && xhr.status == 200) {
            let res = xhr.responseText;
            console.log(res);
            let obj = JSON.parse(res);
            document.getElementById("listStudent").innerHTML = populateTableAndFormModuleOfEtudiant(obj);
        }
    });
    let data = new FormData();
    data.append("action","afficher");
    xhr.send(data)
}
InitializeTable();