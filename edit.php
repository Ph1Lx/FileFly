<?php
session_start();
$pdo = new PDO('mysql::host=mars.iuk.hdm-stuttgart.de.;dbname=u-ns106', 'ns106', 'se4aeda8Ai', array('charset'=>'utf8'));

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
                        <input class="form-control" type="text" value="Max">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Nachname:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="Mustermann">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Benutzername:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="Max_M">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Geburtsdatum:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="29.03.1956">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Geschlecht:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="Männlich">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="max-mustermann@gmx.de">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">Telefonnummer:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="0711/ 72217439">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">Passwort:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" value="11111122333">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">Passwort bestätigen:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" value="11111122333">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="submit" value="Änderung speichern">
                        <span></span>
                        <A href="profilseite.html" >Cancel </A>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<hr>


</body>



</html>