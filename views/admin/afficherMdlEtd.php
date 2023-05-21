<?php include_once("header.php"); ?>    

    <div class="container" style="padding: 20px;">
        <div class="d-flex justify-content-between align-items-end mb-3">
          <h1>Module d'etudiant:</h1>
          <div>
            <button id="afficherEtd" class="btn btn-dark">
              <a class="text-reset text-decoration-none" href="gestionMdl.php"><i class="fas fa-list"></i> Gerer les modules</a>
            </button>
          </div>
        </div>      
        <table id="personnes" class="table table-bordered border-dark">
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
              <td>
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