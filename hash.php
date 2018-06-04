<?php

// Funktion die Passwort mit Hash kombiniert und den so erzeugten hash zurückgibt
function saltPassword($password, $salt)
{
    return hash('sha256', $password . $salt);
}

// Erzeugung von Passwort-Hash mit Salt
$password = "ganz_geheim";
$userID   = 5121; // Die UserID dient hier als einfache Möglichkeit für den Salt (hier als Beispiel 5121)
$salt = $userID;
$saltedHash    = saltPassword($password, $salt);
echo $password . ' : ' . $saltedHash . ' (Salt: ' . $salt . ')';

// Prüfung (beispielhaft)
$saltedHash = get_user_hash($_POST['username']); // Fiktive Funktion um salted Hash aus der Datenbank zu laden
$salt = get_user_id($_POST['username']); // Fiktive Funktion um UserID abzurufen
if ($saltedHash == saltPassword($_POST['password'], $salt)) // Prüfung mit Salt
{
    echo "Passwort stimmt überein";
}

?>