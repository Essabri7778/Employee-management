import getXhr from "./utilities.js";

let form = document.getElementById("formulaire");
let res = document.getElementById("res");
let nom = document.getElementById("nom");
let description = document.getElementById("description");
let sdescription = document.getElementById("sdescription");
let snom = document.getElementById("snom");
let ajouter = document.getElementById("ajouter");
let title = document.getElementById("title");

listModules();

let etat = "ajouter";

function ajouterModule() {
  let xhr = getXhr();
  xhr.open("POST", "../../controllers/ModuleController.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let resCtr = xhr.responseText;
      if (resCtr == "ok") {
        success.innerHTML = "Ajout effectué avec succes";
        success.hidden = false;
      } else if (resCtr == "error") {
        failed.innerHTML = "Ajout échoué ";
        failed.hidden = false;
      }
      setTimeout(function () {
        failed.hidden = true;
        success.hidden = true;

      }, 3000);
      listModules();
    }
  };
  let data = new FormData(form);
  data.append("action", "ajouter");
  xhr.send(data);
}

let tbody = document.getElementById("listModules");

function listModules() {
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

function afficherMdl(Mdl) {
  tbody.innerHTML = "";
  if (!Array.isArray(Mdl)) {
    Mdl = [Mdl];
  }
  for (let mdl of Mdl) {
    let newmdl = `
      <tr>
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
      </tr>
    `;
    tbody.insertAdjacentHTML("beforeend", newmdl);
  }

  let supp = document.getElementsByClassName("supprimer");
  let sup = Array.from(supp);
  for (let s of sup) {
    s.addEventListener("click", () => {
      supprimerMdl(s.parentElement.parentElement.children[0].textContent);
    });
  }

  let modif = document.getElementsByClassName("modifier");
  let mod = Array.from(modif);
  for (let m of mod) {
    m.addEventListener("click", () => {
      modifierMdl(m.parentElement.parentElement);
    });
  }
}

function supprimerMdl(id) {
  let xhr = getXhr();
  xhr.open("POST", "../../controllers/ModuleController.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let resCtr = xhr.responseText;
      if (resCtr == "ok") {
        success.innerHTML = "Suppression effectuée avec succes";
        success.hidden = false;
      } else if (resCtr == "error") {
        failed.innerHTML = "Suppression échouée";
        failed.hidden = false;
      }
      setTimeout(function () {
        failed.hidden = true;
        success.hidden = true;

      }, 3000);
      listModules();
    }
  };
  let data = new FormData();
  data.append("id", id);
  data.append("action", "supprimer");
  xhr.send(data);
}

function modifierMdl(mdl) {
  etat = "modifier";
  id.value = mdl.children[0].textContent;
  nom.value = mdl.children[1].textContent;
  description.value = mdl.children[2].textContent;
  ajouterText.innerHTML = "Modifier le Module";
  iconAjouter.className = "fas fa-edit";
  title.innerHTML = "Modifier Module";
  // ajouter.removeEventListener("click", ajouterModule);
  // ajouter.addEventListener("click", modifierSubmit);
}

function modifierSubmit() {
  if (validateNom() && validateDescription()){
  let xhr = getXhr();
  xhr.open("POST", "../../controllers/ModuleController.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let resCtr = xhr.responseText;
      if (resCtr == "ok") {
        success.innerHTML = "Modification effectuée avec succes";
        success.hidden = false;
        id.value = "";
        etat = "ajouter";
        // ajouter.removeEventListener("click", modifierSubmit);
        // ajouter.addEventListener("click", ajouterModule);
        ajouterText.innerHTML = "Ajouter un Module";
        title.innerHTML = "Ajouter Module";
        iconAjouter.className = "fas fa-cubes";
      } else if (resCtr == "error") {
        failed.innerHTML = "Modification échouée";
        failed.hidden = false;
      }
      setTimeout(function () {
        failed.hidden = true;
        success.hidden = true;
      }, 3000);
      listModules();
    }
  };
  let data = new FormData(form);
  data.append("id", id.value);
  data.append("action", "modifier");
  xhr.send(data);}
}

let validateNom = function () {
  if (nom.value === "") {
    return false;
  }
  return true;
};

let validateDescription = function () {
  if (description.value === "") {
    return false;
  }
  return true;
};

nom.addEventListener("blur", function (e) {
  if (validateNom() === false) {
    snom.hidden = false;
  } else {
    snom.hidden = true;
  }
});

description.addEventListener("blur", function (e) {
  if (validateDescription() === false) {
    sdescription.hidden = false;
  } else {
    sdescription.hidden = true;
  }
});

form.addEventListener("submit", (e) => {
  e.preventDefault();

  if (validateNom() === true && validateDescription() === true) {
    if (etat === "ajouter") {
      ajouterModule();
    } else {
      modifierSubmit();
    }

    listModules();

    success.innerHTML = `Module ${etat} avec succès`;
    success.hidden = false;
    setTimeout(function () {
      success.hidden = true;
    }, 3000);
  } else {
    failed.innerHTML = `Module non ${etat}`;
    failed.hidden = false;
    setTimeout(function () {
      failed.hidden = true;
    }, 3000);
  }
});

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
