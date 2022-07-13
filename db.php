<?php
defined('BASEPATH') or exit('non sono permessi accessi diretti'); //prevent direct script access
$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'pdo';
$dsn = '';

try {
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'connessione al db fallita: ' . $e->getMessage();
}
