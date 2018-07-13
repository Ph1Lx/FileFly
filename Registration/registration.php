<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=u-ns106', 'ns106', 'se4aeda8Ai');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrierung</title>
    <link rel="stylesheet" href="registration.css"/>
</head>
<body>

<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
if(isset($_GET['register'])) {
    $error = false;
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];
    $benutzername = $_POST['benutzername'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }
    if(strlen($passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if($passwort != $passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }

    if(strlen($benutzername) ==0) {
        echo 'Bitte einen Benutzernamen eingeben<br>';
        $error = true;
    }

    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM users2 WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();
        if($user !== false) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }
    }

    //Überprüfe, ob der Benutzname noch nicht vergeben ist
    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM users2 WHERE benutzername = :benutzername");
        $result = $statement->execute(array('benutzername' => $benutzername));
        $user = $statement->fetch();
        if($user !== false) {
            echo 'Dieser Benutzername existiert bereits<br>';
            $error = true;
        }
    }

    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
        $statement = $pdo->prepare("INSERT INTO users2 (email, passwort, benutzername) VALUES (:email, :passwort, :benutzername)");
        $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash, 'benutzername' => $benutzername));
        if($result) {
            echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
            $showFormular = false;

            $last_id = $pdo->lastInsertId();

            //neuen Ordner für jeden neu registrierten Nutzer erstellen

            mkdir("../uploads/$last_id", 0777);
            chmod("../uploads/$last_id", 0777);

            mkdir("../uploads/$last_id/.fürmichfreigegeben", 0777);
            chmod("../uploads/$last_id/.fürmichfreigegeben", 0777);

        } else {
            echo 'Es ist leider ein Fehler aufgetreten<br>';
        }
    }
}
if($showFormular) {
    ?>

    <form id="form" action="?register=1" method="post">

        Benutzername:<br>
        <input type="text" size="40" maxlength="250" name="benutzername"><br><br>

        E-Mail:<br>
        <input type="email" size="40" maxlength="250" name="email"><br><br>

        Dein Passwort:<br>
        <input type="password" size="40"  maxlength="250" name="passwort"><br>

        Passwort wiederholen:<br>
        <input type="password" size="40" maxlength="250" name="passwort2"><br><br>

        <p>Du hast bereits einen Account? Dann kommst du hier zum <a href="login.php">Login</a>. </p>

        <input type="submit" value="Abschicken">
    </form>

    <?php
} //Ende von if($showFormular)
?>

</body>
</html>
