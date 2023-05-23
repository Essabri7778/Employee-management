import getXhr from "./utilities.js";

populateCards();

function populateCards() {
  let xhr = getXhr();
  let listMdl;
  xhr.open("POST", "../../controllers/ModuleController.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      listMdl = xhr.response;
      afficherMdl(JSON.parse(listMdl));
    }
  };
  let data = new FormData();
  data.append("action", "afficherTous");
  xhr.send(data);
}

function afficherMdl(modules) {
  let modulesCard = document.getElementById("modules");
  modulesCard.innerHTML = "";
  if (!Array.isArray(modules)) {
    modules = [modules];
  }
  for (let module of modules) {
    let newmdl = `
    <div class="col">
        <div class="card">
             <div class="card-body">
                 <h5 class="card-title">${module.nom}</h5>
                 <p class="card-text">
                ${module.description}
                </p>
            </div>
        </div>
    </div>`;
    modulesCard.insertAdjacentHTML("beforeend", newmdl);
  }
}

// Search Form

let searchForm = document.getElementById("chercheForm");

searchForm.addEventListener("submit", searchModule);

function searchModule(e) {
  e.preventDefault();
  let xhr = getXhr();
  xhr.open("POST", "../../controllers/ModuleController.php", true);
  xhr.addEventListener("readystatechange", function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let res = xhr.responseText;
      afficherMdl(JSON.parse(res));
    }
  });

  let data = new FormData(searchForm);
  data.append("action", "chercher");
  xhr.send(data);
}
