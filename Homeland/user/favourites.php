<?php require '../includes/header.php'; ?>
<?php require '../config/config.php'; ?>

<?php

if( !isset( $_SESSION['userid'] ) ){
    header('location: /homeland/auth/login.php');
    exit;
}

$get = $conn->prepare("SELECT * FROM `props` JOIN fav ON `props`.id = `fav`.propid WHERE `fav`.userid = :favusr");
$get->execute([':favusr'=>$_SESSION['userid']]);

$props = $get->fetchAll(PDO::FETCH_OBJ);

?>

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo APPURL; ?>images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-10">
        <h1 class="mb-2">Your Favourites</h1>
      </div>
    </div>
  </div>
</div>

<div class="container">
      
    <div class="row mb-5">
        <?php if( $get->rowCount() > 0 ) : ?>
            <?php foreach( $props as $prop ) : ?>
                <div class="col-md-6 col-lg-4 mb-4 mt-5">
                    <div class="property-entry h-100">
                    <a href="property-details.php?id=<?php echo $prop->id; ?>" class="property-thumbnail">
                        <div class="offer-type-wrap">
                        <span class="offer-type bg-<?php if( $prop->type == 'rent' ) {echo 'success';}else{echo 'danger';} ?>"><?php echo $prop->type; ?></span>
                        </div>
                        <img src="<?php echo APPURL; ?>images/<?php echo $prop->image; ?>" alt="Image" class="img-fluid">
                    </a>
                    <div class="p-4 property-body">
                        <h2 class="property-title"><a href="property-details.php?id=<?php echo $prop->id; ?>"><?php echo $prop->name; ?></a></h2>
                        <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span><?php echo $prop->location; ?></span>
                        <strong class="property-price text-primary mb-3 d-block text-success"><?php echo number_format($prop->price); ?></strong>
                        <ul class="property-specs-wrap mb-3 mb-lg-0">
                        <li>
                            <span class="property-specs">Beds</span>
                            <span class="property-specs-number"><?php echo $prop->beds; ?><sup>+</sup></span>
                            
                        </li>
                        <li>
                            <span class="property-specs">Baths</span>
                            <span class="property-specs-number"><?php echo $prop->bath; ?></span>
                            
                        </li>
                        <li>
                            <span class="property-specs">SQ FT</span>
                            <span class="property-specs-number"><?php echo $prop->sqft; ?></span>
                            
                        </li>
                        </ul>

                    </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="bg-success text-white">you did not add any properties to favourites just yet.</div>            
        <?php endif; ?>
    </div>        
</div>

<?php require '../includes/footer.php'; ?>