<?php
include_once 'config.php';

try {
    $connessione = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
} catch (PDOException $eccezione) {
    echo $eccezione->getMessage();
} finally {
    echo 'finally: questo codice viene eseguito in ogni caso';
}

echo 'sei connesso';
