<?php
    require_once("../admin-header.php");
    require_once("../connect/db.php");
    require_once("../config-url.php");
   
    if (!isset($_GET["page_num"]) || !isset($_GET["order_num"])) {
        echo "Error! Cannot edit Section";
        header("Location: " . BASE_URL . "/admin_pages.php?error=missing_section_params");
    }


?>

<main>






</main>