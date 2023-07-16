<?php require '../layouts/header.php'; ?>
<?php require '../../config/config.php'; ?>

<?php

if( !isset( $_SESSION['useradmin'] ) ){
  header('location: '.ADMINURL.'admins/login-admins.php');
  exit;
}

$cat = $conn->query("SELECT * FROM `categories`");
$cat->execute();

$get = $cat->fetchAll(PDO::FETCH_OBJ);

?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Categories</h5>
        <a href="create-category.php" class="btn btn-primary mb-4 text-center float-right">Create Categories</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">update</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach( $get as $cat ) : ?>
              <tr>
                <th scope="row"><?php echo $cat->id; ?></th>
                <td><?php echo $cat->name; ?></td>
                <td><a  href="update-category.php?id=<?php echo $cat->id; ?>" class="btn btn-warning text-white text-center ">Update</a></td>
                <td><a href="delete-category.php?id=<?php echo $cat->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table> 
      </div>
    </div>
  </div>
</div>
<?php require '../layouts/footer.php'; ?>
