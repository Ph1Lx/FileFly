<?php
session_start();
$pdo = new PDO('mysql::host=mars.iuk.hdm-stuttgart.de.;dbname=u-ns106', 'ns106', 'se4aeda8Ai', array('charset'=>'utf8'));


if (isset($_POST['aktion']) and $_POST['aktion']=='speichern') {
    $Benutzername = "";
    if (isset($_POST['Benutzername'])) {
        $vorname = trim($_POST['Benutzername']);
    }

    $Vorname = "";
    if (isset($_POST['Vorname'])) {
        $nachname = trim($_POST['Vorname']);
    }

    $Nachname = "";
    if (isset($_POST['Nachname'])) {
        $nachname = trim($_POST['Nachname']);
    }

    $Geburtsdatum = "";
    if (isset($_POST['Geburtsdatum'])) {
        $nachname = trim($_POST['Geburtsdatum']);
    }
    $Email = "";
    if (isset($_POST['Email'])) {
        $anmerkungen = trim($_POST['Email']);
    }

    $Telefonnummer = "";
    if (isset($_POST['Telefonnummer'])) {
        $anmerkungen = trim($_POST['Telefonnummer']);
    }

    $Passwort = "";
    if (isset($_POST['Passwort'])) {
        $anmerkungen = trim($_POST['Passwort']);
    }

    $erstellt = date("Y-m-d H:i:s");
}


?>

