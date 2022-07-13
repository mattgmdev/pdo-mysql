<?php
define('BASEPATH', true); //access connection script if you omit this line file will be blank
require 'db.php'; //require connection script

if (isset($_POST['submit'])) {
    try {
        $connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        $user = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $n_patente = $_POST['n_patente'];
        $scadenza = $_POST['scadenza'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        // hash password
        $pass = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));

        // Controlla se è già presente lo stesso nome utente
        $sql = "SELECT COUNT(nome) AS num FROM admin WHERE nome =      :nome";
        $schema = $pdo->prepare($sql);

        $schema->bindValue(':nome', $user);
        $schema->execute();
        $row = $schema->fetch(PDO::FETCH_ASSOC);

        if ($row['num'] > 0) {
            echo '<script>alert("Nome utente già esistente")</script>';
        } else {

            $schema = $connection->prepare("INSERT INTO admin (nome, cognome, n_patente, scadenza, email, password) 
    VALUES (:nome, :cognome, :n_patente, :scadenza, :email, :password)");
            $schema->bindParam(':nome', $user);
            $schema->bindParam(':cognome', $cognome);
            $schema->bindParam(':n_patente', $n_patente);
            $schema->bindParam(':scadenza', $scadenza);
            $schema->bindParam(':email', $email);
            $schema->bindParam(':password', $pass);



            if ($schema->execute()) {
                echo '<script>alert("Nuovo account creato.")</script>';
                // redirect alla pagina di login
                echo '<script>window.location.replace("login.php")</script>';
            } else {
                echo '<script>alert("Ooops, qualcosa è andato storto")</script>';
            }
        }
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
        echo '<script type="text/javascript">alert("' . $error . '");</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body class="container-sm ">
    <div class="row justify-content-center mt-3">
        <h3 align="center">Form di registrazione</h3>
        <br />
        <form action="registrati.php" method="post" class="col-6 col-md-4">
            <div class="mb-3"><label for="nome" class="form-label">Nome</label>
                <input type="text" required="required" name="nome" placeholder="nome" class="form-control">
            </div>
            <div class="mb-3">
                <label for="cognome" class="form-label">Cognome</label>
                <input type="text" required="required" name="cognome" placeholder="cognome" class="form-control">
            </div>
            <div class="mb-3">
                <label for="n_patente" class="form-label">Numero Patente</label>
                <input type="text" required="required" name="n_patente" placeholder="Numero Patente" class="form-control">
            </div>
            <div class="mb-3">
                <label for="scadenza" class="form-label">Scadenza Patente</label>
                <input type="date" required="required" name="scadenza" placeholder="Scadenza Patente" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Indirizzo Email</label>
                <input required="required" type="email" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input required="required" type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button name="submit" type="submit" class="btn btn-info">registrati</button>
            <br />
            <p align="center"> <a href="login.php">Login</a></p>
        </form>