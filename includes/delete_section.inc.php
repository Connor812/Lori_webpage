<?php

require_once '../connect/db.php';
require_once '../config-url.php';

$section_id = $_GET['section_id'];
$page_num = $_GET['page_num'];

echo $section_id . "<br>";
echo $page_num . "<br>";

// Updates the order_num to fit the new section 
$sql = "UPDATE journal_page SET order_num = order_num - 1 WHERE order_num > ?;";

$stmt = $mysqli->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $section_id);
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Update was successful. Affected rows: " . $stmt->affected_rows;
        } else {
            echo "No rows were updated.";
        }
    } else {
        echo "Execution failed: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Prepare statement failed: " . $mysqli->error;
}

$sql = "DELETE FROM `journal_page` WHERE order_num = ? AND page_num = ?;";

$stmt = $mysqli->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ii", $section_id, $page_num);
    $stmt->execute();
    // Check if the delete operation was successful
    if ($stmt->affected_rows > 0) {
        echo "Delete successful!";
        header("Location: " . BASE_URL . "/admin_pages.php?page_num=" . $page_num);
    } else {
        echo "No rows deleted. Check your conditions.";
    }
} else {
    // Handle the case where the statement preparation failed
    echo "Statement preparation failed: " . $mysqli->error;
}