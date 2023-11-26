<?php

function get_page($page_num, $user_id, $mysqli)
{

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
    cm.id AS comment_id, 
    cm.comment_userdata_name,
    cm.comment_placeholder,
    bt.id AS bullet_id,
    t.id AS text_id,
    t.text_content
FROM journal_page AS jp
LEFT JOIN heading AS h ON jp.id = h.section_id
LEFT JOIN quote AS q ON jp.id = q.section_id
LEFT JOIN byline AS b ON jp.id = b.section_id
LEFT JOIN story_box AS sb ON jp.id = sb.section_id
LEFT JOIN video AS v ON jp.id = v.section_id
LEFT JOIN click_list AS c ON jp.id = c.section_id
LEFT JOIN subheading AS sh ON jp.id = sh.section_id
LEFT JOIN image AS i ON jp.id = i.section_id
LEFT JOIN comment AS cm ON jp.id = cm.section_id
LEFT JOIN bullet AS bt ON jp.id = bt.section_id
LEFT JOIN text AS t ON jp.id = t.section_id
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
                    click_list_section($row, $user_id, $mysqli);
                } elseif ($row['section_type'] == 'quote') {
                    quote_section($row);
                } elseif ($row['section_type'] == 'byline') {
                    byline_section($row);
                } elseif ($row['section_type'] == 'story_box') {
                    story_box_section($row, $user_id, $mysqli);
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
                } elseif ($row['section_type'] == 'comment') {
                    comment_section($row, $user_id, $mysqli);
                }
            }
        } else {
            echo "Query Error: " . mysqli_error($mysqli);
        }
    }
}

function heading_section($heading_row)
{
    $heading_content = $heading_row["heading_content"];
    $order_num = $heading_row["order_num"];

    echo "
    <section class='section_container m-4' id='" . $order_num . "'>
        <h2 style='text-align: center;'>" . $heading_content . "</h2>
        <hr>
    </section>
            ";
}

// Takes care of the click list content--------------------------------------------------->

function click_list_section($click_list_row, $user_id, $mysqli)
{

    $section_name = $click_list_row["section_name"];
    $click_list_id = $click_list_row['click_list_id'];
    $order_num = $click_list_row["order_num"];
    $label = "label_" . $order_num;

    echo "<section class='accordion section_container' id='" . $order_num . "'>
<div class='accordion-item'>
  <h2 class='accordion-header'>
    <button
      class='accordion-button collapsed'
      type='button'
      data-mdb-toggle='collapse'
      data-mdb-target='#" . $label . "'
      aria-expanded='true'
      aria-controls='" . $label . "'
    >
    " . $section_name . "
    </button>
  </h2>
  <div id='" . $label . "' class='accordion-collapse collapse' aria-labelledby='" . $label . "' data-mdb-parent='#" . $label . "'>
    <div class='accordion-body'>
    " . get_click_list_items($click_list_id, $user_id, $mysqli) . "
    </div>
  </div>
</div>
</section>";
}

// Takes care of the items inside of the click list --------------------------------------------------->
function get_click_list_items($click_list_id, $user_id, $mysqli)
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
            $item_userdata_name = $click_list_item['item_userdata_name'];
            $item_title = $click_list_item['item_title'];
            $placeholder_text = $click_list_item['placeholder_text'];
            $item_type = $click_list_item['click_list_item_type'];

            if ($item_type == 'checkbox') {
                $sql = "SELECT $item_userdata_name FROM `user_input` WHERE user_id = ?;";

                $stmt = $mysqli->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("i", $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();

                        if ($row[$item_userdata_name] == 1) {
                            $selected = 'checked';
                        } else {
                            $selected = '';
                        }
                    }
                    $content .= '<div class="form-check">
                        <input name="' . $item_userdata_name . '" class="form-check-input" type="checkbox" value="1" id="defaultCheck1" ' . $selected . '>
                        <label class="form-check-label" for="defaultCheck1">' . $item_title . '</label>
                        <input type="hidden" name="' . $item_userdata_name . '_type" value="checkbox"> <!-- Add a hidden input for checkbox -->
                        </div>
                        <br>';

                }

            } elseif ($item_type == 'textarea') {
                $sql = "SELECT $item_userdata_name FROM `user_input` WHERE user_id = ?;";

                $stmt = $mysqli->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("i", $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $user_data = $row[$item_userdata_name];
                    } else {
                        $user_data = "";
                    }
                }
                $content .= '<label for="comment">' . $item_title . '</label>
                    <textarea name ="' . $item_userdata_name . '" class="form-control" rows="7" id="comment"
                        placeholder="' . $placeholder_text . '">' . $user_data . '</textarea>
                        <input type="hidden" name="' . $item_userdata_name . '_type" value="textarea"> <!-- Add a hidden input for checkbox -->
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
    $quote_content = $quote_row["quote_content"];
    $order_num = $quote_row['order_num'];

    echo '<section class="section_container m-3" id="' . $order_num . '"><h5 class="px-5" style="padding: 0% 0%; text-align: center;"><i>"' . $quote_content . '"</i></h5></section>';
}

