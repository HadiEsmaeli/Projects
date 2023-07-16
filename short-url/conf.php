<?php

try {

    $host = "localhost";
    $dbname = "shorturl";
    $user = "root";
    $pass = "";

    $connect = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo "error is: " . $e->getMessage();
}