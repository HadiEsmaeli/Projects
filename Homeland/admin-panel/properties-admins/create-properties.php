<?php require '../layouts/header.php'; ?>
<?php require '../../config/config.php'; ?>

<?php

if( !isset( $_SESSION['useradmin'] ) ){
  header('location: ' . ADMINURL . 'admins/login-admins.php');
  exit;
}

//get categories
$cat = $conn->query("SELECT * FROM `categories`");
$cat->execute();

$getcategorys = $cat->fetchAll(PDO::FETCH_OBJ);

$id = '';
if( isset( $_POST['submit'] ) ) {

  $flag = false;

  foreach ($_POST as $key => $value) {

    if( empty($_POST[$key]) ){

      $flag = true;
      break;
    }
  }

  if( $flag == true ) {

    echo '<script>alert(\'some of the fields are empty!\')</script>';
  }else {
    
    $name = $_POST['name'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $beds = $_POST['beds'];
    $baths = $_POST['baths'];
    $sqft = $_POST['sqft'];
    $home_type = $_POST['home_type'];
    $year_built = $_POST['year_built'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $price_sqft = $_POST['price_sqft'];
    $useradmin = $_SESSION['useradmin'];
    $image = $_FILES['thumbnail']['name'];
  
    $dir = 'thumbnails/' . basename($image);

    $insert = $conn->prepare("INSERT INTO `props` (name, location, price, image, beds, bath, sqft, home_type, year_built, type, price_sqft, description, admin_name)
     VALUES(:name, :location, :price, :image, :beds, :bath, :sqft, :home_type, :year_built, :type, :price_sqft, :description, :admin_name)");

    $insert->execute([
      ':name' => $name,
      ':location' => $location,
      ':price' => $price,
      ':image' => $image,
      ':beds' => $beds,
      ':bath' => $baths,
      ':sqft' => $sqft,
      ':home_type' => $home_type,
      ':year_built' => $year_built,
      ':type' => $type,
      ':price_sqft' => $price_sqft,
      ':description' => $description,
      ':admin_name' => $useradmin
    ]);

    if( move_uploaded_file( $_FILES['thumbnail']['tmp_name'], $dir ) )
      header('location:'.ADMINURL);

  }

  $id = $conn->lastInsertId();

  foreach( $_FILES['image']['tmp_name'] as $key => $value ) {

    $filename = $_FILES['image']['name'][$key];
    $filename_tmp = $_FILES['image']['tmp_name'][$key];

    echo '<br>';

    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $finalimg = '';

    $filename = str_replace('.', '-', basename($filename, $ext));
    $newfilename = $filename . time() . '.' . $ext;

    move_uploaded_file($filename_tmp, 'images/' . $newfilename);

    $finalimg = $newfilename;

    $insertQry = $conn->prepare("INSERT INTO `related_images`(`image`, `prop_id`)
     VALUES(:finimg, :id)");

    $insertQry->execute([ ':finimg' => $finalimg, ':id' => $id ]);

    header('location: show-properties.php');
  }
}

?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Properties</h5>
              <form method="POST" action="create-properties.php" enctype="multipart/form-data">
                  <!-- Email input -->
                  <div class="form-outline mb-4 mt-4">
                      <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                  </div>    
                  <div class="form-outline mb-4 mt-4">
                      <input type="text" name="location" id="form2Example1" class="form-control" placeholder="location" />
                  </div> 
                  <div class="form-outline mb-4 mt-4">
                      <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                  </div> 
                  <div class="form-outline mb-4 mt-4">
                      <input type="text" name="beds" id="form2Example1" class="form-control" placeholder="beds" />
                  </div>
                  <div class="form-outline mb-4 mt-4">
                      <input type="text" name="baths" id="form2Example1" class="form-control" placeholder="baths" />
                  </div>
                  <div class="form-outline mb-4 mt-4">
                      <input type="text" name="sqft" id="form2Example1" class="form-control" placeholder="SQ/FT" />
                  </div>   
                  <div class="form-outline mb-4 mt-4">
                      <input type="text" name="year_built" id="form2Example1" class="form-control" placeholder="Year Build" />
                  </div> 
                  <div class="form-outline mb-4 mt-4">
                      <input type="text" name="price_sqft" id="form2Example1" class="form-control" placeholder="Price Per SQ FT" />
                  </div> 

                  <select name="home_type" class="form-control form-select" aria-label="Default select example">
                      <option selected>Select Home Type</option>
                      <?php foreach( $getcategorys as $cat ) : ?>
                        <option value="<?php echo $cat->name; ?>"> <?php echo str_replace('-', ' ', $cat->name); ?> </option>
                      <?php endforeach; ?>
                  </select>   
                  <select name="type" class="form-control mt-3 mb-4 form-select" aria-label="Default select example">
                      <option selected>Select Type</option>
                      <option value="Rent">Rent</option>
                      <option value="Sale">Sale</option>
                  </select>

                  <div class="form-group">
                      <label for="exampleFormControlTextarea1">Description</label>
                      <textarea placeholder="Description" name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                      <label for="formFile" class="form-label">Property Thumbnail</label>
                      <input name="thumbnail" class="form-control" type="file" id="formFile">
                  </div>
                  <div class="mb-3">
                      <label for="formFileMultiple" class="form-label">Gallery Images</label>
                      <input name="image[]" class="form-control" type="file" id="formFileMultiple" multiple>
                  </div>
                  <!-- Submit button -->
                  <button type="submit" value="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
          
              </form>

      </div>
    </div>
  </div>
</div>
<?php require '../layouts/footer.php'; ?>
