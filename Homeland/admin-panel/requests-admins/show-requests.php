<?php require '../layouts/header.php'; ?>
<?php require '../../config/config.php'; ?>

<?php

if( !isset( $_SESSION['useradmin'] ) ){
  header('location: '.ADMINURL.'admins/login-admins.php');
  exit;
}

$props = $conn->prepare("SELECT * FROM `request` WHERE `creator` = :usercreate");
$props->execute(['usercreate' => $_SESSION['useradmin']]);

$get = $props->fetchAll(PDO::FETCH_OBJ);

?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Requests</h5>
      
        <table class="table mt-3">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">email</th>
              <th scope="col">phone</th>
              <th scope="col">go to this property</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach( $get as $reqs ) : ?>
              <tr>
                <th scope="row"><?php echo $reqs->id; ?></th>
                <td><?php echo $reqs->name; ?></td>
                <td><?php echo $reqs->email; ?></td>
                <td><?php echo $reqs->phone; ?></td>
                  <td><a href="http://localhost/homeland/property-details.php?id=<?php echo $reqs->propid; ?>" class="btn btn-success  text-center ">go</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table> 
      </div>
    </div>
  </div>
</div>
<?php require '../layouts/footer.php'; ?>
