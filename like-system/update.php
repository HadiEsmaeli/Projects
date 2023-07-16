<?php

require 'conf.php';

if( isset( $_POST['id'] ) AND isset( $_POST['val'] ) ){

    $id = $_POST['id'];
    $val = $_POST['val'];

    $update = $connect->prepare("UPDATE `posts` SET `likes` = :val WHERE `id` = :id");
    $update->execute([
        ':val' => $val,
        ':id' => $id
    ]);

}