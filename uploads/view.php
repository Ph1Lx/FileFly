<!--<link rel="stylesheet" href="view.css">-->
<!DOCTYPE html>
<html>
<head>
    <title>PHP Filesystem with Ajax JQuery</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<br /><br />
<div class="container">
    <div class="table-responsive" id="folder_table">

    </div>
</div>
</body>
</html>

<?php

$ordner = "files";
$alledateien = scandir($ordner);

foreach ($alledateien as $datei) {
    $dateiinfo = pathinfo($ordner."/".$datei);
    $size = ceil(filesize($ordner."/".$datei)/1024);
    if ($datei != "." && $datei != ".."  && $datei != "_notes" && $bildinfo['basename'] != "Thumbs.db") {

        //Bildtypen sammeln
        $bildtypen= array("jpg", "jpeg", "gif", "png");
        //Dateien nach Typ prüfen, in dem Fall nach Endungen für Bilder filtern
        if(in_array($dateiinfo['extension'],$bildtypen))
        {
            ?>
            <div class="galerie">
                <a href="<?php echo $dateiinfo['dirname']."/".$dateiinfo['basename'];?>">
                    <img src="<?php echo $dateiinfo['dirname']."/".$dateiinfo['basename'];?>" width="140" alt="Vorschau" />--></a>
                <span><?php echo $dateiinfo['filename']; ?> (<?php echo $size ; ?>kb)</span>
            </div>
            <?php
            // wenn keine Bildendung dann normale Liste für Dateien ausgeben
        } else { ?>
            <div class="file">
                <a href="<?php echo $dateiinfo['dirname']."/".$dateiinfo['basename'];?>">&raquo <?php echo $dateiinfo['filename']; ?></a> (<?php echo $dateiinfo['extension']; ?> | <?php echo $size ; ?>kb)
            </div>
        <?php } ?>
        <?php
    };
};
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.file:even').addClass('even');
    });
</script>
<script>
    $(document).ready(function() {

        load_folder_list();

        function load_folder_list() {
            var action = "fetch";
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {action: action},
                success: function (data) {
                    $('#folder_table').html(data);
                }
            });
        }
    }
</script>