<?php include_once("headerAdmin.php"); ?>

  <div class="container" style="padding: 20px;">
    <div class="d-flex justify-content-between align-items-end mb-3">
      <h1>Ajouter Note au Evaluation:</h1>
      <div>
        <button class="btn btn-dark" id="afficherEtd" data-bs-toggle="collapse" href="#listeNotes">
          <i class="fas fa-list"></i>
        </button>
      </div>
    </div>

    <div id="success" class="alert alert-success" role="alert" hidden></div>
    <div id="failed" class="alert alert-danger" role="alert" hidden></div>

    <form id="formulaire">
      <h1 id="succes" style="background-color: lightgreen; color:darkgreen; font-size: medium; padding :10px;" hidden>Insertion faite avec succès</h1>
      <h1 id="failed" style="background-color: #FFCCCB; color:darkred; font-size: medium; padding :10px;" hidden>Insertion non faite</h1>
      <div class="form-group row mb-3">
        <input type="hidden" id="id">
        <label for="etd" class="col-sm-2 col-form-label">Etudiant</label>
        <div class="col-sm-10">
          <select class="form-select" id="etd">
            <option selected>Choisissez un etudiant</option>
            <option value="1">et1</option>
            <option value="2">et2</option>
            <option value="3">et3</option>
          </select>
          <small id="setd" style="color:red" hidden>Ce champ doit être rempli</small>
        </div>
      </div>      

      <div class="form-group row mb-3">
        <label for="module" class="col-sm-2 col-form-label">Module</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="module" id="module" placeholder="nom module" disabled>
          <small id="smodule" style="color:red" hidden>Ce champ doit être rempli</small>
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="eval" class="col-sm-2 col-form-label">Evaluation</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="eval" id="eval" placeholder="evaluation" disabled>
          <small id="seval" style="color:red" hidden>Ce champ doit être rempli</small>
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="valeur" class="col-sm-2 col-form-label">Valeur</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" name="valeur" id="valeur" placeholder="20" required>
          <small id="svaleur" style="color:red" hidden>Ce champ doit être rempli</small>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-10 offset-sm-2 d-flex justify-content-between">
          <div>
            <button id="ajouter" type="submit" class="btn btn-primary me-2">
              <i class="fas fa-user-plus"></i> Ajouter la note
            </button>
            <button type="reset" class="btn btn-outline-primary">
              <i class="fas fa-undo"></i> Réinitialiser
            </button>
          </div>
          <button class="btn btn-dark" id="afficherEtd" data-bs-toggle="collapse" href="#listeNotes">
            <i class="fas fa-list"></i> Afficher la liste des notes
          </button>
        </div>
      </div>
    </form>

    <div class="row collapse mt-5" id="listeNotes">

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
          <th scope="col">Nom</th>
          <th scope="col">Prenom</th>
          <th scope="col">Evaluation</th>
          <th scope="col">Module</th>
          <th scope="col">Valeure</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody id="listStudent">
        <tr>
          <th scope="row">1</th>
          <th scope="col">Nom</th>
          <th scope="col">Prenom</th>
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
