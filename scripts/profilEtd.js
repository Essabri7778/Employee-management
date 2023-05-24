import getXhr from "./utilities.js";

let form = document.getElementById("formulaire");
let action = "ajouter";
let id = document.getElementById("id");
let nom = document.getElementById("nom");
let prenom = document.getElementById("prenom");
let adresse = document.getElementById("Address");
let tele = document.getElementById("telephone");
let email = document.getElementById("email");
let snom = document.getElementById("snom");
let sprenom = document.getElementById("sprenom");
let sadresse = document.getElementById("saddress");
let stele = document.getElementById("stelephone");
let semail = document.getElementById("semail");

function validateForm() {
  if (
    nom.value === "" ||
    prenom.value === "" ||
    adresse.value === "" ||
    tele.value === "" ||
    email.value === ""
  ) {
    // Afficher un message d'erreur
    document.getElementById("failed").hidden = false;
    document.getElementById("failed").innerHTML =
      "Veulliez saisir tous les champs";
    setTimeout(function () {
      document.getElementById("failed").hidden = true;
    }, 5000);
    return false; // Empêcher la soumission du formulaire
  }
  return true;
}

form.addEventListener("submit", function (e) {
  e.preventDefault();
  if (validateForm()) modifierProfil(e);
  else return validateForm();
});

function modifierProfil(e) {
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

//someValidations
let validateNom = function () {
  if (nom.value === "") {
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

let validatePrenom = function () {
  if (prenom.value === "") {
    return false;
  }
  return true;
};

prenom.addEventListener("blur", function (e) {
  if (validatePrenom() === false) {
    sprenom.hidden = false;
  } else {
    sprenom.hidden = true;
  }
});

let validateAdresse = function () {
  if (adresse.value === "") {
    return false;
  }
  return true;
};

adresse.addEventListener("blur", function (e) {
  if (validateAdresse() === false) {
    sadresse.hidden = false;
  } else {
    sadresse.hidden = true;
  }
});

function validateTelephone(tel) {
  const regex = /^06\d{8}$/;
  return regex.test(tel);
}
tele.addEventListener("blur", function (e) {
  if (validateTelephone(tele.value) === false) {
    stele.hidden = false;
  } else {
    stele.hidden = true;
  }
});

function emailValide(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

email.addEventListener("blur", function (e) {
  if (emailValide(email.value) === false) {
    semail.hidden = false;
  } else {
    semail.hidden = true;
  }
});
