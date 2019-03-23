<?php

if(isset($_GET["materi-delete"])){
    $id = $_GET["materi-delete"];
    mysqli_query($connection, "DELETE FROM materi WHERE id = '$id'");
    header("location:index.php?materi");
}

?>