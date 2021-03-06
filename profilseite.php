<?php
session_start();
include "dbconnect.php";
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
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


</head>

<div class="container">
    <div class="row">
        <br>
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
            <A href="edit.php" >Profil bearbeiten </A>
            <br>
            <br>
            <A href="../registration/logout.php">Logout</A>
            <br>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Profilseite</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="text-center">
                                <img src="https://nesea.org/sites/default/files/styles/thumbnail/public/user-icon-default_4286.png?itok=Pt1kNb2P" class="avatar img-circle" alt="avatar">


                            </div>
                        </div>
                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>



                                    <tr>
                                        <th>Vorname:</th>

                                        <?php $statment = $pdo->query("SELECT vorname FROM users2 WHERE id = $userid");?>
                                        <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>


                                            <td> <?= htmlspecialchars($datensatz ['vorname']);?> </td>
                                        <?php endwhile; ?>
                                    </tr>


                                    <tr>
                                        <th>Nachname:</th>

                                        <?php $statment = $pdo->query("SELECT nachname FROM users2 WHERE id = $userid");?>
                                        <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>


                                            <td> <?= htmlspecialchars($datensatz ['nachname']);?> </td>
                                        <?php endwhile; ?>
                                    </tr>

                                    <tr>
                                        <th>Benutzername:</th>

                                        <?php $statment = $pdo->query("SELECT benutzername FROM users2 WHERE id = $userid");?>
                                        <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>

                                            <td> <?= htmlspecialchars($datensatz ['benutzername']);?> </td>
                                        <?php endwhile; ?>
                                    </tr>


                                    <tr>
                                        <th>Geburtsdatum:</th>

                                        <?php $statment = $pdo->query("SELECT geburtsdatum FROM users2 WHERE id = $userid");?>
                                        <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>

                                            <td> <?= htmlspecialchars($datensatz ['geburtsdatum']);?> </td>
                                        <?php endwhile; ?>
                                    </tr>


                                    <tr>
                                        <th>Geschlecht:</th>

                                        <?php $statment = $pdo->query("SELECT geschlecht FROM users2 WHERE id = $userid");?>
                                        <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>

                                            <td> <?= htmlspecialchars($datensatz ['geschlecht']);?> </td>
                                        <?php endwhile; ?>
                                    </tr>


                                    <tr>
                                        <th>Email:</th>

                                        <?php $statment = $pdo->query("SELECT email FROM users2 WHERE id = $userid");?>
                                        <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>

                                            <td> <?= htmlspecialchars($datensatz ['email']);?> </td>
                                        <?php endwhile; ?>
                                    </tr>


                                    <tr>
                                        <th>Telefonnummer:</th>

                                        <?php $statment = $pdo->query("SELECT telefonnummer FROM users2 WHERE id = $userid");?>
                                        <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>

                                            <td> <?= htmlspecialchars($datensatz ['telefonnummer']);?> </td>
                                        <?php endwhile; ?>
                                    </tr>


                                    </tbody>

                                </table>


                            </div>


                        </form>
                    </div>
                </div>
                <div class="panel-footer">
                    <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                    <span class="pull-right">
                            <a href="update.php"
                               title="Profil bearbeiten" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Profil löschen" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                </div>

            </div>
        </div>
    </div>
</div>

</html>
