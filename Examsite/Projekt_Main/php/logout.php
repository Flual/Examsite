<?php
session_start();

session_destroy();

$_SESSION = array();
header("Location: logout.php");
header("Location: index.php");



?>