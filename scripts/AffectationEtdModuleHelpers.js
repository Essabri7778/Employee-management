function populateModuleList(objects) {
    let checkboxList = ``;
    for(var obj of objects){
      let checkbox = `<label class="list-group-item">
      <input class="form-check-input me-1" type="checkbox" name="module${obj.id}" id="${obj.id}" value="${obj.nom}">
      ${obj.nom}</label>`;
      checkboxList+=checkbox;
    }
    return checkboxList;
}

function populateTableModuleOfEtudiant(objects){
  let rows=``;
  for(var obj of objects){
    //remplir le tableau
    let row = `<tr>
    <th scope="row" class="module">${obj.id_module}</th>
    <td>${obj.nom}</td>
    <td>${obj.description}</td>
    </tr>`;
    rows+=row;
   

  }
  return rows;
}

function verifyCheckbox() {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  var maxCheckboxCount = 6;
  var checkedCount = 0;
  for(var checkbox of checkboxes) {
    if (checkbox.checked) {
      checkedCount++;
    }
  }
  console.log(checkedCount)
  if (checkedCount !== maxCheckboxCount ) {
    return false;
  }
  return true;
}

function getIdModulesList() {
  var id_list = [];
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  for(var checkbox of checkboxes) {
    if (checkbox.checked) {
      id_list.push(checkbox.id);
    }
  }
  return id_list;
}

function getIdModulesListFromTable() {
  var id_list = [];
  var modules = document.getElementsByClassName('module');
  for(var module of modules){
    id_list.push(module.innerHTML);
  }
  return id_list;
}

function resetPopulateCheckbox(action) {
  let id_module_list
  if(action === true){
    id_module_list = getIdModulesListFromTable();
  }
  else{
    id_module_list =getIdModulesList();
  }
  for (let i = 0; i < id_module_list.length; i++) {
      //cocher les modules
      document.getElementById(id_module_list[i]).checked = action; 
  }
}

export{populateModuleList, populateTableModuleOfEtudiant,verifyCheckbox,getIdModulesList,getIdModulesListFromTable,resetPopulateCheckbox}