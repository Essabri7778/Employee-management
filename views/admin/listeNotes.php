<?php include_once("headerAdmin.php"); ?>
    

    <div class="container" style="padding: 20px;">
        <div class="d-flex justify-content-between align-items-end mb-3">
          <h1>Liste des Notes</h1>
          <div>
            <button id="afficherEtd" class="btn btn-dark">
              <a class="text-reset text-decoration-none" href="listeEval.php"><i class="fas fa-plus"></i> Ajouter des Notes</a>
            </button>
          </div>
        </div>
        <div class="form-group row mb-3">

          <div class="input-group">
            <div class="form-outline flex-grow-1">
              <input type="search" id="searchBar" class="form-control" placeholder="Chercher"/>
            </div>
              <button type="button" class="btn btn-primary">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        <table id="personnes" class="table table-bordered border-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Evaluation</th>
              <th scope="col">Module</th>
              <th scope="col">Valeure</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody id="listStudent">
            <tr>
              <th scope="row">1</th>
              <td>Type</td>
              <td>Module</td>
              <td>20</td>
              <td class="justify-content-center">
                <button class="btn btn-light btn-outline-secondary mx-1">
                  <i class="fas fa-pencil-alt"></i> Modifier
                </button>
                <button class="btn btn-danger">
                  <i class="fas fa-trash"></i> Supprimer
                </button>
              </td>
              
            </tr>
          </tbody>
        </table>
      </div>
      
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>