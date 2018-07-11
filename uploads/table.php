<?php
session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Tabelle</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<br /><br />
<div class="container">
    <h2 align="left">Ablage</a></h2>
    <br />
    <div align="right">
        <button type="button" name="create_folder" id="create_folder" class="btn btn-success">Create</button>
    </div>
    <br />
    <div class="table-responsive" id="folder_table">

    </div>
</div>
</body>
</html>

<div id="folderModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span id="change_title">Create Folder</span></h4>
            </div>
            <div class="modal-body">
                <p>Gib einen Ordnername ein
                    <input type="text" name="folder_name" id="folder_name" class="form-control" /></p>
                <br />
                <input type="hidden" name="action" id="action" />
                <input type="hidden" name="old_name" id="old_name" />
                <input type="button" name="folder_button" id="folder_button" class="btn btn-default" value="Create" />

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Abbrechen</button>
            </div>
        </div>
    </div>
</div>

<div id="moveModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span id="select_folder_title">Wähle den Zielordner</span></h4>
            </div>
            <div class="modal-body">
                <div id="select_form">

                    <form name="folder_select" id="folder_select" method="post">
                        <select name="select_folder" id="select_folder">
                                <option value="" selected="selected">Wähle einen Ordner</option>
                                <?php
                                $directory = $_SESSION['userid'].'/';
                                $dirs = glob($directory.'*', GLOB_ONLYDIR);
                                foreach($dirs as $val){
                                    echo '<option value="'.basename($val).'">'.basename($val)."</option>\n";
                                }
                                ?>
                        </select>
                    <!--<input type="submit" name="verschieben_button" id="verschieben_button" value="Verschieben" class="btn btn-default"/>-->
                        <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="old_name" id="old_name" />
                        <input type="button" name="move_button" id="move_button" class="btn btn-default" value="Verschieben" />
                    </form>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Abbrechen</button>
            </div>
        </div>
    </div>
</div>


<?php

/*if(isset($_POST['verschieben_button']))
{
    $fileName = $_SESSION['filename'];

    $selectedFolder = $_POST['folder'];

    $currentFilePath = $fileName;

    $newFilePath = $selectedFolder.'/'.$fileName;

    rename($currentFilePath, $newFilePath);

    if($fileMoved){
        echo "<script type='text/javascript'>alert('Deine Datei wurde erfolgreich verschoben!')</script>";
    } else {
        echo "<script type='text/javascript'>alert('Beim Verschieben deiner Datei lief etwas schief. Bitte versuche es nochmal!')</script>";
    }

}*/

?>

<script>
    $(document).ready(function(){

        load_folder_list();

        function load_folder_list()
        {
            var action = "fetch";
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{action:action},
                success:function(data)
                {
                    $('#folder_table').html(data);
                }
            });
        }

        $(document).on('click', '#create_folder', function(){
            $('#action').val("create");
            $('#folder_name').val('');
            $('#folder_button').val('Create');
            $('#folderModal').modal('show');
            $('#old_name').val('');
            $('#change_title').text("Create Folder");
        });

        $(document).on('click', '#folder_button', function(){
            var folder_name = $('#folder_name').val();
            var old_name = $('#old_name').val();
            var action = $('#action').val();
            if(folder_name != '')
            {
                $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:{folder_name:folder_name, old_name:old_name, action:action},
                    success:function(data)
                    {
                        $('#folderModal').modal('hide');
                        load_folder_list();
                        alert(data);
                    }
                });
            }
            else
            {
                alert("Enter Folder Name");
            }
        });

        $(document).on("click", ".update", function(){
            var folder_name = $(this).data("name");
            $('#old_name').val(folder_name);
            $('#folder_name').val(folder_name);
            $('#action').val("change");
            $('#folderModal').modal("show");
            $('#folder_button').val('Übernehmen');
            $('#change_title').text("Ordnername ändern");
        });

        $(document).on("click", ".update_file", function(){
            var folder_name = $(this).data("name");
            $('#old_name').val(folder_name);
            $('#folder_name').val(folder_name);
            $('#action').val("change_file");
            $('#folderModal').modal("show");
            $('#folder_button').val('Übernehmen');
            $('#change_title').text("Ordnername ändern");
        });

        $(document).on("click", ".move_file", function(){
            var old_name = $(this).data("name");
            $('#old_name').val(old_name);

            $('#action').val("move_file");
            $('#moveModal').modal("show");
            $('#move_button').val('Übernehmen');
            $('#select_folder_title').text("Wähle den Zielordner");
        });

        $(document).on('click', '#move_button', function(){
            var select_folder = $('#select_folder').val();
            var old_name = $('#old_name').val();
            var action = $('#action').val();
            if(select_folder != '')
            {
                $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:{select_folder:select_folder, old_name:old_name, action:action},
                    success:function(data)
                    {
                        $('#moveModal').modal('hide');
                        load_folder_list();
                        alert(data);
                    }
                });
            }
            else
            {
                alert("Wähle einen Zielordner!");
            }
        });

        $(document).on("click", ".delete", function(){
            var folder_name = $(this).data("name");
            var action = "delete";
            if(confirm("Bist du sicher, dass Du diesen Ordner löschen möchtest?"))
            {
                $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:{folder_name:folder_name, action:action},
                    success:function(data)
                    {
                        load_folder_list();
                        alert(data);
                    }
                });
            }
        });

        /*$('#moveModal').on('submit', function () {
            var old_location = $(this).data("name");
            var new_location = $("#move_file").val();
            var action = "move_file";
            if(confirm("Bist du sicher, dass Du diese Datei verschieben möchtest?"))
            {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: {old_location: old_location, new_location:new_location, action: action},
                    success:function (data) {
                        load_folder_list();
                        alert(data);
                    }
                })
            }
        })*/

        $(document).on('click', '.remove_file', function(){
            var path = $(this).attr("id");
            var action = "remove_file";
            if(confirm("Bist du sicher, dass Du diese Datei löschen möchtest?"))
            {
                $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:{path:path, action:action},
                    success:function(data)
                    {
                        alert(data);
                        $('#folder_table').modal('hide');
                        load_folder_list();
                    }
                });
            }
        });
    });
</script>
