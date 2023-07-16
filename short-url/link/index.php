<?php require "../conf.php";

if( isset( $_GET['id'] ) ){

    $id = $_GET['id'];

    $select = $connect->prepare(' SELECT * FROM `urls` WHERE id = :id ');
    $select->execute( [":id" => $id] );

    $data = $select->fetch(PDO::FETCH_OBJ);

    $update = $connect->prepare(" UPDATE urls SET clicks = clicks + 1 WHERE id = :id ");
    $update->execute( [ ':id' => $id ] );

    header('location:'.$data->url);
}