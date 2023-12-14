<?php
require_once("../../config-url.php");
require_once 'update_journal_page.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve section_id and page_num from the URL
    $section_id = isset($_GET['section_id']) ? intval($_GET['section_id']) : 0;
    $page_num = isset($_GET['page_num']) ? intval($_GET['page_num']) : 0;

echo $section_id . "<----";

    // Validate section_id and page_num (you may add more validation as needed)
    if ($section_id <= 0 || $page_num <= 0) {
        echo "Invalid section_id or page_num";
        exit;
    }

    // Retrieve the bullet list name
    $bulletListName = isset($_POST['section_name']) ? $_POST['section_name'] : '';

    // Validate the bullet list name (you may add more validation as needed)
    if (empty($bulletListName)) {
        echo "Bullet list name is required";
        exit;
    }

    // Retrieve the array of bullet content
    $bulletContentArray = isset($_POST['bullet_content']) ? $_POST['bullet_content'] : array();

    // Include necessary files and initialize database connection
    require_once '../../connect/db.php';

    // Start a transaction
// Updates the order_num to fit the new section 
    update_journal_page($section_id, $page_num, $mysqli);

    $new_section_id = $section_id + 1;

    $mysqli->begin_transaction();

    try {
        // Insert section information into journal_page
        $sql = "INSERT INTO journal_page (section_type, section_name, order_num, page_num) VALUES ('bullet', ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sii", $bulletListName, $new_section_id, $page_num);
        $stmt->execute();

        // Get the last inserted section_id
        $last_section_id = $mysqli->insert_id;

        // Insert a new bullet associated with the section
        $sql = "INSERT INTO bullet (section_id) VALUES (?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $last_section_id);
        $stmt->execute();

        // Get the last inserted bullet_id
        $last_bullet_id = $mysqli->insert_id;

        // Insert bullet points into bullet_point table
        $sql = "INSERT INTO bullet_point (bullet_content, bullet_id) VALUES (?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("si", $bulletContent, $last_bullet_id);

        foreach ($bulletContentArray as $bulletContent) {
            $stmt->execute();
        }

        // If everything is successful, commit the transaction
        $mysqli->commit();

        echo "Data inserted successfully!";
        header("Location: " . BASE_URL . "/admin_pages.php?success=successfully_added_section");
    } catch (Exception $e) {
        // If there's an error, roll back the transaction
        $mysqli->rollback();
        echo "Error: " . $e->getMessage();
    } finally {
        // Close the statement and database connection
        if (isset($stmt)) {
            $stmt->close();
        }
        $mysqli->close();
    }
} else {
    echo "Invalid request method";
}