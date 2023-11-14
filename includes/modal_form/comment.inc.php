<?php

require_once "../../connect/db.php";
require_once "../../config-url.php";

echo "comment handler<br>";

// Get input data from POST and GET
$section_name = $_POST['section_name'];
$section_id = $_GET['section_id'];
$page_num = $_GET['page_num'];
$comment_userdata_name = str_replace(' ', '_', $_POST['comment_userdata_name']);
$comment_placeholder = $_POST['comment_placeholder'];

// Output for debugging
echo $section_name . "<br>";
echo $section_id . "<br>";
echo $page_num . "<br>";
echo $comment_userdata_name . "<br>";
echo $comment_placeholder . "<br>";

// Error handlers ---------------------------------------------------------------------------------------------------------------------------->






// Update the order_num to fit the new section
$sql = "UPDATE journal_page SET order_num = order_num + 1 WHERE order_num > ?;";

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

// Need to add one to the section_id to place it in the new section
$new_section_id = $section_id + 1;

// Insert a new section into the journal_page table
$sql = "INSERT INTO `journal_page`(`section_type`, `section_name`, `order_num`, `page_num`) VALUES ('comment', ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sii", $section_name, $new_section_id, $page_num);
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "New section added!";
        } else {
            echo "Error adding section";
        }
    } else {
        echo "Error executing the statement: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error preparing the statement: " . $mysqli->error;
}

// SQL query to get the latest ID from journal_page
$sql = "SELECT MAX(id) FROM journal_page;";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $latestID = $row['MAX(id)'];
    echo $latestID . " <-lastest id<br>";

    // Add a new column to the user_input table
    $sqlAddColumn = "ALTER TABLE user_input ADD COLUMN $comment_userdata_name TEXT DEFAULT NULL;";
    if ($mysqli->query($sqlAddColumn)) {
        echo "New column added!";
    } else {
        echo "Error adding column: " . $mysqli->error;
    }

    // Insert data into the comment table
    $sql = "INSERT INTO `comment`(`comment_userdata_name`, `comment_placeholder`, `section_id`) VALUES (?,?,?);";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssi", $comment_userdata_name, $comment_placeholder, $latestID);
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "New section added!";
                header("Location: " . BASE_URL . "/admin_pages.php?page_num=" . $page_num);
            } else {
                echo "Error adding section";
            }
        } else {
            echo "Error executing the statement: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing the statement: " . $mysqli->error;
    }
} else {
    echo "No results found.";
}