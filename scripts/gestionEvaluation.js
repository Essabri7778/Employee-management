import getXhr from "./utilities.js";

let form = document.getElementById("formulaire");
let res = document.getElementById("res");
let type = document.getElementById("type");
let date = document.getElementById("date");
let heure = document.getElementById("heure");
let salle = document.getElementById("salle");
let ajouter = document.getElementById("ajouter");
let modules = document.getElementById("module");
let ssalle = document.getElementById("ssalle");
let sdate = document.getElementById("sdate");
let sheure = document.getElementById("sheure");
let tbody = document.getElementById("listEvaluation");
let idmod = document.getElementById("id_module");
let title = document.getElementById("title");

listEvaluation();
listModules();

function listModules() {
  let xhr = getXhr();
  let listMdl;
  xhr.open("POST", "../../controllers/ModuleController.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      listMdl = xhr.response;
      MdlComboBox(JSON.parse(listMdl));
    }
  };
  let data = new FormData();
  data.append("action", "afficherTous");
  xhr.send(data);
}

function MdlComboBox(Mdl) {
  if (!Array.isArray(Mdl)) {
    Mdl = [Mdl];
  }
  for (let mdl of Mdl) {
    let newmdl = `<option>${mdl.nom}</option><option hidden>${mdl.id}</option>`;
    modules.insertAdjacentHTML("beforeend", newmdl);
  }
}

function getModuleId() {
  var MdlSelecter = modules.options[modules.selectedIndex];
  var IdMdl = MdlSelecter.nextElementSibling.value;
  return IdMdl;
}

let etat = "ajouter";
function ajouterEvaluation() {
  let xhr = getXhr();
  xhr.open("POST", "../../controllers/EvaluationController.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let resCtr = xhr.responseText;
      console.log(resCtr);
      /*
      if (resCtr == "ok") {
        console.log(resCtr);
        res.innerHTML = "Tout passe bien";
        res.hidden = false;
      } else if (resCtr == "error") {
        res.innerHTML = "Une erreur est survenue";
        res.hidden = false;
      }
      setTimeout(function () {
        res.hidden = true;
      }, 3000);*/
      listEvaluation();
    }
  };
  let data = new FormData(form);
  data.append("type", type.value);
  data.append("id_module", getModuleId());
  data.append("action", "ajouter");
  xhr.send(data);
}

function listEvaluation() {
  let xhr = getXhr();
  let listEval;
  xhr.open("POST", "../../controllers/EvaluationController.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      listEval = xhr.response;
      afficherEval(JSON.parse(listEval));
    }
  };
  let data = new FormData();
  data.append("action", "afficherTous");
  xhr.send(data);
}

function afficherEval(evl) {
  tbody.innerHTML = "";
  if (!Array.isArray(evl)) {
    evl = [evl];
  }
  for (let e of evl) {
    let newEvl = `
        <tr>
        <td scope="row">${e.id}</td>
          <td scope="row">${e.type}</td>
          <td>${e.nom}</td>
          <td>${e.date}</td>
          <td>${e.heure}</td>
          <td>${e.salle}</td>
          <td id="id_module" hidden>${e.id_module}</td>
          <td class="justify-content-center">
            <button class="btn btn-primary mx-1 noteB">
              <i class="fas fa-pen"></i> Noté un Etudiant
            </button>
            <button class="btn btn-light btn-outline-secondary mx-1 modifier">
              <i class="fas fa-pencil-alt"></i> Modifier
            </button>
            <button class="btn btn-danger supprimer">
              <i class="fas fa-trash"></i> Supprimer
            </button>
          </td>
        </tr>
      `;
    tbody.insertAdjacentHTML("beforeend", newEvl);
  }

  let supp = document.getElementsByClassName("supprimer");
  let sup = Array.from(supp);
  for (let s of sup) {
    s.addEventListener("click", () => {
      supprimerEval(s.parentElement.parentElement.children[0].textContent);
    });
  }

  let modif = document.getElementsByClassName("modifier");
  let mod = Array.from(modif);
  for (let m of mod) {
    m.addEventListener("click", () => {
      modifierEval(m.parentElement.parentElement);
    });
  }

  let note = document.getElementsByClassName("noteB");
  let note_array = Array.from(note);
  for (let n of note_array) {
    n.addEventListener("click", () => {
      const idEval = n.parentElement.parentElement.children[0].textContent;
      const nomEval = n.parentElement.parentElement.children[1].textContent;
      const nomMdl = n.parentElement.parentElement.children[2].textContent;
      const idMdl = n.parentElement.parentElement.children[6].textContent;

      const queryParams = new URLSearchParams();
      queryParams.append("idEval", idEval);
      queryParams.append("idMdl", idMdl);
      queryParams.append("nomEval", nomEval);
      queryParams.append("nomMdl", nomMdl);

      const queryString = queryParams.toString();

      const redirectURL = `http://localhost/gestion-platforme-scolaire/views/admin/ajouterNote.php?${queryString}`;
      window.location.href = redirectURL;
    });
  }
}

