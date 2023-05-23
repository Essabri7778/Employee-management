<?php 
session_start();
include_once("headerEtd.php"); 
?>


<div class="container" style="padding: 20px;">
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1>Modifier Mot de Passe</h1>
    </div>
    <form id="formulaire">
        <h1 id="succes" style="background-color: lightgreen; color:darkgreen; font-size: medium; padding :10px;" hidden>
            Modification faite avec succès</h1>
        <h1 id="failed" style="background-color: #FFCCCB; color:darkred; font-size: medium; padding :10px;" hidden>
            Modification non faite</h1>

        <div class="form-group row mb-3">
            <label for="mdpO" class="col-sm-2 col-form-label">Ancien Mot de passe</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="ancienMdp" id="mdpO" placeholder="Mot de passe"
                    value="<?= $_SESSION['mdp'];?>">
                <small id="smdpO" class="form-text text-danger" hidden>Ce champ doit être rempli</small>
            </div>
        </div>


        <div class="form-group row mb-3">
            <label for="MdpN" class="col-sm-2 col-form-label">Nouveau Mot de passe</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="nouveauMdp" id="mdpN" placeholder="Mot de passe">
                <small id="smdpN" class="form-text text-danger" hidden>Ce champ doit être rempli</small>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10 offset-sm-2 d-flex justify-content-end">
                <div>
                    <button id="modifier" type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-pen"></i> Modifier
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
<script src="../../scripts/editMdpEtd.js" type="module"></script>
</body>

</html>