<?php

require_once '../../connect/db.php';
require_once '../../config-url.php';
require_once 'update_journal_page.php';

$story_box_name = $_POST['story_box_name'];
$story_box_userdata_name = str_replace(' ', '_', $_POST['story_box_userdata_name']);
$placeholder_text = $_POST['placeholder_text'];
$section_id = $_GET['section_id'];
$page_num = $_GET['page_num'];

// Error handler, checks to see if content is empty
if (empty($story_box_name) || empty($story_box_userdata_name) || empty($placeholder_text)) {
    header("Location: " . BASE_URL . "/admin_pages.php?error=empty_input&page_num=" . $page_num);
    exit;
} elseif ($section_id == '') {
    header("Location: " . BASE_URL . "/admin_pages.php?error=no_section_id&page_num=" . $page_num);
    exit;
} elseif (empty($page_num) || !isset($_GET['page_num'])) {
    header("Location: " . BASE_URL . "/admin_pages.php?error=no_page_num");
    exit;
}

// This checks to see if the userdata_name is already in the inputs table
$sql = "SELECT COLUMN_NAME 
FROM INFORMATION_SCHEMA.COLUMNS 
WHERE TABLE_NAME = 'user_input' 
AND COLUMN_NAME = ?;";

$stmt = $mysqli->prepare($sql);
if ($stmt) {
    $stmt->bind_param("s", $story_box_userdata_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if (!empty($row["COLUMN_NAME"])) {
        // echo "works for exist<br>";
        header("Location: " . BASE_URL . "/admin_pages.php?error=input_exists&page_num=" . $page_num);
        exit;
    } else {
        // echo "Does not exist!";
    }
}

// Updates the order_num to fit the new section 
update_journal_page($section_id, $page_num, $mysqli);

// Needs to be plus one to add it the the new section
$new_section_id = $section_id + 1;

$sql = "INSERT INTO `journal_page`(`section_type`, `section_name`, `order_num`, `page_num`) VALUES ('story_box', ?, ?, ?);";
$stmt = $mysqli->prepare($sql);

if ($stmt) {
    // Bind your parameters
    $stmt->bind_param("sii", $story_box_name, $new_section_id, $page_num);

    // Execute the statement
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            // echo "New section added!";
        } else {
            // echo "Error adding section";
            header("Location: " . BASE_URL . "/admin_pages.php?error=could_not_generate_user_input&page_num=$page_num");
            exit;
        }
    } else {
        // Handle execution error
        echo "Error executing the statement: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // Handle statement preparation error
    echo "Error preparing the statement: " . $mysqli->error;
}

$sql = "ALTER TABLE user_input ADD COLUMN " . $story_box_userdata_name . " TEXT DEFAULT NULL";

if ($mysqli->query($sql)) {
    // echo "New column added!";
} else {
    echo "Error adding column: " . $mysqli->error;
}

// SQL query to get the latest ID
$sql = "SELECT MAX(id) FROM journal_page;";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // Fetch the result
    $row = $result->fetch_assoc();
    $latestID = $row['MAX(id)'];
    $sql = "INSERT INTO `story_box`(`story_box_userdata_name`, `placeholder_text`, `section_id`) VALUES (?, ?, ?);";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Bind your parameters
        $stmt->bind_param("ssi", $story_box_userdata_name, $placeholder_text, $latestID);

        // Execute the statement
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                // echo "New section added!";
                header("Location: " . BASE_URL . "/admin_pages.php?success=added_story_box&page_num=$page_num#$section_id");
            } else {
                // echo "Error adding section";
                header("Location: " . BASE_URL . "/admin_pages.php?error=error_adding_story_box&page_num=$page_num");
            }
        } else {
            // Handle execution error
            echo "Error executing the statement: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Handle statement preparation error
        echo "Error preparing the statement: " . $mysqli->error;
    }
} else {
    echo "No results found.";
}
