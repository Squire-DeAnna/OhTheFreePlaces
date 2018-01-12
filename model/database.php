<?php
$dsn = 'mysql:host=localhost;dbname=freeplac_schema';
    //$username = 'root';
    //$password = 'pa55word';
    
    $username = 'freeplac_admin';
    $password = 'pa55word';




    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/db_error.php');
        exit();
    }
