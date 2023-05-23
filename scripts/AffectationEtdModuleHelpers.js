function populateModuleList(objects) {
    let checkboxList = ``;
    for(var obj of objects){
      
      let checkbox = `<label class="list-group-item">
      <input class="form-check-input me-1" type="checkbox" name="module${obj.id_module}" id="module${obj.id_module}" value="${obj.nom}">
      ${obj.nom}</label>`;
      checkboxList+=checkbox;
    }
    return checkboxList;
}

function populateTableAndFormModuleOfEtudiant(objects){
  let rows=``;
  for(var obj of objects){
    //ajouter l'itudiant
    document.getElementById("id_edt").defaultValue= obj.id_etudiant ;
    //remplir le tableau
    let row = `<tr>
    <th scope="row">${obj.id_module}</th>
    <td>${obj.nom}</td>
    <td>${obj.description}</td>
  </tr>`;
  rows+=row;
  //cocher les modules

  }
  return rows;
}


export{populateModuleList, populateTableAndFormModuleOfEtudiant}