// Takes care of the byline_section --------------------------------------------------->
function byline_section($byline_row)
{
    $section_name = $byline_row['section_name'];
    $byline_content = $byline_row['byline_content'];
    $order_num = $byline_row['order_num'];
    echo '<section class="section_container m-3" id="' . $order_num . '"><h5 id="' . $section_name . '" style="padding: 0% 0%; text-align: center;"><b>' . $byline_content . '</b> </h5></section>';
}

// Takes care of the subheading_section --------------------------------------------------->

function subheading_section($subheading_row)
{
    $section_name = $subheading_row['section_name'];
    $subheading_content = $subheading_row['subheading_content'];
    $order_num = $subheading_row['order_num'];

    echo "<section id='" . $order_num . "' class='section_container'><h4 class='d-flex justify-content-center' id='" . $section_name . "' style='padding: 10px;'><b>" . $subheading_content . "</b></h4></section>";
    echo add_button($order_num);
}

// Takes care of the story_box_section --------------------------------------------------->
function story_box_section($story_box_row, $user_id, $mysqli)
{
    $section_name = $story_box_row['section_name'];
    $section_name_no_spaces = str_replace(' ', '_', $story_box_row['section_name']);
    $story_box_userdata_name = $story_box_row['story_box_userdata_name'];
    $placeholder_text = $story_box_row['placeholder_text'];
    $order_num = $story_box_row['order_num'];
    $label = "label_" . $order_num;

    $sql = "SELECT $story_box_userdata_name FROM `user_input` WHERE user_id = ?;";

    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_data = $row[$story_box_userdata_name];
        } else {
            $user_data = "";
        }
    }

    echo '
    <section class="accordion section_container" id="' . $order_num . '">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button
                    class="accordion-button collapsed"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#' . $label . '"
                    aria-expanded="true"
                    aria-controls="' . $label . '"
                >
                ' . $section_name . '
                </button>
            </h2>
            <div id="' . $label . '" class="accordion-collapse collapse" aria-labelledby="' . $label . '" data-mdb-parent="#' . $label . '">
                <div class="accordion-body">
                    <textarea name="' . $story_box_userdata_name . '" class="form-control" rows="5" id="comment"
                        placeholder="' . $placeholder_text . '">' . $user_data . '</textarea>
                    <br>
                </div>
            </div>
        </div>
    </section>';
}

// Takes care of the video_section --------------------------------------------------->
function video_section($video_row)
{
    $video_src = $video_row['video_src'];
    $order_num = $video_row['order_num'];
    echo '
    <section id="' . $order_num . '" class="videobg d-flex justify-content-center section_container">
        <video width="80%" height="auto" poster="/videos/URposter.png" controls>
            <source src="'
        . $video_row['video_src'] . '" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </section>';
}

// Handles displaying the image
function image_section($image_row)
{
    $section_name = $image_row['section_name'];
    $image_src = $image_row['image_src'];
    $order_num = $image_row['order_num'];
    $image_text = $image_row['image_text'];

    echo '
    <section id="' . $order_num . '" class="row p-3 section_container">
        <div class="col-sm-8">
            <h6>' . $image_text . '</h6>
        </div>
        <div class="col-sm-4">
            <div>
                <img src="' . $image_src . '" class="img-rounded image-reponsive" alt="' . $section_name . '" width="100%" height="auto">
            </div>
        </div>
  </section>';
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
    echo '<section class="d-flex justify-content-center m-3">

        ' . $text_row['text_content'] . '

</section>';
}

// This handles the comment section
function comment_section($comment_row, $user_id, $mysqli)
{
    $section_name = $comment_row['section_name'];
    $comment_userdata_name = $comment_row['comment_userdata_name'];
    $comment_placeholder = $comment_row['comment_placeholder'];

    $sql = "SELECT $comment_userdata_name FROM `user_input` WHERE user_id = ?;";

    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_data = $row[$comment_userdata_name];
        } else {
            $user_data = "";
        }
    }

    echo '
    <section class="mb-4">
        <label for="' . $section_name . '">' . $section_name . '</label>
        <textarea id="' . $section_name . '" name="' . $comment_userdata_name . '" class="form-control" rows="4" placeholder="' . $comment_placeholder . '">' . $user_data . '</textarea>
    </section>';
}