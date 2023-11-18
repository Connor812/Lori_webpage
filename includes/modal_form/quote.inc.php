<?php

require_once '../../connect/db.php';
require_once '../../config-url.php';

echo "quote handler";

$quote_content = $_POST['quote_content'];
$section_id = $_GET['section_id'];
$page_num = $_GET['page_num'];

echo $quote_content . "<br>";
echo $section_id . "<br>";

// Error handler, checks to see if content is empty
if (empty($quote_content)) {
    header("Location: " . BASE_URL . "/admin_pages.php?error=empty_input&page_num=" . $page_num);
    exit;
} elseif ($section_id == '') {
    header("Location: " . BASE_URL . "/admin_pages.php?error=no_section_id&page_num=" . $page_num);
    exit;
} elseif (empty($page_num) || !isset($_GET['page_num'])) {
    header("Location: " . BASE_URL . "/admin_pages.php?error=no_page_num");
    exit;
}

// Updates the order_num to fit the new section 
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

// Needs to be plus one to add it the the new section
$new_section_id = $section_id + 1;

$sql = "INSERT INTO `journal_page`(`section_type`, `section_name`, `order_num`, `page_num`) VALUES ('quote', ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

if ($stmt) {
    // Bind your parameters
    $stmt->bind_param("sii", $quote_content, $new_section_id, $page_num);

    // Execute the statement
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "New section added!";
        } else {
            echo "Error adding section";
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


// SQL query to get the latest ID
$sql = "SELECT MAX(id) FROM journal_page;";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // Fetch the result
    $row = $result->fetch_assoc();
    $latestID = $row['MAX(id)'];
    echo $latestID . " <-lastest id<br>";
    $sql = "INSERT INTO `quote`(`quote_content`, `section_id`) VALUES (?, ?);";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Bind your parameters
        $stmt->bind_param("si", $quote_content, $latestID);

        // Execute the statement
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "New section added!";
                header("Location: " . BASE_URL . "/admin_pages.php?page_num=" . $page_num);
            } else {
                echo "Error adding section";
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
