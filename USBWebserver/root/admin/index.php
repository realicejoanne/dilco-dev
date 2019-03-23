<?php

ob_start();
session_start();
if(!isset($_SESSION['admin_id']))header("location:login.php");
include "../includes/config.php";

?>
<!DOCTYPE html>
<html>
<?php include("include/head.php") ?>
<body>
    <div id="wrapper">
        <?php include("include/header.php") ?>
        <div id="page-wrapper">
            <?php
            if (isset($_GET["mapel"])) include("page/blog/mapel.php");
            else if (isset($_GET["mapel-delete"])) include("page/blog/mapel-delete.php");
            else if (isset($_GET["mapel-update"])) include("page/blog/mapel-update.php");
            else if (isset($_GET["materi"])) include("page/blog/materi.php");
            else if (isset($_GET["materi-delete"])) include("page/blog/materi-delete.php");
            else if (isset($_GET["materi-update"])) include("page/blog/materi-update.php");
			else if (isset($_GET["file"])) include("page/blog/file.php");
            else if (isset($_GET["file-delete"])) include("page/blog/file-delete.php");
            else if (isset($_GET["file-update"])) include("page/blog/file-update.php");
            else if (isset($_GET["user"])) include("page/user/index.php");
            else if (isset($_GET["administrator"])) include("page/administrator/index.php");
            else if (isset($_GET["administrator-delete"])) include("page/administrator/delete.php");
            else if (isset($_GET["administrator-update"])) include("page/administrator/update.php");
            else include("page/home/index.php");
            ?>
        </div>
    </div>
    <?php include("include/footer.php") ?>
</body>
</html>
<?php

mysqli_close($connection);
ob_end_flush();

?>
