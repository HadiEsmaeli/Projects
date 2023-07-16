<?php require "includes/header.php"; ?>

<?php echo isset( $_SESSION['username'] ) ? "<h3>Hello " . $_SESSION['username'] . "</h3>" : "" ; ?>

<?php require "includes/footer.php"; ?>
