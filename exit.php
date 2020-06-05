<?php
session_start();
$_SESSION['Username'] = null;
$_SESSION['Password'] = null;
$_SESSION['Type'] = null;
session_destroy();
header("Location: http://antaresnews.tk");
?>