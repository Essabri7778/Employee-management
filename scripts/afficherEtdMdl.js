
import getXhr from "./utilities.js";

afficherEtudiantModule();
function afficherEtudiantModule() {
    let xhr = getXhr();
  let listMdl;
  xhr.open("POST", "../../controllers/AffectationEtudiantModuleController.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      listMdl = xhr.response;
      afficherMdl(JSON.parse(listMdl));
    }
  };
  let data = new FormData();
  data.append("action", "populateModuleCard");
  xhr.send(data);
}

function afficherMdl(modules) {
    let modulesCard = document.getElementById("etd_module");
    if (!Array.isArray(modules)) {
      modules = [modules];
    }
    let rows = ``;
    for (let module of modules) {
      let newmdl = `
      <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">${module.nom}</h5>
          <p class="card-text">
          ${module.description}
          </p>
          <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i> Complet</span>
        </div>
      </div>
    </div>`
    
      rows+=newmdl;
    }
    modulesCard.innerHTML = rows;
  }