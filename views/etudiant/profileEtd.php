<?php include_once("headerEtd.php"); ?>


  <div class="container" style="padding: 20px;">
    <div class="d-flex justify-content-between align-items-end mb-3">
      <h1>Mon profile</h1>
    </div>
    <form id="formulaire">
      <h1 id="succes" class="alert alert-success" role="alert" hidden>Insertion réussie</h1>
      <h1 id="failed" class="alert alert-danger" role="alert" hidden>Insertion échouée</h1>
      <div class="form-group row mb-3">
        <input type="hidden" id="id">
        <label for="nom" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom de l'étudiant" required>
          <small id="snom" class="form-text text-danger" hidden>Ce champ doit être rempli</small>
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom de l'étudiant" required>
          <small id="sprenom" class="form-text text-danger" hidden>Ce champ doit être rempli</small>
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="Address" class="col-sm-2 col-form-label">Adresse</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="Address" id="Address" placeholder="Adresse de l'étudiant" required>
          <small id="saddress" class="form-text text-danger" hidden>Ce champ doit être rempli</small>
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="telephone" class="col-sm-2 col-form-label">Téléphone</label>
        <div class="col-sm-10">
          <input type="tel" class="form-control" name="telephone" id="telephone" placeholder="06********" required>
          <small id="stelephone" class="form-text text-danger" hidden>Ce champ doit être rempli</small>
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" id="email" placeholder="exemple@gmail.com" required>
          <small id="semail" class="form-text text-danger" hidden>Ce champ doit être rempli</small>
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="oldMdp" class="col-sm-2 col-form-label">Mot de passe</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="oldMdp" id="oldMdp" placeholder="Ancien Mot de passe" required>
          <small id="smdp" class="form-text text-danger" hidden>Ce champ doit être rempli</small>
        </div>
      </div>

      <div class="form-group row mb-3">
        <label for="Mdp" class="col-sm-2 col-form-label">Mot de passe</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Nouveau Mot de passe" required>
          <small id="smdp" class="form-text text-danger" hidden>Ce champ doit être rempli</small>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-10 offset-sm-2 d-flex justify-content-end">
          <div>
            <button id="ajouter" type="submit" class="btn btn-primary me-2">
              <i class="fas fa-user-plus"></i> Modifier
            </button>
            <button type="reset" class="btn btn-outline-primary">
              <i class="fas fa-undo"></i> Réinitialiser
            </button>
          </div>
        </div>
      </div>
    </form>

    <h3 id="res" class="my-3 text-center" style="color:green" hidden></h3>
    
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
