<?php
session_start();
$pdo = new PDO('mysql::host=mars.iuk.hdm-stuttgart.de.;dbname=u-ns106', 'ns106', 'se4aeda8Ai', array('charset'=>'utf8'));
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="../registration/login.php">einloggen</a>');
}

//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];

$tablepath = "../uploads/table.php";

//insert


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


                <form action="?register=1" method="post">



        <div class="form-group">
            <label class="col-lg-3 control-label">Kundennummer:</label>
            <div class="col-lg-8">
                <input type="text" size="40" maxlength="250" placeholder="Kundennummer" name="id" value="<?php echo $id;?>"><br><br>
            </div>
        </div>



                <div class="form-group">
                    <label class="col-lg-3 control-label">Vorname:</label>
                    <div class="col-lg-8">
                            <input type="text" size="40" maxlength="250" placeholder="Vorname" name="vorname" value="<?php echo $vorname;?>"><br><br>


                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Nachname:</label>
                    <div class="col-lg-8">
                        <input type="text" size="40" maxlength="250" placeholder="Nachname" name="nachname" value="<?php echo $nachname;?>"><br><br>

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Benutzername:</label>
                    <div class="col-lg-8">
                        <?php echo $benutzername;?>
                        <input type="text" size="40" maxlength="250" name="benutzername" placeholder="Benutzername" value="<?php echo $benutzername;?>"><br><br>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Geburtsdatum:</label>
                    <div class="col-lg-8">
                        <input type="text"  size="40" maxlength="250" name="geburtsdatum" placeholder="Geburtsdatum" value="<?php echo $geburtsdatum;?>"><br><br>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Geschlecht:</label>
                    <div class="col-lg-8">
                        <input type="text" size="40" maxlength="250" name="geschlecht" placeholder="Geschlecht" value="<?php echo $geschlecht;?>"><br><br>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input type="text"  size="40" maxlength="250" name="email" placeholder="Email" value="<?php echo $email;?>"><br><br>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">Telefonnummer:</label>
                    <div class="col-md-8">
                        <input type="text"  size="40" maxlength="250" name="telefonnummer" placeholder="Telefonnummer" value="<?php echo $telefonnummer;?>"><br><br>
                    </div>
                </div>

                </form>


                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <form action="edit.php" method="post">
                    <div class="col-md-8">

                        <input type="submit" name="update" value="Update">
                        <input type="submit" name="delete" value="Delete">

                    </form>
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
