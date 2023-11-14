<?php

require_once 'connect/db.php';
require_once 'config-url.php';
require_once 'includes/page-display.inc.php';

$user_id = $_SESSION['user_id'];

// If the user has selected a page from the bottom, then it will display here

if (isset($_GET['page_num'])) {
  $page_num = $_GET['page_num'];
  $user_id = $_SESSION['user_id'];

  // Checks to see if the user has permissions so they cant just select any page from the url
  $sql = "SELECT * FROM permission WHERE user_id = ? AND page_num = ?;";

  $stmt = $mysqli->prepare($sql);

  if ($stmt) {
    $stmt->bind_param('ii', $user_id, $page_num);
    $stmt->execute();
    $result = $stmt->get_result();
  } else {
    echo "Prepare failed: " . $mysqli->error;
    exit;
  }

  $page_num = $result->fetch_assoc();

  // If have permissions to more then one page_num, display the first one in the list
  if ($page_num > 0) {

    // Calls function in journal-display that displays all the pieces inside a page
    get_page($page_num['page_num'], $mysqli);

  } else {
    // ERROR
    echo 'You have no permissions';
  }
} else { 
  // This is going to get the first page the user has permissions for
  $sql = "SELECT * FROM permission WHERE user_id = ? ORDER BY page_num ASC LIMIT 1;";

  $stmt = $mysqli->prepare($sql);

  if ($stmt) {
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
  } else {
    echo "Prepare failed: " . $mysqli->error;
    exit;
  }

  $page_num = $result->fetch_assoc();

  // If have permissions to more then one page_num, display the first one in the list
  if ($page_num > 0) {

    // Calls function in journal-display that displays all the pieces inside a page
    get_page($page_num['page_num'], $mysqli);

  } else {
    // ERROR
    echo 'You have no permissions';
  }
}


// This gets the page numbers and displays the selections at the bottom of the page

$sql = 'SELECT * FROM permission WHERE user_id = ? ORDER BY page_num ASC;';

$stmt = $mysqli->prepare($sql);

if ($stmt) {
  $stmt->bind_param('i', $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
} else {
  echo "Prepare failed: " . $mysqli->error;
  exit;
}

// Fetch the results into an array
$pages = $result->fetch_all(MYSQLI_ASSOC);

if (count($pages) > 0) {
  echo '<nav class="d-flex justify-content-center" aria-label="Page navigation example">
  <ul class="pagination">';
  // Starts the page numbers
  $pageNum = 1;

  foreach ($pages as $page) {
    echo '<li class="page-item"><a class="page-link" href="' . BASE_URL . '/journal.php?page_num=' . $page['page_num'] . '">Page ' . $pageNum . '</a></li>';
    $pageNum++;
  }

  echo '</ul>
</nav>';
} else {
  echo "You do not have any permissions.";
}
?>