<?php
require_once "admin-header.php";
require_once "config-url.php";
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

if (isset($_GET['page_num'])) {

$page_num = $_GET['page_num'];

    $sql = "SELECT
    jp.id AS journal_page_id,
    jp.section_type,
    jp.section_name,
    jp.order_num,
    h.id AS heading_id,
    h.heading_content,
    q.id AS quote_id,
    q.quote_content,
    b.id AS byline_id,
    b.byline_content,
    sb.id AS story_box_id,
    sb.story_box_userdata_name,
    sb.placeholder_text,
    v.id AS video_id,
    v.video_src,
    c.id AS click_list_id,
    sh.id AS subheading_id,
    sh.subheading_content,
    i.id AS image_id,
    i.image_src,
    i.image_text,
    t.id AS text_id,
    t.text_content,
    bu.id AS bullet_id
FROM journal_page AS jp
LEFT JOIN heading AS h ON jp.id = h.section_id
LEFT JOIN quote AS q ON jp.id = q.section_id
LEFT JOIN byline AS b ON jp.id = b.section_id
LEFT JOIN story_box AS sb ON jp.id = sb.section_id
LEFT JOIN video AS v ON jp.id = v.section_id
LEFT JOIN click_list AS c ON jp.id = c.section_id
LEFT JOIN subheading AS sh ON jp.id = sh.section_id
LEFT JOIN image AS i ON jp.id = i.section_id
LEFT JOIN text AS t ON jp.id = t.section_id
LEFT JOIN bullet AS bu ON jp.id = bu.section_id
WHERE jp.page_num = ? 
ORDER BY jp.order_num ASC;";

    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $page_num);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['section_type'] == 'heading') {
                    heading_section($row);
                } elseif ($row['section_type'] == 'click_list') {
                    click_list_section($row, $mysqli);
                } elseif ($row['section_type'] == 'quote') {
                    quote_section($row);
                } elseif ($row['section_type'] == 'byline') {
                    byline_section($row);
                } elseif ($row['section_type'] == 'story_box') {
                    story_box_section($row, $mysqli);
                } elseif ($row['section_type'] == 'video') {
                    video_section($row);
                } elseif ($row['section_type'] == 'subheading') {
                    subheading_section($row);
                } elseif ($row['section_type'] == 'image') {
                    image_section($row);
                } elseif ($row['section_type'] == 'bullet') {
                    bullet_section($row, $mysqli);
                } elseif ($row['section_type'] == 'text') {
                    text_section($row);
                }
            }
        } else {
            echo "Query Error: " . mysqli_error($conn);
        }
    }

}

function heading_section($heading_row)
{
    echo "
    <section style='width: 100%;' id='" . $heading_row['order_num'] . "'>
        <h2 style='text-align: center;'>" . $heading_row['heading_content'] . "</h2>
        <hr>
    </section>
            ";

}

// Takes care of the click list content--------------------------------------------------->

function click_list_section($click_list_row, $mysqli)
{

    echo "<div class='accordion'>
<div class='accordion-item'>
  <h2 class='accordion-header'>
    <button
      class='accordion-button'
      type='button'
      data-mdb-toggle='collapse'
      data-mdb-target='#" . str_replace(' ', '_', $click_list_row['section_name']) . "'
      aria-expanded='true'
      aria-controls='" . str_replace(' ', '_', $click_list_row['section_name']) . "'
    >
    " . $click_list_row['section_name'] . "
    </button>
  </h2>
  <div id='" . str_replace(' ', '_', $click_list_row['section_name']) . "' class='accordion-collapse collapse aria-labelledby='" . str_replace(' ', '_', $click_list_row['section_name']) . "' data-mdb-parent='#" . str_replace(' ', '_', $click_list_row['section_name']) . "'>
    <div class='accordion-body'>
    " . get_click_list_items($click_list_row['click_list_id'], $mysqli) . "
    </div>
  </div>
</div>";



}

// Takes care of the items inside of the click list --------------------------------------------------->

function get_click_list_items($click_list_id, $mysqli)
{
    $content = ''; // Initialize an empty string to store the content

    $sql = "SELECT
    cl.id AS click_list_id,
    cl.section_id AS click_list_section_id,
    cli.id AS click_list_item_id,
    cli.item_type AS click_list_item_type,
    cli.item_title AS item_title,
    cli.placeholder_text AS placeholder_text,
    cli.item_userdata_name AS item_userdata_name
FROM click_list AS cl
LEFT JOIN click_list_items AS cli ON cl.id = cli.click_list_id
WHERE cl.id = ?;";

    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $click_list_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            echo "Failed to grab the click_list content <br>";
            exit();
        }

        foreach ($result as $click_list_item) {
            if ($click_list_item['click_list_item_type'] == 'checkbox') {
                $content .= '<div class="form-check">
                    <input name="' . $click_list_item['item_userdata_name'] . '" class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">' . $click_list_item['item_title'] . '</label>
                </div>
                <br>';
            } elseif ($click_list_item['click_list_item_type'] == 'textarea') {
                $content .= '<label for="comment">' . $click_list_item['item_title'] . '</label>
                    <textarea name ="' . $click_list_item['item_userdata_name'] . '" class="form-control" rows="7" id="comment"
                        placeholder="' . $click_list_item['placeholder_text'] . '"></textarea>
                <br>';
            }
        }
    } else {
        echo "Prepare failed: " . $mysqli->error;
        exit;
    }

    return $content; // Return the concatenated content after the loop 
}

