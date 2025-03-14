<?php
function getDatabaseConnection()
{
    $host = 'localhost';
    $dbname = 'takenlijst';  // Pas aan als je een andere database gebruikt
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $pdo;
    } catch (PDOException $e) {
        die("Databaseverbinding mislukt: " . $e->getMessage());
    }
}
