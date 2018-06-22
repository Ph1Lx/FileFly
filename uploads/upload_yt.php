<?php
$name = $_FILES['uploadfile']['name'];
$extension = strtolower(substr($name, strpos($name, '.')+1));
$size = $_FILES['uploadfile']['size'];
$max_size = 2097152;
$type = $_FILES['uploadfile']['type'];

$tmp_name = $_FILES['uploadfile']['tmp_name'];

echo $tmp_name;
echo "loction:".$location.$name;

if (isset($name)) {
    if (!empty($name)){
        if (($extension=='jpg'||$extension=='jpeg') && $type=='image/jpeg' && $size<=$max_size){
        $location = 'files/';

        if (move_uploaded_file($tmp_name, $location.$name)) {
            echo 'Uploaded!';
        } else {
            echo 'There was an error.';
        }
    } else {
        echo 'File must be jpg/jpeg and must be 2mb or less.';
    }
}}