// Takes care of the quote_section --------------------------------------------------->

function quote_section($quote_row)
{
    echo '<h5 class="px-5" style="padding: 0% 0%; text-align: center;"><i>"' . $quote_row["quote_content"] . '"</i></h5>';

}

// Takes care of the byline_section --------------------------------------------------->

function byline_section($byline_row)
{
    echo '<h5 id="' . $byline_row['section_name'] . '" style="padding: 0% 0%; text-align: center;"><b>' . $byline_row['byline_content'] . '</b> </h5>';

}

// Takes care of the subheading_section --------------------------------------------------->

function subheading_section($subheading_row)
{
    echo "<h4 class='d-flex justify-content-center' id='" . $subheading_row['section_name'] . "' style='padding: 10px;'><b>" . $subheading_row['subheading_content'] . "</b></h4>";

}

// Takes care of the story_box_section --------------------------------------------------->

function story_box_section($story_box_row, $mysqli)
{

    echo "
    <div class='accordion'>
        <div class='accordion-item'>
        <h2 class='accordion-header'>
            <button
                class='accordion-button'
                type='button'
                data-mdb-toggle='collapse'
                data-mdb-target='#" . str_replace(' ', '_', $story_box_row['section_name']) . "'
                aria-expanded='true'
                aria-controls='" . str_replace(' ', '_', $story_box_row['section_name']) . "'
            >
            " . $story_box_row['section_name'] . "
            </button>
        </h2>
        <div id='" . str_replace(' ', '_', $story_box_row['section_name']) . "' class='accordion-collapse collapse' aria-labelledby='" . str_replace(' ', '_', $story_box_row['section_name']) . "' data-mdb-parent='#" . str_replace(' ', '_', $story_box_row['section_name']) . "'>
            <div class='accordion-body'>
                <textarea name='" . $story_box_row['story_box_userdata_name'] . "' class='form-control' rows='5' id='comment'
                    placeholder='" . $story_box_row['placeholder_text'] . "'></textarea>
                <br>
            </div>
        </div>
    </div>
    </div>";


}

// Takes care of the video_section --------------------------------------------------->

function video_section($video_row)
{
    echo '<section class="videobg d-flex justify-content-center">
    <video width="80%" height="auto" poster="/videos/URposter.png" controls>
        <source src="'
        . $video_row['video_src'] . '" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</section>';


}

function image_section($image_row)
{
    echo '<div class="row p-3">
    <div class="col-sm-8">
      <h6>' . $image_row['image_text'] . '</h6>
    </div>
    <div class="col-sm-4">
      <div><img src="' . $image_row['image_src'] . '" class="img-rounded image-reponsive" alt="' . $image_row['section_name'] . '" width="100%" height="auto">
      </div>
    </div>
  </div>';


}

// Handles displaying a bullet section

function bullet_section($bullet_row, $mysqli)
{

    $section_name = $bullet_row['section_name'];
    $bullet_id = $bullet_row['bullet_id'];


    $sql = 'SELECT * FROM `bullet_point` WHERE bullet_id = ?';

    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        // Bind the parameter
        $stmt->bind_param("i", $bullet_id); // Assuming $bullet_id is the value you want to match

        // Execute the prepared statement
        $stmt->execute();

        // Get the result set
        $result = $stmt->get_result();

        if ($result) {
            // Start the bullet point list
            echo $section_name;
            echo '<ul>';
            // Fetch data from the result set
            while ($row = $result->fetch_assoc()) {
                // Access data in $row
                $bullet_content = $row['bullet_content'];

                echo '<li>' . $bullet_content . '</li>';

            }
            // End the bullet point list
            echo '</ul>';
            // Close the statement
        } else {
            echo "Error getting result set: " . $mysqli->error;
            // Handle the error
        }
    } else {
        echo "Prepare failed: " . $mysqli->error;
        // Handle the error
    }



}

// Handles displaying a text section

function text_section($text_row)
{

    echo '<section class="d-flex justify-content-center">

        ' . $text_row['text_content'] . '

</section>';


}


?>



<?php
require_once 'admin_footer.php';
?>