<?php require 'includes/header.php'; ?>
<?php require 'conf.php'; ?>
<?php require 'showcomment.php'; ?>

<?php

$flag = false;
if( isset( $_GET['id'] ) ){

    $id = $_GET['id'];

    $post = $connect->prepare("SELECT * FROM `posts` WHERE `id` = :id");
    $post->execute([ ':id' => $id ]);

    if( $post->rowCount() > 0 ){
      $flag = true;
    }

    $post = $post->fetch(PDO::FETCH_OBJ);

    // get rate number
    $rate = $connect->prepare("SELECT * FROM `rate` WHERE `postid` = :id AND `userid` = :userid");
    $rate->execute([ ':id' => $id ,
      ':userid' => isset($_SESSION['userid']) ? $_SESSION['userid'] : 0 ]);

    if( $rate->rowCount() > 0 ){
      $rate = $rate->fetch(PDO::FETCH_OBJ);
    }else{
      $rate = $id;
    }
}

?>

<div class="row">
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title"><?php echo isset( $_GET['id'] ) ? $post->title : ""; ?></h5>
            <p class="card-text"><?php echo isset( $_GET['id'] ) ? $post->body : ""; ?></p>

            <form id="form-data" method="POST">
              <div class="my-rating"></div> <!-- star rating -->
              <input id="rating" type="hidden" name="rating" value="">
              <input id="userid" type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>">
              <input
                id="postid"
                type="hidden"
                name="postid"
                value="<?php 
                  if( isset( $_GET['id'] ) ){
                    if( $rate == $id ){
                      echo $rate;
                    }else{
                      echo $rate->postid;
                    }
                  } ?>"
                >
            </form>
        </div>
    </div>
</div>


<div class="row">
  <form method="POST" id="comment_data">

  <div class="form-floating">
      <input 
        name="username"
        type="hidden"
        class="form-control"
        id="username"
        value="<?php echo $_SESSION['username']; ?>"
      >
    </div>

    <div class="form-floating">
      <input 
        name="post_id"
        type="hidden"
        class="form-control"
        id="post_id"
        value="<?php echo $post->id; ?>"
      >
    </div>

    <div class="form-floating">
        <textarea name="comment" id="comment" rows="9" placeholder="Comment" class="form-control mt-4"></textarea>
      <label for="floatingPassword">comment</label>
    </div>

    <button name="submit" id="sendcomment" class="w-100 btn btn-lg btn-primary mt-5">send</button>
    <div id="msg"></div>
  </form>


  <div class="row replace">
    <?php
      if( $flag ) {
        $data = getcomment('id', $connect);
        foreach ( $data as $info ):
    ?>
      <div class="card mt-4" id="deleterow-<?php echo $info->id; ?>">
        <div class="card-body">
          <h5 class="card-title"><?php echo $info->username; ?></h5>
          <p class="card-text"><?php echo $info->comment; ?></p>
        </div>
      </div>
    <?php endforeach; } ?>
  </div>

</div>

<?php require 'includes/footer.php'; ?>
