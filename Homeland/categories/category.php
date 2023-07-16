<?php require "../includes/header.php";

require "../config/config.php";

if( isset( $_GET['name'] ) AND !empty( $_GET['name'] ) ) {

    $name = $_GET['name'];

    $select = $conn->prepare("SELECT * FROM `props` WHERE `home_type` = :id");
    $select->execute( [':id' => $name] );

    if( $select->rowCount() < 1 )
      header( 'location: ' . APPURL);

    $cat = $select->fetchAll(PDO::FETCH_OBJ);

}else{
    header('location: ' . APPURL . '404.php');
}
?>
    <div class="slide-one-item home-slider owl-carousel">
      <?php foreach( $cat as $category ): ?>
        <div class="site-blocks-cover overlay" style="background-image: url(<?php echo APPURL; ?>images/<?php echo $category->image ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                  <span class="d-inline-block bg-<?php if( $category->type == 'rent' ){echo 'success';}else{echo 'danger';} ?> text-white px-3 mb-3 property-offer-type rounded"><?php echo $category->type; ?></span>
                  <h1 class="mb-2"><?php echo $category->name; ?></h1>
                  <p class="mb-5"><strong class="h2 text-success font-weight-bold">$<?php echo number_format($category->price); ?></strong></p>
                  <p><a href="property-details.php?id=<?php echo $category->id; ?>" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See Details</a></p>
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
                    <?php foreach( $categori as $category ) : /* *  get categorys  * */ ?>
                    <?php $name = $category->name; ?>
                      <option value="<?php echo $name; ?>"><?php echo str_replace('-', ' ', $name); ?></option>
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
        <div class="row">
          <div class="col-md-12">
            <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
              <div class="mr-auto">
                <a href="index.php" class="icon-view view-module active"><span class="icon-view_module"></span></a>                
              </div>
              <div class="ml-auto d-flex align-items-center">
                <div>
                  <a href="<?php echo APPURL; ?>" class="view-list px-3 border-right active">All</a>
                  <a href="type-rent-sale.php?type=rent" class="view-list px-3 border-right">Rent</a>
                  <a href="type-rent-sale.php?type=sale" class="view-list px-3">Sale</a>
                  <a href="<?php echo APPURL; ?>?price=ASC" class="view-list px-3">Ascending</a>
                  <a href="<?php echo APPURL; ?>?price=DESC" class="view-list px-3">Descending</a>
                </div>
              </div>
            </div>
          </div>
        </div>       
      </div>
    </div>

    <div class="site-section site-section-sm bg-light">
      <div class="container">      
        <div class="row mb-5">
          <?php foreach( $cat as $category ) : ?>
            <div class="col-md-6 col-lg-4 mb-4">
              <div class="property-entry h-100">
                <a href="<?php echo APPURL; ?>property-details.php?id=<?php echo $category->id; ?>" class="property-thumbnail">
                  <div class="offer-type-wrap">
                    <span class="offer-type bg-<?php if( $category->type == 'rent' ) {echo 'success';}else{echo 'danger';} ?>"><?php echo $category->type; ?></span>
                  </div>
                  <img src="<?php echo APPURL; ?>images/<?php echo $category->image; ?>" alt="Image" class="img-fluid">
                </a>
                <div class="p-4 property-body">
                  <h2 class="property-title"><a href="<?php echo APPURL; ?>property-details.php?id=<?php echo $category->id; ?>"><?php echo $category->name; ?></a></h2>
                  <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span><?php echo $category->location; ?></span>
                  <strong class="property-price text-primary mb-3 d-block text-success"><?php echo number_format($category->price); ?></strong>
                  <ul class="property-specs-wrap mb-3 mb-lg-0">
                    <li>
                      <span class="property-specs">Beds</span>
                      <span class="property-specs-number"><?php echo $category->beds; ?><sup>+</sup></span>
                    </li>
                    <li>
                      <span class="property-specs">Baths</span>
                      <span class="property-specs-number"><?php echo $category->bath; ?></span>
                    </li>
                    <li>
                      <span class="property-specs">SQ FT</span>
                      <span class="property-specs-number"><?php echo $category->sqft; ?></span>                      
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
<?php require "../includes/footer.php"; ?>