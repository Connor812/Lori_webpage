<?php

require_once '../../connect/db.php';
require_once '../../config-url.php';

echo "heading handler <br>";

$heading_content = $_POST['heading_content'];
$section_id = $_GET['section_id'];
$page_num = $_GET['page_num'];

echo $heading_content . "<br>";
echo $section_id . "<br>";
echo $page_num . "<br>";

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
        $stmt->close();

        // Proceed to the next step
        $new_section_id = $section_id + 1;

        $sql = "INSERT INTO `journal_page`(`section_type`, `section_name`, `order_num`, `page_num`) VALUES ('heading', ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            // Bind your parameters
            $stmt->bind_param("sii", $heading_content, $new_section_id, $page_num);

            // Execute the statement
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    echo "New section added!";

                    // Proceed to the next step
                    $sql = "SELECT MAX(id) FROM journal_page;";
                    $result = $mysqli->query($sql);

                    if ($result->num_rows > 0) {
                        // Fetch the result
                        $row = $result->fetch_assoc();
                        $latestID = $row['MAX(id)'];
                        echo $latestID . " <-latest id<br>";
                        $sql = "INSERT INTO `heading`(`heading_content`, `section_id`) VALUES (?, ?);";
                        $stmt = $mysqli->prepare($sql);

                        if ($stmt) {
                            // Bind your parameters
                            $stmt->bind_param("si", $heading_content, $latestID);

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
        echo "Execution failed: " . $stmt->error;
    }
} else {
    echo "Prepare statement failed: " . $mysqli->error;
}