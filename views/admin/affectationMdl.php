<?php
include_once("headerAdmin.php");
$id_etudiant = isset($_GET['id_etd']) ? intval($_GET['id_etd']) : NULL;
?>
<div class="container" style="padding: 20px;">
  <div class="d-flex justify-content-between align-items-end mb-3">
    <h1 id="title">Affectation des Modules:</h1>
    <div>
      <button id="afficherEtd" class="btn btn-dark" data-bs-toggle="collapse" href="#listeMdl">
        <i class="fas fa-list"></i> Afficher les Modules de cette Etudiant
      </button>
    </div>
  </div>
  <div id="success" class="alert alert-success" role="alert" hidden></div>
  <div id="failed" class="alert alert-danger" role="alert" hidden></div>

  <form id="formulaire">
    <div class="form-group row mb-3">
      <input type="hidden" id="id">
      <label for="etudiant" class="col-sm-2 col-form-label">Etudiant</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="id_etudiant" id="id_etudiant" placeholder="id_etudiant" value="<?php echo ($id_etudiant); ?>" disabled>
        <small id="setudiant" style="color:red" hidden>Ce champ doit être rempli</small>
      </div>
    </div>

    <div class="form-group row mb-3">
      <input type="hidden" id="id">
      <label for="mods" class="col-sm-2 col-form-label">Choisissez les Modules</label>
      <div class="col-sm-10" id="checkbox-list">
        <label class="list-group-item">
          <input class="form-check-input me-1" type="checkbox" name="module1" id="module1" value="Java">
          Java
        </label>
        <label class="list-group-item">
          <input class="form-check-input me-1" type="checkbox" name="module1" id="module1" value="Java">
          JS
        </label>
        <label class="list-group-item">
          <input class="form-check-input me-1" type="checkbox" name="module1" id="module1" value="Java">
          PHP
        </label>
        <label class="list-group-item">
          <input class="form-check-input me-1" type="checkbox" name="module1" id="module1" value="Java">
          C++
        </label>
      </div>
    </div>


    <div class="form-group row">
      <div class="col-sm-10 offset-sm-2 d-flex justify-content-end">
        <button id="ajouter" type="submit" class="btn btn-primary">
          <i id="iconAjouter" class="fas fa-user-plus"></i>
          <span id="ajouterText">Affecter les Module</span>
        </button>
        <button type="reset" class="btn ms-2 btn-outline-primary">
          <i class="fas fa-undo"></i> Réinitialiser
        </button>
      </div>
    </div>
  </form>

  <h3 id="res" class="my-3 text-center" hidden></h3>


  <div class="row collapse mt-5" id="listeMdl">

    <div class="form-group row mb-3">

      <div class="row mb-3">
        <div class="col-md-6">
          <button class="btn btn-light btn-outline-secondary w-100" id="updateModules">
            <i class="fas fa-pencil-alt"></i> Modifier les modules
          </button>
        </div>
        <div class="col-md-6">
          <button class="btn btn-danger w-100" id="deleteModules">
            <i class="fas fa-trash"></i> Supprimer les modules
          </button>
        </div>
      </div>

      <div class="table-responsive">

        <table id="personnes" class="table table-bordered border-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom</th>
              <th scope="col">Description</th>
            </tr>
          </thead>
          <tbody id="listStudent">
            <tr>
              <th scope="row">1</th>
              <td>JS</td>
              <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, nulla ullam. Aspernatur animi consequuntur quod numquam laudantium dicta harum, autem possimus nulla quae tenetur. Dolore earum sunt ratione. Fugit, commodi.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../scripts/gestionAffectationEtudiantModule.js" type="module"></script>
</body>

</html>