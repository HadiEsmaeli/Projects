<?php
  if( isset( $_SESSION['username'] ) ){
    header('location: /auth-system');
  }
?>
<?php require "includes/header.php"; ?>
<?php require "conf.php"; ?>

<?php
    
    // check for the submit

    //Take the data and do the query

    //execute the query 

    //fetch the data 

    //check for the row count

    //and use the password_verify function

    $email = ( isset( $_POST['email'] ) ? filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL ) : "" );
    $password = ( isset( $_POST['password'] ) ? filter_var( $_POST['password'], FILTER_SANITIZE_STRING ) : "" );

    if( $email !=='' AND $password !== '' ){

      $user = $connect->prepare("SELECT * FROM `users` WHERE `email` = :email");
      $user->execute([ ':email' => $email ]);
      $data = $user->fetch(PDO::FETCH_ASSOC);

      if( $user->rowCount() > 0 ){

        if( password_verify($password, $data['passwrd']) ){

          $_SESSION['username'] = $data['usrname'];
          $_SESSION['password'] = $data['passwrd'];

          header('location: /auth-system');
        }else
          echo "email or password not correct!";

      }else{
        echo "email or password not correct!";
      }

    }

?>

<main class="form-signin w-50 m-auto">
  <form method="POST" action="login.php">
    <h1 class="h3 mt-5 fw-normal text-center">Please login in</h1>

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
       name="password"
       type="password"
       class="form-control"
       id="floatingPassword"
       placeholder="Password"
       value="<?php echo $password !== '' ? $password : '' ?>"
      >
      <label for="floatingPassword">Password</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">login</button>
    <h6 class="mt-3">Don't have an account  <a href="register.php">Create your account</a></h6>
  </form>
</main>
<?php require "includes/footer.php"; ?>