function supprimerEval(id) {
  let xhr = getXhr();
  xhr.open("POST", "../../controllers/EvaluationController.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let resCtr = xhr.responseText;
      console.log(resCtr);
      if (resCtr == "ok") {
        success.innerHTML = "Suppression effectuée avec succes";
        success.hidden = false;
        //res.innerHTML = "Tout passe bien";
        //res.hidden = false;
      } else if (resCtr == "error") {
        failed.innerHTML = "Suppression échouée";
        failed.hidden = false;
        //res.innerHTML = "Une erreur est survenue";
        //res.hidden = false;
      }
      setTimeout(function () {
        failed.hidden = true;
        success.hidden = true;
      }, 3000);
      listEvaluation();
    }
  };
  let data = new FormData();
  data.append("id", id);
  data.append("action", "supprimer");
  xhr.send(data);
}

function modifierEval(evl) {
  etat = "modifier";
  id.value = evl.children[0].textContent;
  type.value = evl.children[1].textContent;
  modules.value = evl.children[2].textContent;
  date.value = evl.children[3].textContent;
  heure.value = evl.children[4].textContent;
  salle.value = evl.children[5].textContent;
  idmod.value = evl.children[6].textContent;
  ajouterText.innerHTML = "Modifier l'evaluation";
  iconAjouter.className = "fas fa-edit";
  title.innerHTML = "Modifier Evaluation";
  ajouter.removeEventListener("click", ajouterEvaluation);
  ajouter.addEventListener("click", modifierSubmit);
}

function modifierSubmit() {
  let xhr = getXhr();
  xhr.open("POST", "../../controllers/EvaluationController.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let resCtr = xhr.responseText;
      console.log(resCtr);
      if (resCtr == "ok") {
        //res.innerHTML = "Tout passe bien";
        //res.hidden = false;
        etat = "ajouter";
        ajouterText.innerHTML = "Ajouter un Evaluation";
        title.innerHTML = "Ajouter Evaluation";
        iconAjouter.className = "fas fa-copy";
      }/* else if (resCtr == "error") {
        res.innerHTML = "Une erreur est survenue";
        res.hidden = false;
      }
      setTimeout(function () {
        res.hidden = true;
      }, 3000);*/
      listEvaluation();
    }
  };
  let data = new FormData(form);
  data.append("id", id.value);
  data.append("type", type.value);
  data.append("id_module", getModuleId());
  data.append("action", "modifier");
  xhr.send(data);
}

let validateSalle = function () {
  if (salle.value === "") {
    return false;
  }
  return true;
};


salle.addEventListener("blur", function (e) {
  if (validateSalle() === false) {
    ssalle.hidden = false;
  } else {
    ssalle.hidden = true;
  }
});

let validateDate = function () {
  if (date.value == 0) {
    return false;
  }
  return true;
};

date.addEventListener("blur", function (e) {
  if (validateDate() === false) {
    sdate.hidden = false;
  } else {
    sdate.hidden = true;
  }
});

let validateHeure = function () {
  if (heure.value == 0) {
    return false;
  }
  return true;
};

heure.addEventListener("blur", function (e) {
  if (validateHeure() === false) {
    sheure.hidden = false;
  } else {
    sheure.hidden = true;
  }
});

form.addEventListener("submit", (e) => {
  e.preventDefault();

  if (validateDate() && validateHeure() && validateSalle()) {
    if (etat === "ajouter") {
      ajouterEvaluation();
    } else if (etat === "modifier") {
      modifierSubmit();
    }
    listEvaluation();

    success.innerHTML = `Evaluation ${etat} avec succès`;
    success.hidden = false;
    setTimeout(function () {
      success.hidden = true;
    }, 3000);
  } else {
    failed.innerHTML = `Evaluation non ${etat}`;
    failed.hidden = false;
    setTimeout(function () {
      failed.hidden = true;
    }, 3000);
  }
});

// Search Form

let searchForm = document.getElementById("chercheForm");

searchForm.addEventListener("submit", searchEvaluation);

function searchEvaluation(e) {
  e.preventDefault();
  let xhr = getXhr();
  xhr.open("POST", "../../controllers/EvaluationController.php", true);
  xhr.addEventListener("readystatechange", function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let res = xhr.responseText;
      afficherEval(JSON.parse(res));
    }
  });

  let data = new FormData(searchForm);
  data.append("action", "chercher");
  xhr.send(data);
}
