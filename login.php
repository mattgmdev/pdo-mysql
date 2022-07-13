<?php
define('BASEPATH', true); //access connection script if you omit this line file will be blank
require 'db.php'; //require connection script

if (isset($_POST['submit'])) {
    // try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // controlla che i campi non siano vuoti
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

    //Recupera dati in base alle credenziali immesse
    $sql = "SELECT id, email, password FROM admin WHERE email = :email";
    $stmt = $pdo->prepare($sql);


    $stmt->bindValue(':email', $email);


    $stmt->execute();


    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($user === false) {
        echo '<script>alert("email o password non corrette")</script>';
    } else {

        // Compara e decripta la password.
        $validPassword = password_verify($passwordAttempt, $user['password']);


        if ($validPassword) {



            $_SESSION['admin'] = $email;
            echo '<script>window.location.replace("dashboard.php");</script>';
            exit;
        } else {

            echo '<script>alert("email o password non corrette")</script>';
        }
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
        <h3 align="center">Login</h3>
        <br />
        <form action="login.php" method="post" class="col-6 col-md-4">
            <div class="mb-3"><label>Inserisci la tua email</label>
                <input type="text" name="email" placeholder="email" class="form-control">
            </div>
            <div class="mb-3">
                <label>Inserisci la tua password</label>
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button name="submit" type="submit" class="btn btn-info">Accedi</button>
            <br />
            <p align="center"><a href="registrati.php">Registrati</a></p>
        </form>