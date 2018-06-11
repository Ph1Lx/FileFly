<?php
session_start();
$pdo = new PDO('mysql::host=mars.iuk.hdm-stuttgart.de.;dbname=u-ns106', 'ns106', 'se4aeda8Ai', array('charset'=>'utf8'));

require 'incdb.php';

echo "<pre>";
$statement = $pdo->prepare("SELECT * FROM users"); if($statement->execute()) {
    while($row=$statement->fetch()) {
        echo $row['vorname']." ".$row['nachname'];
        echo "<pre>";
    }
} else {
    echo "Datenbank-Fehler:";
    echo $statement->errorInfo()[2];
    echo $statement->queryString;
    die(); }

if (!count($row)) {
    echo "<p>Es liegen keine Daten vor :(</p>";
}
?>

