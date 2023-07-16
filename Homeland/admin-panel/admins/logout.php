<?php

require '../layouts/header.php';

session_start();
session_unset();
session_destroy();

header("location: " . ADMINURL .'admins/login-admins.php');