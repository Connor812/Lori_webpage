<?php

require_once "connect/db.php";

// Takes care of the header content--------------------------------------------------->
function heading_section($heading_row)
{
    echo "
    <section style='width: 100%;' id='" . $heading_row['order_num'] . "'>
        <h2 style='text-align: center;'>" . $heading_row['heading_content'] . "</h2>
        <hr>
    </section>
            ";
    echo add_button($heading_row['order_num']);
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

    echo add_button($click_list_row['order_num']);

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
        $stmt->close();
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
    echo add_button($quote_row['order_num']);
}

// Takes care of the byline_section --------------------------------------------------->

function byline_section($byline_row)
{
    echo '<h5 id="' . $byline_row['section_name'] . '" style="padding: 0% 0%; text-align: center;"><b>' . $byline_row['byline_content'] . '</b> </h5>';
    echo add_button($byline_row['order_num']);
}

// Takes care of the subheading_section --------------------------------------------------->

function subheading_section($subheading_row)
{
    echo "<h4 class='d-flex justify-content-center' id='" . $subheading_row['section_name'] . "' style='padding: 10px;'><b>" . $subheading_row['subheading_content'] . "</b></h4>";
    echo add_button($subheading_row['order_num']);
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

    echo add_button($story_box_row['order_num']);
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

    echo add_button($video_row['order_num']);
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

    echo add_button($image_row['order_num']);
}

// Function to add the button after each section to toggle the modal window to add new sections

function add_button($id)
{

    $content = '
    <div class="container">
        <div class="row">
            <div class="col-12 text-center"> <!-- Centers the content horizontally -->
                <button type="button" class="btn btn-primary add-section-btn" data-mdb-toggle="modal"
                data-mdb-target="#button-modal" section_id="' . $id . '">+</button>
            </div>
        </div>
    </div>';
    return $content;
}
?>
<?php
require_once 'admin-header.php';
// call first button
echo add_button(0);
?>

<main class="container-fluid">
    <?php

    $page_num = $_POST['selected_page'] ?? ($_GET['page_num'] ?? 1);

    // If the add_page is selected then we don't want to query in anything because it will be a new page
    if ($page_num == 'add_page') {
        // exit;
    }

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
    i.image_text
FROM journal_page AS jp
LEFT JOIN heading AS h ON jp.id = h.section_id
LEFT JOIN quote AS q ON jp.id = q.section_id
LEFT JOIN byline AS b ON jp.id = b.section_id
LEFT JOIN story_box AS sb ON jp.id = sb.section_id
LEFT JOIN video AS v ON jp.id = v.section_id
LEFT JOIN click_list AS c ON jp.id = c.section_id
LEFT JOIN subheading AS sh ON jp.id = sh.section_id
LEFT JOIN image AS i ON jp.id = i.section_id
WHERE jp.page_num = ?  -- Filter by page_num = 1
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
                }
            }
        } else {
            echo "Query Error: " . mysqli_error($conn);
        }
    }
    ?>


</main>

<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="js/admin.js"></script>
</body>

</html>