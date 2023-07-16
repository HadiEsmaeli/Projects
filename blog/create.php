<?php require 'includes/header.php'; ?>
<?php require 'conf.php'; ?>

<?php

  $title = ( isset( $_POST['title'] ) ? filter_var( $_POST['title'], FILTER_SANITIZE_STRING ) : "" );
  $body = ( isset( $_POST['body'] ) ? filter_var( $_POST['body'], FILTER_SANITIZE_STRING ) : "" );

  if( isset( $_POST['submit'] ) ){

    if( $title == '' or $body == '' ){
      echo "some of the feilds are empty.";
    }elseif( isset( $_SESSION['username'] ) ){

      $add = $connect->prepare(" INSERT INTO posts(title, body, username)
      VALUES (:title, :body, :username) ");
      echo $add->execute([
        ':title' => $title,
        ':body' => $body,
        ':username' => $_SESSION['username'],
      ]) ? "Post created" : "something went wrong";



    }else{ echo "please first login"; }

  }

?>

<main class="form-signin w-50 m-auto">
  <form method="POST" action="create.php">
   
    <h1 class="h3 mt-5 fw-normal text-center">create post</h1>

    <div class="form-floating">
      <input 
        name="title"
        type="text"
        class="form-control"
        id="floatingInput"
        placeholder="title"
        value="<?php echo $title !== '' ? $title : '' ?>"
      >
      <label for="floatingInput">title</label>
    </div>
    <div class="form-floating">
        <textarea rows="9" name="body" placeholder="body" class="form-control mt-4"><?php echo $body !== '' ? $body : '' ?></textarea>
      <label for="floatingPassword">body</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary mt-5" type="submit">create post</button>

  </form>
</main>

<?php require 'includes/footer.php'; ?>
