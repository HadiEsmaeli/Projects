<?php

require "conf.php";

if( isset( $_POST['search'] ) ) {
    $word = $_POST['search'];

    $select = $connect->prepare("SELECT * FROM `posts` WHERE `title` LIKE :search");
    $select->execute([':search' => $word.'%']);

    if( $select->rowCount() > 0 ) {

        $fetch = $select->fetchAll(PDO::FETCH_OBJ);

?>

<?php foreach( $fetch as $data ) : ?>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title"><?php echo $data->title; ?></h5>
            <p class="card-text"><?php echo substr($data->body, 0, 75) . "..."; ?></p>
        </div>
    </div>

<?php endforeach; ?>

<?php
    }else {
        echo "Dosn't enything";
    }
}

?>

