<?php require "../includes/header.php"; ?>

<?php

if( isset( $_SESSION['username'] ) ){
  header('location: /homeland');
  die();
}

require "../config/config.php";

if( isset( $_POST['submit'] ) ){

  $user = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if( empty( $user ) OR empty( $email ) OR empty( $password ) ){
    echo "<script>alert('some of the feilds are empty!');</script>";
  }else {

    define("PASSWORD", password_hash($password, PASSWORD_DEFAULT));
    
    $insert = $conn->prepare("INSERT INTO `users` (username, email, pass) VALUES 
      (:username, :email, :pass)");

    $insert->execute([
      ':username' => $user,
      ':email' => $email,
      ':pass' => PASSWORD
    ]);

    header('location: login.php');

  }
}

?>

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo APPURL; ?>images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Register</h1>
          </div>
        </div>
      </div>
    </div>
    

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
            <h3 class="h4 text-black widget-title mb-3">Register</h3>
            <form action="register.php" method="POST" class="form-contact-agent">

              <div class="form-group">
                  <label for="email">Username</label>
                  <input name="username" type="username" id="username" class="form-control">
              </div>
              <div class="form-group">
                  <label for="email">Email</label>
                  <input name="email" type="email" id="email" class="form-control">
              </div>
              <div class="form-group">
                  <label for="password">Password</label>
                  <input name="password" type="password" id="password" class="form-control">
              </div>
              <div class="form-group">
                  <input name="submit" type="submit" id="phone" class="btn btn-primary" value="Register">
              </div>

            </form>
          </div>
         
        </div>
      </div>
    </div>
<?php require "../includes/footer.php"; ?>
