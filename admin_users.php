<?php
require_once "admin-header.php";
require_once "config-url.php";
require_once "includes/admin_errors.inc.php";
?>

<div class="d-flex justify-content-start p-3 gap-2">
    <div class="dropdown">
        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown"
            aria-expanded="false">
            Dropdown button
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php
            // Grabs all the users from the database and displays them here
            $sql = "SELECT id, username FROM users;";
            $result = mysqli_query($mysqli, $sql);

            if (!$result) {
                die("Query failed: " . mysqli_error($mysqli));
            }

            while ($row = mysqli_fetch_assoc($result)) {
                $username = $row['username'];
                $user_id = $row['id'];
                echo '<li><a class="dropdown-item" href="admin_users.php?username=' . $username . '&user_id=' . $user_id . '">' . $username . '</a></li>';
            }
            ?>
        </ul>
    </div>
    <input type="hidden" name="username" value="<?php echo $_GET['username'] ?? ''; ?>">
</div>
<?php
// If there is a username in the url, we will display the users data
if (isset($_GET['username'])) {

    $username = $_GET['username'];

    // Query for the users information
    $sql = 'SELECT * FROM users WHERE username = ?;';

    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result) {
            $row = $result->fetch_assoc();
            // Getting all the necessary variables
            $user_id = $row["id"];
            $username = $row['username'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $registration_date = $row['registration_date'];

            // This gets the amount of pages that are in the database
            $sql = 'SELECT COUNT(DISTINCT page_num) AS num_pages FROM journal_page;';
            $result = mysqli_query($mysqli, $sql);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $page_nums = $row['num_pages'];

                // This section will display the users information
                echo '<div width="%100" class="d-flex justify-content-center m-3">
                <div id="user_info" class="container row border border-dark border-2 rounded p-4">
                    <div class="col d-flex flex-column gap-5">
                        <div>
                            <b>User Id:</b> ' . $user_id . '
                        </div>    
                        <div>
                            <b>Username:</b> ' . $username . '
                        </div>
                        <div>
                            <b>First Name:</b> ' . $first_name . '
                        </div>
                        <div>
                            <b>Last Name:</b>  ' . $last_name . '
                        </div>
                        <div>
                            <b>Email:</b> ' . $email . '
                        </div>
                        <div>
                            <b> Registration Date:</b> ' . $registration_date . '
                        </div>
                    </div>
                    <div class="col">
                        Permissions
                        <form method="post" action="includes/permissions.inc.php?user_id=' . $user_id . '&username=' . $username . '">
                            ';

                // this right here will loop over all the pages to echo a check box
                for ($i = 1; $i <= $page_nums; $i++) {

                    // Query for if a user has permissions to write on a certain page
                    $sql = 'SELECT * FROM permission WHERE user_id = ? AND page_num = ?;';

                    $stmt = $mysqli->prepare($sql);

                    if ($stmt) {
                        $stmt->bind_param("ii", $user_id, $i);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        // If the user has permissions from the admin, we will display a checked box, if not, no check
                        if ($result) {
                            if ($result->num_rows > 0) {
                                $checked = 'checked';
                            } else {
                                $checked = '';
                            }
                        } else {
                            echo "Prepare failed: " . $mysqli->error;
                            exit;
                        }
                    }
                    echo '
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="page_' . $i . '" value="' . $i . '" id="check_box_' . $i . '" ' . $checked . '/>
                        <label class="form-check-label" for="check_box_' . $i . '">Page ' . $i . '</label>
                        <a class="btn btn-primary" style="text-decoration: none; color: white;" href="' . BASE_URL . '/admin_users.php?username=' . $username . '&user_id=' . $user_id . '&page_num=' . $i . '">Open</a>
                    </div>';
                }

                echo '
                <button type="submit" class="btn btn-primary">Change Permissions</button>
                </form>
                    </div>
                </div>
            </div>';
            }
        } else {
            echo "No results found for the username: " . $username;
        }

        $stmt->close();
    } else {
        echo "Query preparation failed: " . $mysqli->error;
    }

} else {
    echo 'No user selected';
}
?>

<?php

    require_once 'includes/page-display.inc.php';

if (isset($_GET['page_num'])) {
    echo "<div class='container-fluid p-4'>
            <div class='d-flex justify-content-center'>
                <h1>" . $_GET['username'] ."</h1>
            </div>";
    get_page($_GET['page_num'], $_GET['user_id'], $mysqli);
    echo "</div>";

}

?>



<?php
require_once 'admin_footer.php';
?>