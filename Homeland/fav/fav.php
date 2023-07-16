<?php session_start(); ?>
<?php require "../config/config.php"; ?>

<?php

if( isset( $_SESSION['userid'] ) ) {

    if( isset( $_POST['submit'] ) ) {

        $propid = $_POST['propid'];
        $userid = $_POST['userid'];

        if( isset( $propid ) AND isset( $userid ) AND !empty($propid) AND !empty($userid) ){

            $addfav = $conn->prepare("INSERT INTO `fav` (`propid`, `userid`) VALUES (:pid, :uid)");
            $inserted = $addfav->execute([
                ':pid' => $propid,
                ':uid' => $userid
            ]);

            if( $inserted )
                header('location: '.$_SERVER['HTTP_REFERER']);

        }
    }

}else{
    header('location: '.$_SERVER['HTTP_REFERER']);
}