import getXhr from "./utilities.js";

const form = document.getElementById("loginForm");

let login = document.getElementById("identifiant");
let mdp = document.getElementById("mdp");
let userType = document.getElementById("userType");

userType.addEventListener("change", () => {
  if (userType.value === "admin") {
    login.placeholder = "Username";
  } else {
    login.placeholder = "Email";
  }
});

login.addEventListener("blur", () => {
  if (login.value === "") {
    document.getElementById("loginError").textContent =
      "Ce champs est obligatoire";
    document.getElementById("loginError").hidden = false;
  } else {
    document.getElementById("loginError").hidden = true;
  }
});

mdp.addEventListener("blur", () => {
  if (mdp.value === "") {
    document.getElementById("mdpError").textContent =
      "Ce champs est obligatoire";
    document.getElementById("mdpError").hidden = false;
  } else {
    document.getElementById("mdpError").hidden = true;
  }
});

form.addEventListener("submit", logUser);

function logUser(e) {
  e.preventDefault();
  let xhr = getXhr();
  xhr.open(
    "POST",
    "../../gestion-platforme-scolaire/controllers/LoginController.php",
    true
  );
  xhr.addEventListener("readystatechange", function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let res = xhr.responseText;
      if (res == "okAdmin") {
        //Redirection page Admin
        window.location.href = "./views/admin/dashboard.php";
      } else if (res == "okEtudiant") {
        //Redirection page Etudiant
        window.location.href = "./views/etudiant/welcome.php";
      } else if (res === "error") {
        //login incorrect
        document.getElementById("failed").textContent = "Login incorrect";
        document.getElementById("failed").hidden = false;
      } else if (res === "errorMdp") {
        //Mot de passe incorrect
        document.getElementById("failed").textContent =
          "mot de passe incorrect";
        document.getElementById("failed").hidden = false;
      } else {
        console.log(res);
      }
    }
  });

  let data = new FormData(form);
  xhr.send(data);
}
