<?php

/*** adding to DB **/
function registeringUser($connect, $e, $u, $p){
    $add = $connect->prepare("INSERT INTO `users` (email, usrname, passwrd) VALUES (:email, :usrname, :passwrd)");

    return $add->execute([
    ':email' => $e,
    ':usrname' => $u,
    ':passwrd' => password_hash($p, PASSWORD_DEFAULT)
    ]);
}
