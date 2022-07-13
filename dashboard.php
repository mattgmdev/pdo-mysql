<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtra risultati</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Filtra utenti in base alle date di scadenza delle patenti</h4>
                        <div class="col-md-4">
                            <div class="form-group">
                                <a href="registrati.php">
                                    <button type="submit" class="btn btn-info">Inserisci nuovo utente</button></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Dal</label>
                                        <input type="date" name="from_date" value="<?php if (isset($_GET['from_date'])) {
                                                                                        echo $_GET['from_date'];
                                                                                    } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>al</label>
                                        <input type="date" name="to_date" value="<?php if (isset($_GET['to_date'])) {
                                                                                        echo $_GET['to_date'];
                                                                                    } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Esegui la ricerca</label> <br>
                                        <button type="submit" class="btn btn-info">Filtra</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nome</th>
                                    <th>Cognome</th>
                                    <th>Numero Patente</th>
                                    <th>Scadenza Patente</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $con = mysqli_connect("localhost", "root", "root", "pdo");

                                if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $query = "SELECT * FROM admin WHERE scadenza BETWEEN '$from_date' AND '$to_date' ";
                                    $query_run = mysqli_query($con, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $row) {
                                ?>
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['nome']; ?></td>
                                                <td><?= $row['cognome']; ?></td>
                                                <td><?= $row['n_patente']; ?></td>
                                                <td><?= $row['scadenza']; ?></td>
                                                <td><?= $row['email']; ?></td>
                                            </tr>
                                <?php
                                        }
                                    } else {
                                        echo "Nessun risultato trovato";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>