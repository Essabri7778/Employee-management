import getXhr from "./utilities.js";

let form = document.getElementById("formulaire");
let nouvMdp = document.getElementById("mdpN");

form.addEventListener("submit", function(e){
  e.preventDefault();
  if(validateForm()) modifierMotDePasse(e);
  else return validateForm();
});

function validateForm() {
  if ( nouvMdp.value === "" ){
      // Afficher un message d'erreur
      document.getElementById("failed").hidden = false;
      document.getElementById("failed").innerHTML ="Veulliez saisir tous les champs";
      setTimeout(function () {
        document.getElementById("failed").hidden = true;
      }, 5000);
      return false; // Empêcher la soumission du formulaire
    }
    return true;
}

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

let validateMdp = function () {
  if (mdpN.value === "") {
    return false;
  }
  return true;
};

mdpN.addEventListener("blur", function (e) {
  if (validateMdp() === false) {
    smdpN.hidden = false;
  } else {
    smdpN.hidden = true;
  }
});
