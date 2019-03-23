<?php

if(isset($_GET["file-delete"])){
    $id = $_GET["file-delete"];
    mysqli_query($connection, "DELETE FROM materi_file WHERE id = '$id'");
    header("location:index.php?file");
}

?>