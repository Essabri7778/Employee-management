import getXhr from "./utilities.js";

const urlParams = new URLSearchParams(window.location.search);
const idEval = urlParams.get("idEval");
const idMdl = urlParams.get("idMdl");
const nomEval = urlParams.get("nomEval");
const nomMdl = urlParams.get("nomMdl");

let form = document.getElementById("formulaire");
let res = document.getElementById("res");

let module = document.getElementById("module");
let idmdl = document.getElementById("idmdl");

let evaluation = document.getElementById("eval");
let ideval = document.getElementById("ideval");

let valeur = document.getElementById("valeur");
let svaleur = document.getElementById("svaleur");

let etd = document.getElementById("etd");
let idetd = document.getElementById("idetd");
let tbody = document.getElementById("listNote");
let title = document.getElementById("title");

let ajouterText = document.getElementById("ajouterText");

evaluation.value = nomEval;
module.value = nomMdl;
idmdl.value = idMdl;
ideval.value = idEval;

listNote();
let etat = "ajouter";

listEtd();

function listEtd() {
  let xhr = getXhr();
  let listEtd;
  xhr.open(
    "POST",
    "../../controllers/AffectationEtudiantModuleController.php",
    true
  );
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      listEtd = xhr.response;
      EtdComboBox(JSON.parse(listEtd));
    }
  };
  let data = new FormData();
  data.append("action", "getEtdOfMdl");
  data.append("id_module", idMdl);
  xhr.send(data);
}

function EtdComboBox(Etd) {
  if (!Array.isArray(Etd)) {
    Etd = [Etd];
  }
  for (let e of Etd) {
    let newetd = `<option>${e.etd_nom} ${e.prenom}</option><option hidden>${e.etd_id}</option>`;
    etd.insertAdjacentHTML("beforeend", newetd);
  }
}

function listNote() {
  let xhr = getXhr();
  let listNote;
  xhr.open("POST", "../../controllers/NoteController.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      listNote = xhr.response;
      afficherNote(JSON.parse(listNote));
    }
  };
  let data = new FormData();
  data.append("action", "listNotes");
  xhr.send(data);
}

