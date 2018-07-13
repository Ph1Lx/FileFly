<?php
session_start();
$pdo = new PDO('mysql::host=mars.iuk.hdm-stuttgart.de.;dbname=u-ns106', 'ns106', 'se4aeda8Ai', array('charset'=>'utf8'));
if(!isset($_SESSION['userid'])) {
    die('Bitte zuerst <a href="../registration/login.php">einloggen</a>');
}

//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];

$tablepath = "../uploads/table.php";

try {

    $pdo = new PDO('mysql::host=mars.iuk.hdm-stuttgart.de.;dbname=u-ns106', 'ns106', 'se4aeda8Ai', array('charset'=>'utf8'));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $ex){
    echo 'Not Connected'.$ex->getMessage();
}

$id = '';
$vorname = '';
$nachname = '';
$benutzername = '';
$geburtsdatum = '';


function getPosts(){

    $posts =  array();

    $posts [0] = $_POST['id'];
    $posts [1] = $_POST['vorname'];
    $posts [2] = $_POST['nachname'];
    $posts [3] = $_POST['geburtsdatum'];
    $posts [4] = $_POST['benutzername'];

    return $posts;
}


//Update Data

if (isset($_POST ['update']))
{
    $data = getPosts();
    if (empty($data[0]) || empty($data[1]) || empty($data [2]) || empty($data [3]) || empty($data [4]))
    {
        echo 'Enter The Data To Update';
    } else {

        $updateStmt = $pdo->prepare('UPDATE users2 SET vorname = :vorname, nachname =:nachname, geburtsdatum= :geburtsdatum, benutzername= :benutzername WHERE id= :$userid');
        $updateStmt->execute(array(
            ':id'=>$data[0],
            ':vorname'=>$data[1],
            ':nachname'=>$data[2],
            ':geburtsdatum'=>$data[3],
            ':benutzername'=>$data[4]
        ));
        if ($updateStmt)

        {
            echo 'Data Updated';
        }

    }
}

// Delete Data

if (isset($_POST ['delete']))
{
    $data = getPosts();
    if (empty($data[0]))
    {
        echo 'Enter The User ID To Delete';
    } else {

        $deleteStmt = $pdo->prepare(' DELETE FROM users2 WHERE id= :$userid');
        $deleteStmt ->execute(array(
            ':id'=>$data[0],

        ));
        if ($deleteStmt )

        {
            echo 'User Deleted';
        }

    }
}

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
            <label class="col-lg-3 control-label">Kundennummer:</label>
            <div class="col-lg-8">
                <input type="text" size="40" maxlength="250" name="id" value="<?php $statment = $pdo->query("SELECT id FROM users2 WHERE id =$userid");?>
                                <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>
                                <?= htmlspecialchars($datensatz ['id']);?>
                                <?php endwhile; ?>">
                                <?php echo $id;?>
            </div>
        </div>



                <div class="form-group">
                    <label class="col-lg-3 control-label">Vorname:</label>
                    <div class="col-lg-8">
                        <form action="edit.php" method="POST">
                        <?php echo $vorname;?>
                        <input type="text" size="40" maxlength="250" name="vorname" value="<?php $statment = $pdo->query("SELECT vorname FROM users2 WHERE id =$userid");?>
                                <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>
                                <?= htmlspecialchars($datensatz ['vorname']);?>
                                <?php endwhile; ?>">

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Nachname:</label>
                    <div class="col-lg-8">
                        <?php echo $nachname;?>
                        <input type="text" size="40" maxlength="250" name="nachname" value="<?php $statment = $pdo->query("SELECT nachname FROM users2 WHERE id =$userid");?>
                                <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>
                                <?= htmlspecialchars($datensatz ['nachname']);?>
                                <?php endwhile; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Benutzername:</label>
                    <div class="col-lg-8">
                        <?php echo $benutzername;?>
                        <input type="text" size="40" maxlength="250" name="benutzername" value=" <?php $statment = $pdo->query("SELECT benutzername FROM users2 WHERE id =$userid");?>
                                <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>
                                <?= htmlspecialchars($datensatz ['benutzername']);?>
                                <?php endwhile; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Geburtsdatum:</label>
                    <div class="col-lg-8">
                        <input type="text" size="40" maxlength="250" name="geburtsdatum" value="<?php $statment = $pdo->query("SELECT geburtsdatum FROM users2 WHERE id =$userid");?>
                                <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>
                                <?= htmlspecialchars($datensatz ['geburtsdatum']);?>
                                    <?php endwhile; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Geschlecht:</label>
                    <div class="col-lg-8">
                        <input type="text" size="40" maxlength="250" name="geschlecht" value=" <?php $statment = $pdo->query("SELECT geschlecht FROM users2 WHERE id =$userid");?>
                                <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>
                                <?= htmlspecialchars($datensatz ['geschlecht']);?>
                                    <?php endwhile; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input type="email" size="40" maxlength="250" name="email" value="<?php $statment = $pdo->query("SELECT email FROM users2 WHERE id =$userid");?>
                                <?php while ($datensatz = $statment->fetch(PDO::FETCH_ASSOC)): ?>
                                <?= htmlspecialchars($datensatz ['email']);?>
                                    <?php endwhile; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">Telefonnummer:</label>
                    <div class="col-md-8">
                        <input type="text" size="40" maxlength="250" name="telefonnummer" value=" <?php $statment = $pdo->query("SELECT telefonnummer FROM users2 WHERE id =$userid");?>
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
