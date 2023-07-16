<?php require '../layouts/header.php'; ?>
<?php require '../../config/config.php'; ?>

<?php

if( !isset( $_SESSION['useradmin'] ) ){
  header('location: '.ADMINURL.'admins/login-admins.php');
  exit;
}

if( isset( $_GET['id'] ) AND !empty( $_GET['id'] ) ){

  $id = $_GET['id'];

  $get = $conn->prepare("SELECT * FROM `categories` WHERE `id` = :val");
  $get->execute([':val' => $id]);
  $cat = $get->fetch(PDO::FETCH_OBJ);

}else{
  header('location: ' . ADMINURL .'categories-admins/show-categories.php');
}

if( isset( $_POST['submit'] ) ) {

  $name = $_POST['name'];
  if( isset( $name ) AND !empty( $name ) ) {
    $update = $conn->prepare("UPDATE `categories` SET `name` = :cat WHERE `id` = :catid");
    $update->execute([':cat'=>$name, ':catid'=>$id]);
    header('location: ' . ADMINURL .'categories-admins/show-categories.php');

  }else{
    header('location: ' . ADMINURL .'categories-admins/show-categories.php');
  }
}

?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Update Categories</h5>
        <form method="POST" action="update-category.php?id=<?php echo $cat->id; ?>" enctype="multipart/form-data">
          <!-- Email input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="name" value="<?php echo $cat->name; ?>" id="form2Example1" class="form-control" placeholder="name" />
            
          </div>
          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>    
        </form>

      </div>
    </div>
  </div>
</div>
<?php require '../layouts/footer.php'; ?>
