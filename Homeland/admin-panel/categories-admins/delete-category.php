<?php require '../layouts/header.php'; ?>
<?php require '../../config/config.php'; ?>

<?php

if( !isset( $_SESSION['useradmin'] ) ){
  header('location: '.ADMINURL.'admins/login-admins.php');
  exit;
}

if( isset( $_GET['id'] ) AND !empty( $_GET['id'] ) ){

  $id = $_GET['id'];

  $get = $conn->prepare("DELETE FROM `categories` WHERE `id` = :val");
  $get->execute([':val' => $id]);
  header('location: ' . ADMINURL .'categories-admins/show-categories.php');

}else{
  header('location: ' . ADMINURL .'categories-admins/show-categories.php');
}
