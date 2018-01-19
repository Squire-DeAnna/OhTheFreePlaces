<?php

    function databaseConnect(){
     $server = "localhost";
     $database = "freeplac_schema";
     $user = "root";
     $password = "";
     $dsn = "mysql:host=$server;dbname=$database";
     $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

     try {
         $databaseLink = new PDO($dsn, $user, $password, $options);
         return $databaseLink;
     } catch (PDOException $ex) {
         header('location: ../errors/db_error.php');
     }
 }


