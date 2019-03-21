<?php
session_start();
include ('server/connection.php');

if (isset($_POST['up'])) {
    $file= $_FILES['upload']['name'];
    $fileTmpName= $_FILES['upload']['tmp_name'];

    $folder= 'folder name/';
    move_uploaded_file($fileTmpName, $folder.$file);
}
$sql= " INSERT INTO (MAME OF THE TABLE ('')) VALUES ('$file')";

$res= mysqli_query($db,$sql);

if ($res){
    echo "you uploaded so good";

} else{ echo "ERROR";}

?>
<!DOCTYPE html>
<html>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="upload" >
    <input type="submit" name="up" value="upload file">
</form>
</body>
</html>