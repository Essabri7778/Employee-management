<?php include_once("headerAdmin.php"); ?>

  <div class="container" style="padding: 20px;">
    <div class="d-flex justify-content-between align-items-end mb-3">
      <h1>Affectation des Modules:</h1>
      <div>
        <button id="afficherEtd" class="btn btn-dark">
          <a class="text-reset text-decoration-none" href="gestionMdl.html"><i class="fas fa-plus"></i> Ajouter des Modules</a>
        </button>
      </div>
    </div>
    <form id="formulaire">
      <h1 id="succes" style="background-color: lightgreen; color:darkgreen; font-size: medium; padding :10px;" hidden>Insertion faite avec succès</h1>
      <h1 id="failed" style="background-color: #FFCCCB; color:darkred; font-size: medium; padding :10px;" hidden>Insertion non faite</h1>     

      <div class="form-group row mb-3">
        <label for="etudiant" class="col-sm-2 col-form-label">Etudiant</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="etudiant" id="etudiant" placeholder="HAMid" disabled>
          <small id="setudiant" style="color:red" hidden>Ce champ doit être rempli</small>
        </div>
      </div>

      <div class="form-group row mb-3">
        <input type="hidden" id="id">
        <label for="mods" class="col-sm-2 col-form-label">Choisissez les Modules</label>
        <div class="col-sm-10">
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
            <i class="fas fa-user-plus"></i> Affecter les Modules
          </button>
          <button type="reset" class="btn ms-2 btn-outline-primary">
            <i class="fas fa-undo"></i> Vider
          </button>
        </div>
      </div>
    </form>

    <h3 id="res" class="my-3 text-center" style="color:green" hidden></h3>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
