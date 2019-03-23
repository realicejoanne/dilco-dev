<?php 

    ob_start();
    session_start();
    include "includes/head.php"; 
    include "includes/config.php";
    include "includes/header.php";
    if (isset($_GET["home"])) {include "includes/home.php";}
        else if (isset($_GET["mapel"])) {include "includes/materi.php";}
        else if (isset($_GET["faq"])) {include "includes/faq.php";}
        else if (isset($_GET["about"])) {include "includes/about.php";}
        else if (isset($_GET["ackno"])) {include "includes/acknowledgement.php";}
        else {include "includes/home.php";}
    include "includes/footer.php"; 
    mysqli_close($connection);
    ob_end_flush();

?>