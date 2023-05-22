<?php 
session_start();
include_once("headerAdmin.php"); 

?>

<body class="bg-primary">
    <div class="container-fluid bg-primary text-white">
        <header class="header text-center py-4">
            <h1 class="display-4 fw-bold">Bienvenue, <?=$_SESSION['nom_complet'];?>!</h1>
        </header>
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header text-white bg-dark">
                            <h2>Liste Etudiant</h2>
                        </div>
                        <div class="card-body">
                            <table id="etudiants" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prénom</th>
                                        <th scope="col">Adresse</th>
                                        <th scope="col">Téléphone</th>
                                        <th scope="col">Email</th>
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
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header text-white bg-dark">
                            <h2>Liste Evaluations</h2>
                        </div>
                        <div class="card-body">
                            <table id="etudiants" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Module</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Heure</th>
                                        <th scope="col">Salle</th>
                                    </tr>
                                </thead>
                                <tbody id="listStudent">
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Type</td>
                                        <td>Module</td>
                                        <td>markcom</td>
                                        <td>2000</td>
                                        <td>GIiiiiiii</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header text-white bg-dark">
                            <h2>Liste Modules</h2>
                        </div>
                        <div class="card-body">
                            <table id="etudiants" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody id="listStudent">
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>JS</td>
                                        <td class="w-50">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Consequuntur, nulla ullam. Aspernatur animi consequuntur quod numquam
                                            laudantium dicta harum, autem possimus nulla quae tenetur. Dolore earum sunt
                                            ratione. Fugit, commodi.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header text-white bg-dark">
                            <h2>Liste Notes</h2>
                        </div>
                        <div class="card-body">
                            <table id="etudiants" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Evaluation</th>
                                        <th scope="col">Module</th>
                                        <th scope="col">Valeure</th>
                                    </tr>
                                </thead>
                                <tbody id="listStudent">
                                    <tr>
                                        <th scope="row">1</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <td>Type</td>
                                        <td>Module</td>
                                        <td>20</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        </html>