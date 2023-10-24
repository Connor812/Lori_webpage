<?php

require_once('../connect/db.php');

function header_section() {

    echo "headers works";
    // echo "<div class='header'>Header: " . $row['header_content'] . "</div>";
}

function click_list_section()
{
// echo "click_list work";
//     echo $row['click_list_id'];

//     $sql = "SELECT cl.id AS click_list_id,
//     cl.section_id AS click_list_section_id,
//     cli.id AS click_list_item_id,
//     cli.content AS click_list_item_content
//     FROM click_list AS cl
//     LEFT JOIN click_list_items AS cli ON cl.id = cli.click_list_id
//     WHERE cl.id = ?;";

//     $stmt = $mysqli->prepare($sql);
}