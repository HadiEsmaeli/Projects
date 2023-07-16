<?php require '../layouts/header.php'; ?>
<?php require '../../config/config.php'; ?>

<?php

if( !isset( $_SESSION['useradmin'] ) ){
  header('location: '.ADMINURL.'admins/login-admins.php');
  exit;
}

if( isset( $_POST['submit'] ) ){

  $categoryname = str_replace(' ', '-', trim($_POST['name']));

  if( empty( $categoryname ) ){
    echo "<script>alert('name field is empty!');</script>";
  }else {

    define("PASSWORD", password_hash($password, PASSWORD_DEFAULT));
    
    $insert = $conn->prepare("INSERT INTO `categories` (`name`) VALUES 
      (:str)");

    $insert->execute([
      ':str' => $categoryname,
    ]);

    header('location: ' . ADMINURL .'categories-admins/show-categories.php');

  }
}

?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Create Categories</h5>
        <form method="POST" action="create-category.php" enctype="multipart/form-data">

          <!-- Email input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
            
          </div>

          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

    
        </form>
      </div>
    </div>
  </div>
</div>
<?php require '../layouts/footer.php'; ?>
