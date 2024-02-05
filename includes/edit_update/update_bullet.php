<?php

require_once("../../config-url.php");

if (!isset($_GET["page_num"]) || !isset($_GET["order_num"])) {
    header("Location: " . BASE_URL . "admin_pages.php?error=no_page_num");
    exit;
}

$bullet_points = $_POST["bullet_point"];
print_r($bullet_points);

$page_num = $_GET["page_num"];
$order_num = $_GET["order_num"];

require_once("../../connect/db.php");

// ? Start a transaction
$mysqli->begin_transaction();

try {

    // ? This loops over the data and updates the bullet points
    foreach ($bullet_points as $bullet_id => $bullet_content) {



        
       
    }
} catch (Exception $e) {
    // Rollback the transaction if any query fails
    $mysqli->rollback();

    echo "Transaction failed: " . $e->getMessage();
}