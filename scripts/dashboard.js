import getXhr from "./utilities.js";

listEvaluation();
listModules();
listNote();
listEtd();

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
    let tbody = document.getElementById("listEvaluation");
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
        </tr>
      `;
      tbody.insertAdjacentHTML("beforeend", newEvl);
}
}


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
    let tbody = document.getElementById("listModules");
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
    `;
    tbody.insertAdjacentHTML("beforeend", newmdl);
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
    let tbody = document.getElementById("listNote");
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
        </tr>
      `;
      tbody.insertAdjacentHTML("beforeend", newNotes);
    }
}


  
function listEtd() {
      let xhr = getXhr();
      let listEtd;
      xhr.open("POST", "../../controllers/EtudiantController.php", true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            listEtd = xhr.response;
            afficherEtd(JSON.parse(listEtd));
        }
      };
      let data = new FormData();
      data.append("action", "afficherTous");
      xhr.send(data);
  }
  
  function afficherEtd(etd) {
      let tbody = document.getElementById("listStudent");
      tbody.innerHTML = "";
      if (!Array.isArray(etd)) {
        etd = [etd];
      }
      for (let e of etd) {
        let newEtd = `
          <tr>
          <td scope="row">${e.id}</td>
            <td>${e.nom}</td>
            <td>${e.prenom}</td>
            <td scope="row">${e.adresse}</td>
            <td scope="row">${e.telephone}</td>
            <td>${e.email}</td>
          </tr>
        `;
        tbody.insertAdjacentHTML("beforeend", newEtd);
      }
  }
