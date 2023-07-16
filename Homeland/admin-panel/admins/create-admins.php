<?php require '../layouts/header.php'; ?>
<?php require '../../config/config.php'; ?>

<?php
if( !isset( $_SESSION['useradmin'] ) ){
  header('location: '.ADMINURL.'');
  exit;
}

if( isset( $_POST['submit'] ) ){

  $user = $_POST['usernameadmin'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if( empty( $user ) OR empty( $email ) OR empty( $password ) ){
    echo "<script>alert('some of the feilds are empty!');</script>";
  }else {

    define("PASSWORD", password_hash($password, PASSWORD_DEFAULT));
    
    $insert = $conn->prepare("INSERT INTO `admins` (adminname, email, adminpass) VALUES 
      (:user, :email, :pass)");

    $insert->execute([
      ':user' => $user,
      ':email' => $email,
      ':pass' => PASSWORD
    ]);

    header('location: ' . ADMINURL .'admins/admins.php');

  }
}

?>

<div class="row">
<div class="col">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title mb-5 d-inline">Create Admins</h5>
      <form method="POST" action="create-admins.php">
        <!-- Email input -->
        <div class="form-outline mb-4 mt-4">
          <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />
          
        </div>

        <div class="form-outline mb-4">
          <input type="text" name="usernameadmin" id="form2Example1" class="form-control" placeholder="username" />
        </div>
        <div class="form-outline mb-4">
          <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
        </div>

        <!-- Submit button -->
        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
      </form>
    </div>
  </div>
</div>
</div>

<?php require '../layouts/footer.php'; ?>
