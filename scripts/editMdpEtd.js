import getXhr from "./utilities.js";

let form = document.getElementById("formulaire");
let nouvMdp = document.getElementById("mdpN");

form.addEventListener("submit", modifierMotDePasse);

function modifierMotDePasse(e) {
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
        nouvMdp.value = "";
        res = JSON.parse(res);
        document.getElementById("succes").hidden = false;
        document.getElementById("mdpO").value = res.mot_de_passe;
        setTimeout(() => {
          document.getElementById("succes").hidden = true;
        }, 2000);
      }
    }
  };
  let data = new FormData();
  data.append("nouveauMdp", nouvMdp.value);
  data.append("action", "modifierMdp");
  xhr.send(data);
}
