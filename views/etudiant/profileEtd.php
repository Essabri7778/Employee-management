<?php 
error_reporting(0);
session_start();
include_once("headerEtd.php"); ?>


<div class="container" style="padding: 20px;">
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1>Mon profil</h1>
    </div>
    <form id="formulaire">
        <h1 id="succes" style="background-color: lightgreen; color:darkgreen; font-size: medium; padding :10px;" hidden>
            Modification faite avec succès</h1>
        <h1 id="failed" style="background-color: #FFCCCB; color:darkred; font-size: medium; padding :10px;" hidden>
            Modification non faite</h1>

        <div class="form-group row mb-3">
            <input type="hidden" id="id">
            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom de l'étudiant"
                    value="<?= $_SESSION['nom'];?>">
                <small id="snom" class="form-text text-danger" hidden>Ce champ doit être rempli</small>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom de l'étudiant"
                    value="<?= $_SESSION['prenom'];?>">
                <small id="sprenom" class="form-text text-danger" hidden>Ce champ doit être rempli</small>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="Address" class="col-sm-2 col-form-label">Adresse</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="adresse" id="Address" placeholder="Adresse de l'étudiant"
                    value="<?= $_SESSION['adresse'];?>">
                <small id="saddress" class="form-text text-danger" hidden>Ce champ doit être rempli</small>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="telephone" class="col-sm-2 col-form-label">Téléphone</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control" name="telephone" id="telephone" placeholder="06********"
                    value="<?= $_SESSION['tele'];?>">
                <small id="stelephone" class="form-text text-danger" hidden>Ce champ doit être rempli</small>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" placeholder="exemple@gmail.com"
                    value="<?= $_SESSION['email'];?>">
                <small id="semail" class="form-text text-danger" hidden>Ce champ doit être rempli</small>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10 offset-sm-2 d-flex justify-content-end">
                <div>
                    <button id="modifier" type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-pen"></i> Modifier
                    </button>
                </div>
            </div>
        </div>
    </form>

    <h3 id="res" class="my-3 text-center" style="color:green" hidden></h3>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../scripts/profilEtd.js" type="module"></script>
</body>

</html>