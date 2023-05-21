<?php include_once("headerAdmin.php"); ?>

<div class="container" style="padding: 20px;">
  <div class="d-flex justify-content-between align-items-end mb-3">
    <h1>Ajouter Modlule</h1>
    <div>
      <button class="btn btn-dark" id="afficherEtd" data-bs-toggle="collapse" href="#listeMdl">
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
      <label for="nom" class="col-sm-2 col-form-label">Nom</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nom" id="nom" placeholder="Votre nom" required>
        <small id="snom" style="color:red" hidden>Ce champ doit être rempli</small>
      </div>
    </div>

    <div class="form-group row mb-3">
      <label for="description" class="col-sm-2 col-form-label">Description</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="description" id="description" placeholder="description module" required>
        <small id="sdescription" style="color:red" hidden>Ce champ doit être rempli</small>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-10 offset-sm-2 d-flex justify-content-between">
        <div>
          <button id="ajouter" type="submit" class="btn btn-primary me-2">
            <i class="fas fa-user-plus"></i> Ajouter un Module
          </button>
          <button type="reset" class="btn btn-outline-primary">
            <i class="fas fa-undo"></i> Réinitialiser
          </button>
        </div>
        <button class="btn btn-dark" id="afficherEtd" data-bs-toggle="collapse" href="#listeMdl">
          <i class="fas fa-list"></i> Afficher la liste des modules
        </button>
      </div>
    </div>
  </form>


  <div class="row collapse mt-5" id="listeMdl">

    <div class="form-group row mb-3">

      <div class="input-group">
        <div class="form-outline flex-grow-1">
          <input type="search" id="searchBar" class="form-control" placeholder="Chercher" />
        </div>
        <button type="button" class="btn btn-primary">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>

    <table id="modules" class="table table-bordered border-dark">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody id="listStudent">
        <tr>
          <th scope="row">1</th>
          <td>JS</td>
          <td class="w-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, nulla ullam. Aspernatur animi consequuntur quod numquam laudantium dicta harum, autem possimus nulla quae tenetur. Dolore earum sunt ratione. Fugit, commodi.</td>
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