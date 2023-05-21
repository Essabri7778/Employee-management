<?php include_once("header.php"); ?>

  <div class="container" style="padding: 20px;">
    <div class="d-flex justify-content-between align-items-end mb-3">
      <h1>Ajouter un étudiant</h1>
      <div>
        <button class="btn btn-dark" id="afficherEtd" data-bs-toggle="collapse" href="#listeEtd">
          <i class="fas fa-list"></i>
        </button>
      </div>
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
        <label for="Mdp" class="col-sm-2 col-form-label">Mot de passe</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe initial" required>
          <small id="smdp" class="form-text text-danger" hidden>Ce champ doit être rempli</small>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-10 offset-sm-2 d-flex justify-content-between">
          <div>
            <button id="ajouter" type="submit" class="btn btn-primary me-2">
              <i class="fas fa-user-plus"></i> Ajouter un étudiant
            </button>
            <button type="reset" class="btn btn-outline-primary">
              <i class="fas fa-undo"></i> Réinitialiser
            </button>
          </div>
          <button class="btn btn-dark" id="afficherEtd" data-bs-toggle="collapse" href="#listeEtd">
            <i class="fas fa-list"></i> Afficher la liste des étudiants
          </button>
        </div>
      </div>
    </form>

    <h3 id="res" class="my-3 text-center" style="color:green" hidden></h3>

    <div class="row collapse mt-5" id="listeEtd">

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

      <table id="etudiants" class="table table-bordered border-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Adresse</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody id="listStudent">
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>James</td>
            <td>mark.james@gmail.com</td>
            <td>2000</td>
            <td>GIiiiiiii</td>
            <td>
              <div class="d-flex justify-content-between align-items-center">
                <button class="btn btn-primary me-2">
                  <a class="text-reset text-decoration-none text-truncate" href="affectationMdl.php"><i class="fas fa-th"></i> Affecter des modules</a>
                </button>
                <button class="btn btn-dark me-2">
                  <a class="text-reset text-decoration-none text-truncate" href="afficherMdlEtd.php"><i class="fas fa-list"></i> Afficher les modules</a>
                </button>
                <button class="btn btn-light btn-outline-secondary me-2 text-truncate">
                  <i class="fas fa-pencil-alt"></i> Modifier
                </button>
                <button class="btn btn-danger text-truncate">
                  <i class="fas fa-trash"></i> Supprimer
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      
      
    </div>
    
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
