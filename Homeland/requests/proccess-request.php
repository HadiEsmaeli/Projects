<?php session_start(); ?>
<?php require "../config/config.php"; ?>

<?php

if( isset( $_SESSION['userid'] ) ) {

    if( isset( $_POST['submit'] ) ) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $propid = $_POST['propid'];
        $userid = $_POST['userid'];
        $creator = $_POST['creator'];

        if( isset( $name ) AND isset( $email ) AND isset( $phone ) AND !empty($name) AND !empty($email) AND !empty($phone) ){

            $contact = $conn->prepare("INSERT INTO `request` (`name`, `email`, `phone`, `propid`, `userid`, `creator`) 
                VALUES (:user, :email, :phone, :propid, :userid, :creator)");
            $inserted = $contact->execute([
                ':user' => $name,
                ':email' => $email,
                ':phone' => $phone,
                ':propid' => $propid,
                ':userid' => $userid,
                ':creator' => $creator
            ]);

            if( $inserted )
                header('location: '.$_SERVER['HTTP_REFERER']);

        }
    }

}else{
    header('location: '.$_SERVER['HTTP_REFERER']);
}