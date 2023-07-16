<?php 

  if( isset( $_SESSION['username'] ) ){
    header('location: /auth-system');
  }

  require "conf.php";
  require 'functions.php';
?>

<?php require "includes/header.php"; ?>

<?php

  $email = ( isset( $_POST['email'] ) ? filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL ) : "" );
  $username = ( isset( $_POST['username'] ) ? filter_var( $_POST['username'], FILTER_SANITIZE_STRING ) : "" );
  $password = ( isset( $_POST['password'] ) ? filter_var( $_POST['password'], FILTER_SANITIZE_STRING ) : "" );


  if( isset( $_POST['submit'] ) ){

    if( $email == '' or $username == '' or $password == '' ){
      echo "some of the feilds are empty.";
    }else{

      /*** regester user to database -> auth-sys, table -> users ***/
      $added = registeringUser($connect, $email, $username, $password );

      if( $added )
        header('location: /auth-system');

    }

  }

?>

<main class="form-signin w-50 m-auto">
  <form method="POST" action="register.php">
   
    <h1 class="h3 mt-5 fw-normal text-center">Please Register</h1>

    <div class="form-floating">
      <input 
        name="email"
        type="email"
        class="form-control"
        id="floatingInput"
        placeholder="name@example.com"
        value="<?php echo $email !== '' ? $email : '' ?>"
      >
      <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating">
      <input
        name="username"
        type="text"
        class="form-control"
        id="floatingInput"
        placeholder="username"
        value="<?php echo $username !== '' ? $username : '' ?>"
      >
      <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating">
      <input
        name="password"
        type="password"
        class="form-control"
        id="floatingPassword"
        placeholder="Password"
        value="<?php echo $password !== '' ? $password : '' ?>"
      >
      <label for="floatingPassword">Password</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">register</button>
    <h6 class="mt-3">Aleardy have an account?  <a href="login.php">Login</a></h6>

  </form>
</main>
<?php require "includes/footer.php"; ?>
