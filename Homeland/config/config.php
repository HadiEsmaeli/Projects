<?php

try {
    //host
    if( !defined("HOSTNAME") ) define("HOSTNAME", "localhost");

    //DBNAME
    if( !defined("DBNAME") ) define("DBNAME", "homeland");

    //user
    if( !defined("USER") ) define("USER", "root");

    //password
    if( !defined("PASS") ) define("PASS", "");

    $conn = new PDO("mysql:host=".HOSTNAME.";dbname=".DBNAME.";", USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch( PDOException $e ){
    die( "DATABASE CONNECTION FAILED: " . $e->getMessage() );
}
