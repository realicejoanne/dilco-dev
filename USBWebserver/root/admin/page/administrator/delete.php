<?php
if(isset($_GET["administrator-delete"])){
    $id_admin = $_GET["administrator-delete"];
    mysqli_query($connection, "DELETE FROM admin WHERE id = '$id_admin'");
    header("location:index.php?administrator");
    
}


?>