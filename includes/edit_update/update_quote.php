<?php 

require_once("../../config-url.php");

$quote_content = $_POST["quote_content"];
$page_num = $_GET["page_num"];
$order_num = $_GET["order_num"];

if (!isset($_GET["page_num"]) || !isset($_GET["order_num"])) {
    echo "error no page_num";
    header("Location: " . BASE_URL . "/admin_pages.php?error=missing_section_params");
} elseif (empty($quote_content)) {
    echo "error empty input";
    header("Location: " . BASE_URL . "/admin_edit/edit_quote.php?error=empty_input&page_num=$page_num&order_num=$order_num");
} else {
    // Include necessary files and initialize database connection
    require_once '../../connect/db.php';
    

    // Prepare and execute the SQL statement
    $sql = "UPDATE journal_page AS jp
            JOIN quote AS q ON jp.id = q.section_id
            SET jp.section_name = ?,
                q.quote_content = ?
            WHERE jp.page_num = ? AND jp.order_num = ?";

    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("ssii", $quote_content, $quote_content, $page_num, $order_num);

        // Execute the query
        $stmt->execute();

        // Check for success
        if ($stmt->affected_rows > 0) {
            echo "Update successful!";
            header("Location: " . BASE_URL . "/admin_pages.php?success=updated_success&page_num=$page_num&#$order_num");
        } else {
            echo "Update failed!";
            header("Location: " . BASE_URL . "/admin_pages.php?error=updated_same&&page_num=$page_num#$order_num");
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Prepare failed: " . $mysqli->error;
    }

    // Close the database connection
    $mysqli->close();
}
