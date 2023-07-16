<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>

<?php

if( isset( $_GET['id'] ) AND !empty( $_GET['id'] ) ) {

  $id = $_GET['id'];

  $select = $conn->prepare("SELECT * FROM `props` WHERE `id` = :home");
  $select->execute([ ':home' => $id ]);

  $home = $select->fetch(PDO::FETCH_OBJ);

  //show related image

  $related_images = $conn->prepare("SELECT * FROM `related_images` WHERE `prop_id` = :propid");
  $related_images->execute([ ':propid' => $id ]);

  $images = $related_images->fetchAll(PDO::FETCH_OBJ);

  //show related props
  
  $relate_prop = $conn->prepare("SELECT * FROM `props` WHERE `home_type` = :type_home AND `id` != :propid");
  $relate_prop->execute([ 
    ':type_home' => $home->home_type,
    ':propid' => $id
  ]);
  
  $relate_prop = $relate_prop->fetchAll(PDO::FETCH_OBJ);

}else{
  header('location: /homeland/404.php');
}

?>

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo APPURL; ?>admin-panel/properties-admins/thumbnails/<?php echo $home->image; ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-10">
        <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
        <h1 class="mb-2"><?php echo $home->name; ?></h1>
        <p class="mb-5"><strong class="h2 text-success font-weight-bold"><?php echo number_format($home->price); ?></strong></p>
      </div>
    </div>
  </div>
</div>

<div class="site-section site-section-sm">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div>
          <div class="slide-one-item home-slider owl-carousel">
            <?php foreach( $images as $image ) : ?>
              <div><img src="<?php echo APPURL; ?>admin-panel/properties-admins/images/<?php echo $image->image; ?>" alt="Image" class="img-fluid"></div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="bg-white property-body border-bottom border-left border-right">
          <div class="row mb-5">
            <div class="col-md-6">
              <strong class="text-success h1 mb-3">$<?php echo number_format($home->price); ?></strong>
            </div>
            <div class="col-md-6">
              <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
              <li>
                <span class="property-specs">Beds</span>
                <span class="property-specs-number"><?php echo $home->beds; ?><sup>+</sup></span>
              </li>
              <li>
                <span class="property-specs">Baths</span>
                <span class="property-specs-number"><?php echo $home->bath; ?></span>
              </li>
              <li>
                <span class="property-specs">SQ FT</span>
                <span class="property-specs-number"><?php echo $home->sqft; ?></span>
              </li>
            </ul>
            </div>
          </div>
          <div class="row mb-5">
            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
              <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
              <strong class="d-block"><?php echo $home->home_type; ?></strong>
            </div>
            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
              <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
              <strong class="d-block"><?php echo $home->year_built; ?></strong>
            </div>
            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
              <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
              <strong class="d-block">$<?php echo $home->price_sqft; ?></strong>
            </div>
          </div>
          <h2 class="h4 text-black">More Info</h2>
          <p> <?php echo $home->description; ?> </p>

          <div class="row no-gutters mt-5">
            <div class="col-12">
              <h2 class="h4 text-black mb-3">Gallery</h2>
            </div>
            <?php foreach( $images as $image ) : ?>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <a href="<?php echo APPURL; ?>admin-panel/properties-admins/images/<?php echo $image->image; ?>" class="image-popup gal-item"><img src="<?php echo APPURL; ?>admin-panel/properties-admins/images/<?php echo $image->image; ?>" alt="Image" class="img-fluid"></a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="col-lg-4">

        <div class="bg-white widget border rounded">

          <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
          <?php if( isset( $_SESSION['userid'] ) ) { ?>
            <?php
              $isSendOrNot = $conn->prepare("SELECT * FROM `request` WHERE `propid` = :pid AND `userid` = :usrid");
              $isSendOrNot->execute([
                ':pid' => $id,
                ':usrid' => $_SESSION['userid']
              ]);

              if( $isSendOrNot->rowCount() < 1 ) {
            ?>
              <form action="requests/proccess-request.php" method="POST" class="form-contact-agent">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                  <input type="hidden" name="propid" value="<?php echo $id; ?>" class="form-control">
                </div>
                <div class="form-group">
                  <input type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>" class="form-control">
                </div>
                <div class="form-group">
                  <input type="hidden" name="creator" value="<?php echo $home->admin_name; ?>" class="form-control">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" name="phone" id="phone" class="form-control">
                </div>
                <div class="form-group">
                  <input type="submit" name="submit" id="phone" class="btn btn-primary" value="Send Message">
                </div>
              </form>
            <?php }else{ ?>
              <p>you already sent a request to this property.</p>
            <?php } ?>
          <?php }else{ ?>
            <p>login in order to send a request to this property.</p>
          <?php } ?>
        </div>

        <div class="bg-white widget border rounded">
          <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
              <div class="px-3" style="margin-left: -15px;">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo APPURL; ?>/property-details.php?id=<?php echo $home->id; ?>&quote=<?php echo $home->name; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                <a  href="https://twitter.com/intent/tweet?text=<?php echo $home->name; ?>&url=<?php echo APPURL; ?>/property-details.php?id=<?php echo $home->id; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo APPURL; ?>/property-details.php?id=<?php echo $home->id; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>    
              </div>
        </div>

        <div class="bg-white widget border rounded">

          <?php
            //checking for, if this prop in the favorites

            if( isset( $_SESSION['userid'] ) ){

              $check = $conn->prepare("SELECT * FROM `fav` WHERE `propid` = :propid AND `userid` = :userid");
              $check->execute([
                ':propid' => $id,
                ':userid' => $_SESSION['userid']
              ]);
            }
          ?>

          <h3 class="h4 text-black widget-title mb-3 ml-0">Add to Fav</h3>
            <div class="px-3" style="margin-left: -15px;">
              <?php if( isset( $_SESSION['userid'] ) ) : ?>

                <form action="<?php echo APPURL; ?>fav/fav.php" method="POST" class="form-contact-agent">
                  <div class="form-group">
                    <input type="hidden" name="propid" class="form-control" value="<?php echo isset( $id ) ? $id : ""; ?>">
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="userid" class="form-control" value="<?php echo isset( $_SESSION['userid'] ) ? $_SESSION['userid'] : ""; ?>">
                  </div>

                  <div class="form-group">
                    <?php 
                      if( $check->rowCount() > 0 ) : ?>
                        <a href="<?php echo APPURL; ?>fav/delete-fav.php?propid=<?php echo $id ?>&userid=<?php echo $_SESSION['userid']; ?>" class="btn btn-primary">Added To Fav</a>
                      <?php else : ?>
                        <input name="submit" type="submit" class="btn btn-primary" value="Add To Fav">
                      <?php endif; ?>
                  </div>
                </form>

              <?php else : ?>
                <p>login in order to send this fav.</p>
              <?php endif; ?>
            </div>
        </div>

      </div>
      
    </div>
  </div>
