import getXhr from "./utilities.js";

const form = document.getElementById("loginForm");

form.addEventListener("submit", logUser);

function logUser(e) {
  e.preventDefault();
  let xhr = getXhr();
  xhr.open(
    "POST",
    "http://localhost/gestion-platforme-scolaire/controllers/LoginController.php",
    true
  );
  xhr.addEventListener("readystatechange", function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let res = xhr.responseText;
      if (res === "ok") {
        console.log("hiiiiiii");
      } else {
        console.log(res);
      }
    }
  });

  let data = new FormData(form);
  xhr.send(data);
}
