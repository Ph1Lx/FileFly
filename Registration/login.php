<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=u-ns106', 'ns106', 'se4aeda8Ai');

if(isset($_GET['login'])) {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];

    $statement = $pdo->prepare("SELECT * FROM users2 WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();

    //Überprüfung des Passworts
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['id'];
        echo 'Login erfolgreich. Weiter zu <a href="../Home/home.php">internen Bereich</a>';
        header('Location: ../Home/home.php');
        exit();

    } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="registration.css"/>
</head>
<body>

<?php
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>

<form action="?login=1" method="post">
    E-Mail:<br>
    <input type="email" size="40" maxlength="250" name="email"><br><br>

    Dein Passwort:<br>
    <input type="password" size="40"  maxlength="250" name="passwort"><br>

    <p>Du hast noch keinen Account? Dann kannst du dich hier <a href="registration.php.php">registrieren</a>. </p>

    <input type="submit" value="Abschicken">
</form>
</body>
</html>