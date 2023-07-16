<?php

require 'conf.php';

if( isset($_POST['insert']) AND isset( $_SESSION['username'] ) ){

    $postid = $_POST['postid'];
    $rating = $_POST['rating'];
    $userid = $_POST['userid'];

    $delete = $connect->prepare("DELETE FROM `rate` WHERE `postid` = :postid AND `userid` = :userid");
    $delete->execute([':postid'=>$postid, ':userid'=>$userid]);

    $insert = $connect->prepare("INSERT INTO `rate` (`postid`, `rating`, `userid`) VALUES (:postid, :rating, :userid)");

    $insert = $insert->execute([
        ':postid' => $postid,
        ':rating' => $rating,
        ':userid' => $userid
    ]);

    if( $insert )
        echo 1;
    else echo 0;
}


