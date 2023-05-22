<?php include_once("headerEtd.php"); ?>
<body>
  <div class="container-fluid bg-primary text-white">
    <header class="header text-center py-5">
      <h1 class="display-4 fw-bold">Bienvenue, Hamid!</h1>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <p class="lead">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus provident repellat minus, animi praesentium consequatur explicabo nisi? Quod, consequuntur hic? Ad ex, explicabo modi esse saepe aliquam et officiis nemo!
            </p>
          </div>
        </div>
        <div class="row justify-content-center mt-4">
          <div class="col-lg-6">
            <a href="afficherEtdNotes.php" class="btn btn-light btn-lg me-3">
              <i class="fas fa-list"></i> Voir Notes
            </a>
            <a href="afficherEtdMdl.php" class="btn btn-outline-light btn-lg">
              <i class="fas fa-book"></i> Voir Modules
            </a>
          </div>
        </div>
      </div>
    </header>
    <div class="image-container">
      <img src="../assets/students.png" alt="Illustration" class="img-fluid">
    </div>
  </div>
  <footer class="footer bg-white text-center py-3">
    <div class="container">
      <p class="mb-0">&copy; 2023 Scolarité</p>
    </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>