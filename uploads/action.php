<?php
session_start();

$directory = $_SESSION['userid'].'/';

if(isset($_POST["action"]))
{
    //Datein vom Userordner "sammeln" und Tabelle anlegen
    if($_POST["action"] == "fetch")
    {
        $folder = (glob($directory.'*', GLOB_ONLYDIR));

        $uploadfile = array_filter(glob($directory.'*'), 'is_file');

        $output = '
  <table class="table table-bordered table-striped">
   <tr>
    <th>Name</th>
    <th>Umbenennen</th>
    <th>Löschen</th>
    <th>Teilen</th>
    <th>Download</th>
    <th>Verschieben</th>
   </tr>
   ';
        //wenn die Zahl der Ordner oder Dateien größer als 0 ist...
        if(count($folder) > 0 or count($uploadfile) > 0)
        {
            //...wird für jeden Ordner eine Zeile mit Buttons angelegt...
            foreach($folder as $name)
            {
                $output .= '
     <tr>
      <td>'.basename($name).'</td>
      <td><button type="button" name="rename" data-name="'.basename($name).'" class="update btn btn-default btn-xs">Rename</button></td>
      <td><button type="button" name="delete" data-name="'.$name.'" class="delete btn btn-default btn-xs">Delete</button></td>
      <td><button type="button" name="view_files" data-name="'.$name.'" class="view_files btn btn-default btn-xs">Teilen</button></td>
      <td></td>
      <td></td>
     </tr>';


            }
            //...ebenso wird für jede Datei eine Zeile mit Buttons angelegt
            foreach($uploadfile as $file)
            {
                $_SESSION['filename'] = $file;
                $output .='
     <tr>
      <td>'.basename($file).'</td>
      <td><button type="button" name="change_file" data-name="'.basename($file).'" class="update_file btn btn-default btn-xs">Rename</button></td>
      <td><button type="button" name="remove_file" class="remove_file btn btn-default btn-xs" id="'.$file.'">Delete</button></td>
      <td><button type="button" name="view_files" data-name="'.$file.'" class="view_files btn btn-default btn-xs">Teilen</button></td>
      <td><a download="'.$file.'" href="'.$file.'"> Download</a></td>
      <td><button type="button" name="move_file" data-name="'.$file.'" class="move_file btn btn-default btn-xs" data-toggle="modal" data-target="#moveModal">Verschieben</button></td>



     </tr>';

            }
        }
        else
            //wenn die Anzahl der Ordner und Dateien 0 ist, wird diese Nachricht angezeigt
        {
            $output .= '
    <tr>
     <td colspan="6">No File or Folder Found</td>
    </tr>
   ';
        }
        $output .= '</table>';
        echo $output;
    }


    /*wird auf den Button "create" geklickt und somit die gleichnamige Funktion aufgerufen,
    wird ein Ordner erstellt*/
    if($_POST["action"] == "create")
    {
        /*zuerst wird geprüft ob bereits ein Ordner mit diesem Name existiert. Sollte das nicht
        der Fall sein, wird der Ordner erstellt*/
        if(!file_exists($_POST["folder_name"]))
        {
            mkdir($directory.$_POST["folder_name"], 0777, true);
            chmod($directory.$_POST["folder_name"], 0777);
            echo 'Ordner wurde erstellt';
        }
        else
        {
            echo 'Ordner existiert bereits';
        }
    }
    if($_POST["action"] == "change")
    {
        if(!file_exists($directory.$_POST["folder_name"]))
        {
            rename($directory.$_POST["old_name"], $directory.$_POST["folder_name"]);
            echo 'Ordnername wurde geändert';
        }
        else
        {
            echo 'Ein Ordner mit diesem Name existiert bereits';
        }
    }

    if($_POST["action"] == "delete")
    {
        $files = scandir($_POST["folder_name"]);
        foreach($files as $file)
        {
            if($file === '.' or $file === '..')
            {
                continue;
            }
            else
            {
                unlink($_POST["folder_name"] . '/' . $file);
            }
        }
        if(rmdir($_POST["folder_name"]))
        {
            echo 'Ordner wurde gelöscht';
        }
    }

    if($_POST["action"] == "move_file")
    {
        //$selectedFolder = $_POST['folder'];

        $old_location = $_POST["old_location"];

        $new_location = $directory.'/'.$_POST["new_location"].'/'.$name;

        $fileMoved = rename($old_location, $new_location);

        if($fileMoved){
            echo 'Success!';
        } else {
            echo "Beim Verschieben deiner Datei lief etwas schief, versuche es nochmal!";
        }
    }

    if($_POST["action"] == "remove_file")
    {
        if(file_exists($_POST["path"]))
        {
            unlink($_POST["path"]);
            echo 'Die Datei wurde gelöscht';
        }
    }

    if($_POST["action"] == "change_file")
    {
        if(!file_exists($directory.$_POST["folder_name"]))
        {
            rename($directory.$_POST["old_name"], $directory.$_POST["folder_name"]);
            echo 'Dateiname wurde geändert';
        }
        else
        {
            echo 'Eine Datei mit diesem Name existiert bereits';
        }
    }
}
?>
