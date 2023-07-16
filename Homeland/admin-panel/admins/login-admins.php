<?php require '../layouts/header.php'; ?>
<?php require '../../config/config.php'; ?>
<?php

if( isset( $_SESSION['useradmin'] ) ){
  header('location: '.ADMINURL.'');
  exit;
}

if( isset( $_POST['submit'] ) ){

  $email = $_POST['email'];
  $password = $_POST['password'];

  if( empty( $email ) OR empty( $password ) ){
    echo "<script>alert('some of the feilds are empty!');</script>";
  }else {

    $login = $conn->prepare("SELECT * FROM `admins` WHERE `email` = :mail");
    $login->execute([ ':mail' => $email ]);

    if( $login->rowCount() > 0 ){ 

      $fetch = $login->fetch(PDO::FETCH_ASSOC);

      if( password_verify( $password, $fetch['adminpass'] ) ){

        $_SESSION['useradmin'] = $fetch['adminname'];
        $_SESSION['emailadmin'] = $fetch['email'];
        $_SESSION['adminid'] = $fetch['id'];

        header('location: ' . ADMINURL);

      }else{
        echo "<script>alert('something wrong!')</script>";
      }

    }else{
      echo "<script>alert('something wrong!')</script>";
    }

  }
}

?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mt-5">Login</h5>
        <form method="POST" action="login-admins.php" class="p-auto">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
            
            </div>

            
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
              
            </div>



            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

          
          </form>

      </div>
</div>
<?php require '../layouts/footer.php'; ?>