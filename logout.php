<?php

// destroying the session

session_start();
session_unset();
session_destroy();

// navigating to the login page

header("location: login.php");
exit;

?>