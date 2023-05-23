 function populateEtudiantTable(objects) {
    let rows = ``;
    let tab_ids = []
    for(var obj of objects){
        let row = `<tr id = "row${obj.id}">
        <th scope='row'>${obj.id}</th>
        <td>${obj.nom}</td>
        <td>${obj.prenom}</td>
        <td>${obj.adresse}</td>
        <td>${obj.telephone}</td>
        <td>${obj.email}</td>
        <td>${obj.mot_de_passe}</td>
        <td>
        <div class="d-flex justify-content-between align-items-center">
          <button class="btn btn-primary me-2">
            <a class="text-reset text-decoration-none text-truncate" href="affectationMdl.php?id_etd=${obj.id}" id = "affectation${obj.id}"><i class="fas fa-th"></i> Affecter des modules</a>
          </button>
          <button class="btn btn-light btn-outline-secondary me-2 text-truncate" id = "modify${obj.id}">
            <i class="fas fa-pencil-alt"></i> Modifier
          </button>
          <button class="btn btn-danger text-truncate" id = "delete${obj.id}">
            <i class="fas fa-trash"></i> Supprimer
          </button>
        </div>
      </td>
    </tr>`
    //ajouter les id ici a chaque button
    tab_ids.push(obj.id);
    rows+=row;
    }
    let data = {
      "rows" : rows,
      "tab_ids" : tab_ids
    } ;
    return data;
}
function populateEtudiantForme(e) {
  //recuperer l'id
  let id_attribut = e.target.id;
  var id_student = parseInt(id_attribut.match(/\d+$/)[0]);
  
  //remplir le form par les données du row
  let student_row = document.getElementById("row"+id_student);
  document.getElementById("id").value = id_student ;
  document.getElementById("nom").value = student_row.children[1].innerHTML ;
  document.getElementById("prenom").value = student_row.children[2].innerHTML ;
  document.getElementById("Address").value = student_row.children[3].innerHTML ;
  document.getElementById("telephone").value = student_row.children[4].innerHTML ;
  document.getElementById("email").value = student_row.children[5].innerHTML ;
  document.getElementById("mdp").value = student_row.children[6].innerHTML ;
  document.getElementById("ajouterText").innerHTML = "Modifier l'Etudiant";
  document.getElementById("iconAjouter").className = "fas fa-edit";

}

function populateEtudiantRow() {
  
}
export {populateEtudiantTable,populateEtudiantForme,populateEtudiantRow};