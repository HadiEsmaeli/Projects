<?php require 'conf.php'; session_start(); ?>
<?php
    if( !isset( $_GET['id'] ) )
        die();
?>

<?php
    $lastid = $connect->prepare("SELECT * FROM `comments` WHERE `postid` = :pid");
    $lastid->execute([
        ':pid' => $_GET['id']
    ]);

    $lastcomment = $lastid->fetchAll(PDO::FETCH_OBJ);

    
?>
<?php foreach ( $lastcomment as $c ) : ?>
    <div class="card mt-4" id="deleterow-<?php echo $c->id; ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo $c->username; ?></h5>
            <p class="card-text"><?php echo $c->comment; ?></p>
        </div>
    </div>
<?php endforeach; ?>