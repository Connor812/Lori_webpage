<?php

require_once '../../connect/db.php';
require_once '../../config-url.php';

$section_name = $_POST['section_name'];
$section_id = $_GET['section_id'];
$page_num = $_GET['page_num'];
echo $section_name . "<br>";
echo $section_id . "<br>";

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

$sql = "INSERT INTO `journal_page`(`section_type`, `section_name`, `order_num`, `page_num`) VALUES ('click_list', ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

if ($stmt) {
    // Bind your parameters
    $stmt->bind_param("sii", $section_name, $new_section_id, $page_num);

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
    $sql = "INSERT INTO `click_list`(`section_id`) VALUES (?);";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Bind your parameters
        $stmt->bind_param("i", $latestID);

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
} else {
    echo "No results found.";
}

// SQL query to get the latest ID
$sql = "SELECT MAX(id) FROM click_list;";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // Fetch the result
    $row = $result->fetch_assoc();
    $latestID = $row['MAX(id)'];
    echo $latestID . " <-lastest id<br>";

    // Check if the arrays exist and are not empty
    if (isset($_POST['item_type']) && is_array($_POST['item_type'])) {
        $itemTypes = $_POST['item_type'];
        $itemTitles = $_POST['item_title'];
        $itemUserdataNames = str_replace('', '_', $_POST['item_userdata_name']);
        $placeholderTexts = $_POST['placeholder_text'];

        // Loop through the arrays
        for ($i = 0; $i < count($itemTypes); $i++) {
            $type = $itemTypes[$i];
            $title = $itemTitles[$i];
            $userdataName = str_replace(' ', '_', $itemUserdataNames[$i]);
            $placeholderText = !empty($placeholderTexts[$i]) ? $placeholderTexts[$i] : null;

            // Process the data
            echo "Type: $type, Title: $title, Userdata Name: $userdataName, Placeholder Text: $placeholderText<br>";

            // Define the column type based on $type
            $columnType = ($type === 'textarea') ? 'TEXT DEFAULT NULL' : 'BIT(1) DEFAULT 0';

            // Construct SQL to add the column
            $sqlAddColumn = "ALTER TABLE user_input ADD COLUMN $userdataName $columnType;";

            // Prepare and execute the SQL statement to add the column
            if ($mysqli->query($sqlAddColumn)) {
                echo "New column added!";
            } else {
                echo "Error adding column: " . $mysqli->error;
            }

            $sql = "INSERT INTO `click_list_items`(`item_type`, `item_title`, `placeholder_text`, `item_userdata_name`, `click_list_id`) VALUES (?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($sql);

            if ($stmt) {
                // Bind your parameters
                $stmt->bind_param("ssssi", $type, $title, $placeholderText, $userdataName, $latestID);

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
        }
    }
} else {
    echo "No results found.";
}