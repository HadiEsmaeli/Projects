<?php require "includes/header.php"; ?>
<?php require "conf.php"; ?>

<?php

$get = $connect->query("SELECT * FROM `posts`");
$get->execute();

$data = $get->fetchAll(PDO::FETCH_OBJ);

?>

<main class="form-signin w-50 m-auto mt-5">
    <?php foreach( $data as $info ) : ?> <!-- fetching data from posts table -->
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo $info->title; ?></h5>
                <p class="card-text"><?php echo substr($info->body, 0, 75) . "..."; ?></p>
                <a target="_blank" href="show.php?id=<?php echo $info->id; ?>" class="btn btn-primary">More</a>
            </div>
        </div>
    <?php endforeach; ?>
</main>


<?php require "includes/footer.php"; ?>
