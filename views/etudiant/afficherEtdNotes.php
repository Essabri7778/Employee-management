<?php include_once("headerEtd.php"); ?>
    

    <div class="container" style="padding: 20px;">
                  
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
              <th scope="col">Evaluation</th>
              <th scope="col">Module</th>
              <th scope="col">Valeure</th>
            </tr>
          </thead>
          <tbody id="listStudent">
            <tr>
              <td>Type</td>
              <td>Module</td>
              <td>20</td>
              
            </tr>
          </tbody>
        </table>
      </div>
      
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>