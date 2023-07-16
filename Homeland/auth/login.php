<?php require "../includes/header.php"; ?>
  
<?php

if( isset( $_SESSION['username'] ) ){
  header('location: '.APPURL.'');
  die();
}

require "../config/config.php";

if( isset( $_POST['submit'] ) ){

  $email = $_POST['email'];
  $password = $_POST['password'];

  if( empty( $email ) OR empty( $password ) ){
    echo "<script>alert('some of the feilds are empty!');</script>";
  }else {

    $login = $conn->prepare("SELECT * FROM `users` WHERE `email` = :mail");
    $login->execute([ ':mail' => $email ]);

    if( $login->rowCount() > 0 ){

      $fetch = $login->fetch(PDO::FETCH_ASSOC);

      if( password_verify($password, $fetch['pass']) ){

        $_SESSION['username'] = $fetch['username'];
        $_SESSION['email'] = $fetch['email'];
        $_SESSION['userid'] = $fetch['id'];

        header('location: '.APPURL.'');

      }else{
        echo "<script>alert('something wrong!')</script>";
      }

    }else{
      echo "<script>alert('something wrong!')</script>";
    }

  }
}

?>

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo APPURL; ?>images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-10">
        <h1 class="mb-2">Log In</h1>
      </div>
    </div>
  </div>
</div>


<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
        <h3 class="h4 text-black widget-title mb-3">Login</h3>
        <form action="login.php" method="POST" class="form-contact-agent">
        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" type="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <input name="submit" type="submit" id="phone" class="btn btn-primary" value="Login">
        </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<?php require "../includes/footer.php"; ?>
