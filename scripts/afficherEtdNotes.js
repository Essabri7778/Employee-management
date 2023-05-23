import getXhr from "./utilities.js";

populateList();

function populateList() {
  let xhr = getXhr();
  xhr.open("POST", "../../controllers/NoteController.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let list = xhr.responseText;
      afficherNote(JSON.parse(list));
    }
  };
  let data = new FormData();
  data.append("action", "afficherMesNotes");
  xhr.send(data);
}

function afficherNote(notes) {
  let tbody = document.getElementById("listNotes");
  tbody.innerHTML = "";
  if (!Array.isArray(notes)) {
    notes = [notes];
  }
  for (let note of notes) {
    let newnote = `
      <tr>
        <td>${note.type}</td>
        <td>${note.nom}</td>
        <td>${note.valeur}</td>
      </tr> 
    `;
    tbody.insertAdjacentHTML("beforeend", newnote);
  }
}

// search form

let searchForm = document.getElementById("formulaire");

searchForm.addEventListener("submit", searchNote);

function searchNote(e) {
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
  data.append("action", "chercherMesNotes");
  xhr.send(data);
}
