<?php require 'conf.php'; ?>
<?php session_start(); ?>

<?php

    if( !isset( $_SESSION['username'] ) ){
        echo 0;
        die();
    }

    if( isset( $_POST['submit'] ) ){

        $username = ( isset( $_POST['username'] ) ? filter_var( $_POST['username'], FILTER_SANITIZE_STRING ) : "" );
        $post_id = ( isset( $_POST['post_id'] ) ? filter_var($_POST['post_id'], FILTER_SANITIZE_NUMBER_INT) : "" );
        $comment = ( isset( $_POST['comment'] ) ? filter_var( $_POST['comment'], FILTER_SANITIZE_STRING ) : "" );

        if( $username == '' or $post_id == '' or $comment == '' ){
            echo 1;
        }else{

            $i = $connect->prepare(" INSERT INTO `comments` (username, postid, comment) VALUES ( :username, :postid, :comment ) ");
            $i = $i->execute( [':username'=>$username, ':postid'=>$post_id, ':comment'=>$comment] );
            
            if( $i ){
                echo "comment send.";
            }else echo "something went wrong!";

        }

    }
?>