</div>

<div class="site-section site-section-sm bg-light">
  <div class="container">

    <div class="row">
      <div class="col-12">
        <div class="site-section-title mb-5">
          <h2>Related Properties</h2>
        </div>
      </div>
    </div>
  
    <div class="row mb-5">
      <?php foreach( $relate_prop as $relate_p ) : ?>
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="property-entry h-100">
            <a href="property-details.php?id=<?php echo $relate_p->id; ?>" class="property-thumbnail">
              <div class="offer-type-wrap">
                <span class="offer-type bg-<?php if($relate_p->type == 'sale'){echo 'danger';}else{echo 'success';} ?>"><?php echo $relate_p->type; ?></span>
              </div>
              <img src="<?php echo APPURL; ?>images/<?php echo $relate_p->image; ?>" alt="Image" class="img-fluid">
            </a>
            <div class="p-4 property-body">
              <h2 class="property-title"><a href="property-details.php?id=<?php echo $relate_p->id; ?>"><?php echo $relate_p->name; ?></a></h2>
              <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> <?php echo $relate_p->location; ?></span>
              <strong class="property-price text-primary mb-3 d-block text-success">$<?php echo $relate_p->price; ?></strong>
              <ul class="property-specs-wrap mb-3 mb-lg-0">
                <li>
                  <span class="property-specs">Beds</span>
                  <span class="property-specs-number"><?php echo $relate_p->beds; ?> <sup>+</sup></span>
                  
                </li>
                <li>
                  <span class="property-specs">Baths</span>
                  <span class="property-specs-number"><?php echo $relate_p->bath; ?></span>
                  
                </li>
                <li>
                  <span class="property-specs">SQ FT</span>
                  <span class="property-specs-number"><?php echo $relate_p->sqft; ?></span>
                  
                </li>
              </ul>

            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php require "includes/footer.php"; ?>