<?php
require 'conf.php';

function getcomment($id='id', PDO $connect) {
    if( isset( $_GET[$id] ) ){

        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

        $get = $connect->prepare("SELECT * FROM `comments` WHERE `postid` = :id");
        $get->execute([':id'=>$id]);

        $data = $get->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
}

?>
