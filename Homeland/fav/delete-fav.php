<?php session_start(); ?>
<?php require "../config/config.php"; ?>

<?php

if( isset( $_SESSION['userid'] ) ) {

        $propid = $_GET['propid'];
        $userid = $_GET['userid'];

        if( isset( $propid ) AND isset( $userid ) AND !empty($propid) AND !empty($userid) ){

            $delete_fav = $conn->prepare("DELETE FROM `fav` WHERE `propid` = :pid AND `userid` = :uid");
            $del = $delete_fav->execute([
                ':pid' => $propid,
                ':uid' => $userid
            ]);

            if( $del )
                header('location: '.$_SERVER['HTTP_REFERER']);

        }

}else{
    header('location: '.$_SERVER['HTTP_REFERER']);
}