<?php require "includes/header.php"; ?>

<?php

require "config/config.php";

$select = $conn->query("SELECT * FROM `props`");
$select->execute();

$props = $select->fetchAll(PDO::FETCH_OBJ);

$flag = false;

if( isset( $_POST['submit'] ) ){

    $type = $_POST['type'];
    $offer = $_POST['offer'];
    $citie = "%".$_POST['citie'];

    if( !empty($type) AND !empty($offer) AND !empty($citie) ){

        $flag = true;

        $search = $conn->prepare(
            "SELECT * FROM `props` WHERE `home_type` = :types AND `type` = :offers AND `location` LIKE :city" );
        $search->execute([
            ':types' => $type,
            ':offers' => $offer,
            ':city' => $citie
        ]);

        $listing = $search->fetchAll(PDO::FETCH_OBJ);

    }
}

$cat = $conn->query("SELECT * FROM `categories`");
$cat->execute();

$getcategorys = $cat->fetchAll(PDO::FETCH_OBJ);

?>

    <div class="slide-one-item home-slider owl-carousel">

      <?php foreach( $props as $prop ): ?>
        <div class="site-blocks-cover overlay" style="background-image: url(<?php echo APPURL; ?>images/<?php echo $prop->image ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                  <span class="d-inline-block bg-<?php if( $prop->type == 'rent' ){echo 'success';}else{echo 'danger';} ?> text-white px-3 mb-3 property-offer-type rounded"><?php echo $prop->type; ?></span>
                  <h1 class="mb-2"><?php echo $prop->name; ?></h1>
                  <p class="mb-5"><strong class="h2 text-success font-weight-bold">$<?php echo number_format($prop->price); ?></strong></p>
                  <p><a href="property-details.php?id=<?php echo $prop->id; ?>" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See Details</a></p>
                </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>


    <div class="site-section site-section-sm pb-0">
      <div class="container">
        <div class="row">
          <form class="form-search col-md-12" method="POST" action="search.php" style="margin-top: -100px;">
            <div class="row  align-items-end">
              <div class="col-md-3">
                <label for="list-types">Listing Types</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="type" id="list-types" class="form-control d-block rounded-0">
                      <?php foreach( $getcategorys as $cat ) : ?>
                        <option value="<?php echo $cat->name; ?>"> <?php echo str_replace('-', ' ', $cat->name); ?> </option>
                      <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <label for="offer-types">Offer Type</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="offer" id="offer-types" class="form-control d-block rounded-0">
                    <option value="Sale">Sale</option>
                    <option value="Rent">Rent</option>
                    <option value="Lease">Lease</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <label for="select-city">Select City</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="citie" id="select-city" class="form-control d-block rounded-0">
                    <option value="New York">New York</option>
                    <option value="Brooklyn">Brooklyn</option>
                    <option value="London">London</option>
                    <option value="Japan">Japan</option>
                    <option value="Philippines">Philippines</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <input name="submit" type="submit" class="btn btn-success text-white btn-block rounded-0" value="Search">
              </div>
            </div>
          </form>
        </div>         
      </div>
    </div>

    <div class="site-section site-section-sm bg-light">
      <div class="container">      
        <div class="row mb-5">

            <?php if( $flag == true ){ ?>
                <?php foreach( $listing as $list ): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="property-entry h-100">
                            <a href="property-details.html" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-<?php if( $list->type == 'rent' ){echo 'success';}else{echo 'danger';} ?>"><?php echo $list->type; ?></span>
                            </div>
                            <img src="images/<?php echo $list->image; ?>" alt="Image" class="img-fluid">
                            </a>
                            <div class="p-4 property-body">
                                <h2 class="property-title"><a href="property-details.php?id=<?php echo $list->id; ?>"><?php echo $list->name; ?></a></h2>
                                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span><?php echo $list->location; ?></span>
                                <strong class="property-price text-primary mb-3 d-block text-success"><?php echo number_format($list->price); ?></strong>
                                <ul class="property-specs-wrap mb-3 mb-lg-0">
                                    <li>
                                    <span class="property-specs">Beds</span>
                                    <span class="property-specs-number"><?php echo $list->beds; ?> <sup>+</sup></span>
                                    
                                    </li>
                                    <li>
                                    <span class="property-specs">Baths</span>
                                    <span class="property-specs-number"><?php echo $list->bath; ?></span>
                                    
                                    </li>
                                    <li>
                                    <span class="property-specs">SQ FT</span>
                                    <span class="property-specs-number"><?php echo $list->sqft; ?></span>
                                    
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php } ?>

        </div>
      </div>
    </div>

<?php require "includes/footer.php"; ?>
