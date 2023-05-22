<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./views/style.css" />
    <link rel="icon" href="./views/assets/favicon.ico" type="image/x-icon">
    <title>Scolarité</title>
</head>

<body>
    <section class="vh-100 bg-primary">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div
                                class="col-md-6 col-lg-5 d-none d-md-block d-flex justify-content-center align-items-center">
                                <img src="./views/assets/girl-with-headphones-using-laptop-along-her-classmates-during-group-study.jpg"
                                    alt="login form" class="img-fluid log-img">
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form id="loginForm">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-school fa-2x me-3 text-primary"></i>
                                            <span class="h1 fw-bold mb-0">Scolarité</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connecter a votre
                                            Compte</h5>

                                        <div class="mb-3">
                                            <label class="form-label mb-2 text-primary" for="userType">
                                                <i class="fas fa-user-cog"></i> Type de compte:
                                            </label>
                                            <select class="form-select bg-light text-primary" id="userType" name="role">
                                                <option value="admin"><i class="fas fa-user-shield"></i> Admin</option>
                                                <option value="etudiant"><i class="fas fa-user-graduate"></i> Etudiant
                                                </option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-2 text-muted" for="identifiant">Identifiant</label>
                                            <input id="identifiant" type="identifiant" class="form-control" name="login"
                                                value="" required autofocus>
                                            <small id="sidentifiantVide" class="form-text text-danger" hidden>Ce champ
                                                doit être rempli!</small>
                                            <small id="sidentifiantFaux" class="form-text text-danger" hidden>Ce champ
                                                n'est pas valide!</small>
                                        </div>

                                        <div class="mb-4">
                                            <label class="mb-2 text-muted" for="mdp">Mot de Passe</label>
                                            <input id="mdp" type="mdp" class="form-control" name="mdp" required>
                                            <small id="smdp" class="form-text text-danger" hidden>Ce champ doit être
                                                rempli!</small>
                                            <small id="smdpFaux" class="form-text text-danger" hidden>Ce champ n'est pas
                                                valide!</small>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button type="submit" class="btn btn-primary w-100">
                                                Se Connecter
                                            </button>
                                        </div>



                                        <div class="text-center mt-5 text-secondary">
                                            &copy; 2023 Scolarité
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="./scripts/login.js" type="module"></script>
</body>

</html>