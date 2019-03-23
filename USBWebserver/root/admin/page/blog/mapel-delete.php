<?php

if(isset($_GET["mapel-delete"])){
    $id = $_GET["mapel-delete"];
    mysqli_query($connection, "DELETE FROM mata_pelajaran WHERE id = '$id'");
    header("location:index.php?mapel");
}

?>