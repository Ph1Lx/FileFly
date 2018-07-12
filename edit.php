<?php
session_start();
$pdo = new PDO('mysql::host=mars.iuk.hdm-stuttgart.de.;dbname=u-ns106', 'ns106', 'se4aeda8Ai', array('charset'=>'utf8'));

if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="../registration/login.php">einloggen</a>');
}

//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];

$tablepath = "../uploads/table.php";
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Profil Seite bearbeiten</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
</head>
<body>

<div class="container">
    <h1>Profil Seite bearbeiten</h1>
    <hr>
    <div class="row">

        <div class="col-md-3">
            <div class="text-center">
                <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                <h6>Bild Bearbeiten</h6>

                <input type="file" class="form-control">
            </div>
        </div>


        <div class="col-md-9 personal-info">

            <form class="form-horizontal" role="form">

                <div class="form-group">
                    <label class="col-lg-3 control-label">Vorname:</label>
                    <div class="col-lg-8">
                        <input type="text" size="40" maxlength="250" name="vorname" value="<?php $statment = $pdo->query("SELECT vorname FROM users2 WHERE id =9");?>
                                <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>
                                <?= htmlspecialchars($datensatz ['vorname']);?>
                                <?php endwhile; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Nachname:</label>
                    <div class="col-lg-8">
                        <input type="text" size="40" maxlength="250" name="nachname" value="<?php $statment = $pdo->query("SELECT nachname FROM users2 WHERE id =9");?>
                                <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>
                                <?= htmlspecialchars($datensatz ['nachname']);?>
                                <?php endwhile; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Benutzername:</label>
                    <div class="col-lg-8">
                        <input type="text" size="40" maxlength="250" name="benutzername" value=" <?php $statment = $pdo->query("SELECT benutzername FROM users2 WHERE id =9");?>
                                <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>
                                <?= htmlspecialchars($datensatz ['benutzername']);?>
                                <?php endwhile; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Geburtsdatum:</label>
                    <div class="col-lg-8">
                        <input type="text" size="40" maxlength="250" name="geburtsdatum" value="<?php $statment = $pdo->query("SELECT geburtsdatum FROM users2 WHERE id =9");?>
                                <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>
                                <?= htmlspecialchars($datensatz ['geburtsdatum']);?>
                                    <?php endwhile; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Geschlecht:</label>
                    <div class="col-lg-8">
                        <input type="text" size="40" maxlength="250" name="geschlecht" value=" <?php $statment = $pdo->query("SELECT geschlecht FROM users2 WHERE id =9");?>
                                <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>
                                <?= htmlspecialchars($datensatz ['geschlecht']);?>
                                    <?php endwhile; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input type="email" size="40" maxlength="250" name="email" value="<?php $statment = $pdo->query("SELECT email FROM users2 WHERE id =9");?>
                                <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>
                                <?= htmlspecialchars($datensatz ['email']);?>
                                    <?php endwhile; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">Telefonnummer:</label>
                    <div class="col-md-8">
                        <input type="text" size="40" maxlength="250" name="telefonnummer" value=" <?php $statment = $pdo->query("SELECT telefonnummer FROM users2 WHERE id =9");?>
                                <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>
                                <?= htmlspecialchars($datensatz ['telefonnummer']);?>
                                    <?php endwhile; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">Passwort:</label>
                    <div class="col-md-8">
                        <input type="password" size="40"  maxlength="250" name="passwort">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">Passwort bestätigen:</label>
                    <div class="col-md-8">
                        <input type="password" size="40" maxlength="250" name="passwort2">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="submit" value="Änderung speichern">
                        <span></span>
                        <A href="profilseite.php" >Cancel </A>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<hr>


</body>


</html>
