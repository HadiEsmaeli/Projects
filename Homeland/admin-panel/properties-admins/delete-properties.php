<?php require '../layouts/header.php'; ?>
<?php require '../../config/config.php'; ?>

<?php

if( !isset( $_SESSION['useradmin'] ) ){
  header('location: '.ADMINURL.'admins/login-admins.php');
  exit;
}


if( isset( $_GET['id'] ) AND !empty( $_GET['id'] ) ){

    $id = $_GET['id'];

    //delete thumbnails
    $get = $conn->prepare("SELECT * FROM `props` WHERE `id` = :val");
    $get->execute([':val' => $id]);

    $fetch = $get->fetch(PDO::FETCH_OBJ);

    unlink("thumbnails/" . $fetch->image);

    //delete property from the table

    $del = $conn->prepare("DELETE FROM `props` WHERE `id` = :val");
    $del->execute([':val' => $id]);

    //get relate images and delete
    $getRelateImage = $conn->prepare("SELECT * FROM `related_images` WHERE `prop_id` = :val");
    $getRelateImage->execute([':val' => $id]);

    $fetch = $getRelateImage->fetchAll(PDO::FETCH_OBJ);
    foreach( $fetch as $img ){
      unlink('images/' . $img->image);
    }

    $del = $conn->prepare("DELETE FROM `related_images` WHERE `prop_id` = :val");
    $del->execute([':val' => $id]);

    header('location: ' . ADMINURL .'properties-admins/show-properties.php');

}else{
  header('location: ' . ADMINURL .'categories-admins/show-categories.php');
}