function afficherNote(Notes) {
  tbody.innerHTML = "";
  if (!Array.isArray(Notes)) {
    Notes = [Notes];
  }
  for (let n of Notes) {
    let newNotes = `
        <tr>
        <td scope="row">${n.id}</td>
          <td>${n.etd_nom}</td>
          <td>${n.prenom}</td>
          <td scope="row">${n.type}</td>
          <td>${n.nom}</td>
          <td>${n.valeur}</td>
          <td id="id_module" hidden>${n.id_module}</td>
          <td id="id_etudiant" hidden>${n.id_etudiant}</td>
          <td id="id_evaluation" hidden>${n.id_evaluation}</td>
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
    tbody.insertAdjacentHTML("beforeend", newNotes);
  }

  let supp = document.getElementsByClassName("supprimer");
  let sup = Array.from(supp);
  for (let s of sup) {
    s.addEventListener("click", () => {
      supprimerNote(s.parentElement.parentElement.children[0].textContent);
    });
  }

  let modif = document.getElementsByClassName("modifier");
  let mod = Array.from(modif);
  for (let m of mod) {
    m.addEventListener("click", () => {
      modifierNote(m.parentElement.parentElement);
    });
  }
}

function getEtdId() {
  var EtdSelecter = etd.options[etd.selectedIndex];
  var IdEtd = EtdSelecter.nextElementSibling.value;
  return IdEtd;
}

function ajouterNote() {
  let xhr = getXhr();
  xhr.open("POST", "../../controllers/NoteController.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let resCtr = xhr.responseText;
      if (resCtr == "ok") {
        res.innerHTML = "Tout passe bien";
        res.hidden = false;
      } else if (resCtr == "error") {
        res.innerHTML = "Une erreur est survenue";
        res.hidden = false;
      }
      setTimeout(function () {
        res.hidden = true;
      }, 3000);
      listNote();
    }
  };
  let data = new FormData(form);
  data.append("id_evaluation", idEval);
  data.append("id_module", idMdl);
  data.append("id_etudiant", getEtdId());
  data.append("action", "ajouter");
  xhr.send(data);
}

function supprimerNote(id) {
  let xhr = getXhr();
  xhr.open("POST", "../../controllers/NoteController.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let resCtr = xhr.responseText;
      if (resCtr == "ok") {
        res.innerHTML = "Tout passe bien";
        res.hidden = false;
      } else if (resCtr == "error") {
        res.innerHTML = "Une erreur est survenue";
        res.hidden = false;
      }
      setTimeout(function () {
        res.hidden = true;
      }, 3000);
      listNote();
    }
  };
  let data = new FormData();
  data.append("id", id);
  data.append("action", "supprimer");
  xhr.send(data);
}
etd.value = "hh";

function modifierNote(note) {
  etat = "modifier";
  id.value = note.children[0].textContent;
  //etd.value = `${note.children[1].textContent} ${note.children[2].textContent}`;
  evaluation.value = note.children[3].textContent;
  module.value = note.children[4].textContent;
  valeur.value = note.children[5].textContent;
  idmdl.value = note.children[6].textContent;
  idetd.value = note.children[7].textContent;
  ideval.value = note.children[8].textContent;
  ajouterText.innerHTML = "Modifier la note";
  title.innerHTML = "Modifier Note";
  iconAjouter.className = "fas fa-edit";
  const newOption = document.createElement("option");
  newOption.textContent = `${note.children[1].textContent} ${note.children[2].textContent}`;
  newOption.selected = true;
  etd.appendChild(newOption);
  etd.disabled = true;
  ajouter.removeEventListener("click", ajouterNote);
  ajouter.addEventListener("click", modifierSubmit);
}

function modifierSubmit() {
  if (validateValeur() === true) {
    let xhr = getXhr();
    xhr.open("POST", "../../controllers/NoteController.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        let resCtr = xhr.responseText;
        if (resCtr == "ok") {
          res.innerHTML = "Tout passe bien";
          res.hidden = false;
          etat = "ajouter";
          ajouterText.innerHTML = "Ajouter une Note";
          title.innerHTML = "Ajouter Note";
          iconAjouter.className = "fas fa-copy";
          form.reset();
        } else if (resCtr == "error") {
          res.innerHTML = "Une erreur est survenue";
          res.hidden = false;
        }
        setTimeout(function () {
          res.hidden = true;
        }, 3000);
        listNote();
      }
    };
    let data = new FormData(form);
    data.append("id", id.value);
    data.append("id_module", idmdl.value);
    data.append("id_evaluation", ideval.value);
    data.append("id_etudiant", idetd.value);
    data.append("action", "modifier");
    xhr.send(data);
  }
}

let validateValeur = function () {
  if (valeur.value < 0 || valeur.value > 20 || valeur.value == "") {
    return false;
  }
  return true;
};

valeur.addEventListener("blur", function (e) {
  if (validateValeur() === false) {
    svaleur.hidden = false;
  } else {
    svaleur.hidden = true;
  }
});

form.addEventListener("submit", (e) => {
  e.preventDefault();

  if (validateValeur() === true) {
    if (etat === "ajouter") {
      ajouterNote();
    } else if (etat === "modifier") {
      modifierSubmit();
    }
    listNote();

    success.innerHTML = `Note ${etat} avec succès`;
    success.hidden = false;
    setTimeout(function () {
      success.hidden = true;
    }, 3000);
  } else {
    failed.innerHTML = `Note non ${etat}`;
    failed.hidden = false;
    setTimeout(function () {
      failed.hidden = true;
    }, 3000);
  }
});

// Search Form

let searchForm = document.getElementById("chercheForm");

searchForm.addEventListener("submit", searchNotes);

function searchNotes(e) {
  e.preventDefault();
  let xhr = getXhr();
  xhr.open("POST", "../../controllers/NoteController.php", true);
  xhr.addEventListener("readystatechange", function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let res = xhr.responseText;
      afficherNote(JSON.parse(res));
    }
  });

  let data = new FormData(searchForm);
  data.append("action", "chercherNotes");
  xhr.send(data);
}
