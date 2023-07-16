<?php require "conf.php"; ?>

<?php

    $select = $connect->query("SELECT * FROM `urls`");
    $select->execute();

    $rows = $select->fetchAll(PDO::FETCH_OBJ);

    if( isset( $_POST['submit'] ) ){
        $url = $_POST['url'];
        if( $url =='' ){
            echo "the input is empty";
        }else{

            $add = $connect->prepare("INSERT INTO `urls` (`url`) VALUES(:url)");
            $add->execute( [":url" => $url] );
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            body {overflow: hidden;}
            
            .margin {
                margin-top: 200px
            }
        </style>
    </head>
    <body>
       
        <div class="conatiner">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <form class="card p-2 margin" method="POST" action="index.php">
                        <div class="input-group">
                        <input type="text" name="url" class="form-control" placeholder="your url">
                        <div class="input-group-append">
                            <button type="submit" name="submit" class="btn btn-success">Shorten</button>
                        </div>
                        </div>
                    </form>
                </div>
           </div>
        </div>

        <div class="conatiner">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <table class="table mt-4">
                        <thead>
                            <tr>
                            <th scope="col">long url</th>
                            <th scope="col">short url</th>
                            <th scope="col">clicks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rows as $row) : ?>
                                <tr>
                                <th scope="row"><?php echo $row->url ?></th>
                                <td>
                                    <a id="refresh" target="_blank" href="http://localhost/short-url/link?id=<?php echo $row->id ?>">http:/localhost/short-url/link/<?php echo $row->id ?></a>
                                </td>
                                <td><?php echo $row->clicks; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                 </div>
             </div>
        </div>
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
        <script src="refreshClick.js"></script>
    </body>
</html>
