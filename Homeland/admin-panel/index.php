<?php require 'layouts/header.php'; ?>
<?php require '../config/config.php'; ?>

<?php
if( !isset( $_SESSION['useradmin'] ) ){
    header('location: '.ADMINURL.'admins/login-admins.php');
    exit;
}

$props = $conn->query("SELECT COUNT(`id`) AS count FROM `props`");
$props->execute();
$count_props = $props->fetch(PDO::FETCH_OBJ);

$cat = $conn->query("SELECT COUNT(`id`) AS count FROM `categories`");
$cat->execute();
$count_cat = $cat->fetch(PDO::FETCH_OBJ);

$admins = $conn->query("SELECT COUNT(`id`) AS count FROM `admins`");
$admins->execute();
$count_admins = $admins->fetch(PDO::FETCH_OBJ);

?>

<div class="row">
    <div class="col-md-4">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Properties</h5>
            <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
            <p class="card-text">number of properties: <?php echo $count_props->count; ?></p>
            
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Categories</h5>
            
            <p class="card-text">number of categories: <?php echo $count_cat->count; ?></p>
            
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Admins</h5>
            
            <p class="card-text">number of admins: <?php echo $count_admins->count; ?></p>
            
        </div>
        </div>
    </div>
</div>

<?php require 'layouts/footer.php'; ?>