import getXhr from "./utilities.js";

populateList();

function populateList() {
  let xhr = getXhr();
  xhr.open("POST", "../../controllers/EvaluationController.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let list = xhr.responseText;
      console.log(JSON.parse(list));
      afficherEval(JSON.parse(list));
    }
  };
  let data = new FormData();
  data.append("action", "afficherMesEval");
  xhr.send(data);
}

function afficherEval(evaluations) {
  let tbody = document.getElementById("listEval");
  tbody.innerHTML = "";
  if (!Array.isArray(evaluations)) {
    evaluations = [evaluations];
  }
  for (let evaluation of evaluations) {
    let neweval = `
      <tr>
        <td>${evaluation.type}</td>
        <td>${evaluation.nom}</td>
        <td>${evaluation.date}</td>
        <td>${evaluation.heure}</td>
        <td>${evaluation.salle}</td>
      </tr> 
    `;
    tbody.insertAdjacentHTML("beforeend", neweval);
  }
}
