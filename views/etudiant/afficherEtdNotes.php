<?php include_once("headerEtd.php"); ?>

<div class="container" style="padding: 20px;">

    <div class="container-fluid bg-primary text-white">
        <div class="text-center">
            <h1 class="display-2 fw-bold" style="background-color: rgba(0, 0, 0, 0.7); padding: 20px;">
                Liste de Mes Notes
            </h1>
        </div>
    </div>
    <form id="formulaire">
        <div class="form-group row mb-3">
            <div class="input-group">
                <div class="form-outline flex-grow-1">
                    <input type="search" id="searchBar" name="search" class="form-control" placeholder="Chercher" />
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <table id="personnes" class="table table-bordered border-dark">
        <thead>
            <tr>
                <th scope="col"><i class="fas fa-bookmark"></i> Evaluation</th>
                <th scope="col"><i class="fas fa-book"></i> Module</th>
                <th scope="col"><i class="fas fa-chart-bar"></i> Valeur</th>
            </tr>
        </thead>
        <tbody id="listNotes">
            <tr>
                <td>Type</td>
                <td>Module</td>
                <td>20</td>
            </tr>
        </tbody>
    </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/js/all.min.js" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../scripts/afficherEtdNotes.js" type="module"></script>
</body>

</html>