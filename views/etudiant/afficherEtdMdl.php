<?php include_once("headerEtd.php"); ?>

<div class="container" style="padding: 20px;">

  <div class="container-fluid bg-primary text-white">
    <div class="text-center">
      <h1 class="display-2 fw-bold" style="background-color: rgba(0, 0, 0, 0.7); padding: 20px;">
        Liste de Mes Modules</h1>
    </div>
  </div>


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

  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Module</h5>
          <p class="card-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, beatae architecto, aperiam error fugit, consectetur exercitationem omnis magnam placeat dolorum totam iure tempore excepturi at voluptates ratione. Incidunt, quas officiis!
          </p>
          <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i> Complet</span>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Module</h5>
          <p class="card-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, beatae architecto, aperiam error fugit, consectetur exercitationem omnis magnam placeat dolorum totam iure tempore excepturi at voluptates ratione. Incidunt, quas officiis!
          </p>
          <span class="badge bg-primary"><i class="fas fa-spinner me-1"></i> En cours</span>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Module</h5>
          <p class="card-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, beatae architecto, aperiam error fugit, consectetur exercitationem omnis magnam placeat dolorum totam iure tempore excepturi at voluptates ratione. Incidunt, quas officiis!
          </p>
          <span class="badge bg-primary"><i class="fas fa-spinner me-1"></i> En cours</span>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
