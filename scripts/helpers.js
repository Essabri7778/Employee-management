export default function populateEtudiantTable(objects) {
    let rows = ``;
    for(var obj of objects){
        let row = `<tr>
        <th scope='row'>${obj.id}</th>
        <td>${obj.nom}</td>
        <td>${obj.prenom}</td>
        <td>${obj.adresse}</td>
        <td>${obj.telephone}</td>
        <td>${obj.email}</td>
        <td>
        <div class="d-flex justify-content-between align-items-center">
          <button class="btn btn-primary me-2">
            <a class="text-reset text-decoration-none text-truncate" href="affectationMdl.php"><i class="fas fa-th"></i> Affecter des modules</a>
          </button>
          <button class="btn btn-light btn-outline-secondary me-2 text-truncate">
            <i class="fas fa-pencil-alt"></i> Modifier
          </button>
          <button class="btn btn-danger text-truncate">
            <i class="fas fa-trash"></i> Supprimer
          </button>
        </div>
      </td>
    </tr>`
    //ajouter les classe_id ici a chaque button
        rows+=row;
    }
    return rows;
}