import getXhr from "./utilities.js";

let form = document.getElementById("formulaire");

form.addEventListener("submit", modifierProfil);

function modifierProfil(e) {
  e.preventDefault();
  let xhr = getXhr();
  xhr.open("POST", "../../controllers/EtudiantController.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let res = xhr.responseText;
      if (res == "error") {
        document.getElementById("failed").hidden = false;
        setTimeout(() => {
          document.getElementById("failed").hidden = true;
        }, 2000);
      } else {
        res = JSON.parse(res);
        document.getElementById("succes").hidden = false;
        document.getElementById("nom").value = res.nom;
        document.getElementById("prenom").value = res.prenom;
        document.getElementById("Address").value = res.adresse;
        document.getElementById("telephone").value = res.telephone;
        document.getElementById("email").value = res.email;
        setTimeout(() => {
          document.getElementById("succes").hidden = true;
        }, 2000);
      }
    }
  };
  let data = new FormData(form);
  data.append("action", "modifierProfil");
  xhr.send(data);
}
