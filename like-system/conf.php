<?php

global $connect;
try{
    //hostname
    $host = "localhost";


    //database_name
    $dbname = "like-system";


    //username
    $user = "root";

    //password
    $pass = "";

    $connect = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);
    $connect->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);

}catch(PDOException $e){

    echo "<h2>Wrong to connection.</h2>";
    die();
}

?>