<?php
require_once 'connect/db.php';


function header_section() {

    echo "headers works";
    // echo "<div class='header'>Header: " . $row['header_content'] . "</div>";
}

function click_list_section()
 {
    echo "click_list works";
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lori's Admin Page</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/reset.css">
</head>

<body>

    <?php
    // include 'includes/section-types.inc.php';
    
    $sql = "SELECT jp.id AS journal_page_id,
       jp.section_type,
       h.header_content,
       q.quote_content,
       b.section_id AS byline_section_id,
       sb.img AS story_box_img,
       sbp.paragraph AS story_box_paragraph,
       v.video_data,
       cl.id AS click_list_id
FROM journal_page AS jp
LEFT JOIN header AS h ON jp.id = h.section_id
LEFT JOIN quote AS q ON jp.id = q.section_id
LEFT JOIN byline AS b ON jp.id = b.section_id
LEFT JOIN story_box AS sb ON jp.id = sb.section_id
LEFT JOIN story_box_paragraphs AS sbp ON sb.id = sbp.story_box_id
LEFT JOIN video AS v ON jp.id = v.section_id
LEFT JOIN click_list AS cl ON jp.order_num = cl.section_id
ORDER BY jp.order_num;";

    $result = mysqli_query($conn, $sql);

    

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            
            if ($row['section_type'] == 'header') {
                // echo "header works <br>";
                header_section();
            } elseif ($row['section_type'] == 'click_list') {
                echo "click list works <br>";
            }
        }
    } else {
        echo "Query Error: " . mysqli_error($conn);
    }
    ?>
</body>

</html>