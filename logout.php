
<?php

session_start();
$pdo = new PDO('mysql::host=mars.iuk.hdm-stuttgart.de.;dbname=u-ns106', 'ns106', 'se4aeda8Ai');

session_unset();
session_destroy();
ob_start();
header("location:landingpage.html");
ob_end_flush();
include 'landingpage.html';

exit();
?>
