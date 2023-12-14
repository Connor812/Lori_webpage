<?php

// TODO: add success to permissions
// TODO: empty_input
// TODO: no_section_id
// TODO: no_page_num
// TODO:name_blank
// TODO:needs_input
// TODO: input_exists
// TODO: no_image
// TODO: invalid_image
// TODO: no_video
// TODO: video_too_large
// TODO: invalid_video_format
// TODO: couldnt_move_file

if (isset($_GET['error'])) {
    $message;
    $error = $_GET['error'];
    if ($error == 'empty_input') {
        $message = "Error: Cannot Leave Any Inputs Blank. Please Try Again!";
    } elseif ($error == 'no_section_id') {
        $message = "Error: Couldn't Get Section ID. Please Try Again!";
    } elseif ($error == 'no_page_num') {
        $message = "Error: Couldn't Get Page Number. Please Try Again!";
    } elseif ($error == 'name_blank') {
        $message = "Error: You Cannot Leave The Name Blank. Please Try Again!";
    } elseif ($error == 'needs_input') {
        $message = "Error: Click List Needs At Least 1 Item. Please Try Again!";
    } elseif ($error == 'input_exists') {
        $message = "Error: Name Already Exists In The Data Base. Please Try Again!";
    } elseif ($error == 'no_image') {
        $message = "Error: No Image Was Uploaded. Please Try Again!";
    } elseif ($error == 'invalid_image') {
        $message = "Error: File Type Not Useable. Please Use jpeg, png, or gif!";
    } elseif ($error == 'no_video') {
        $message = "Error: No Video Was Uploaded. Please Try Again!";
    } elseif ($error == 'video_too_large') {
        $message = "Error: Video Is To Large. Please Keep Video Under 100MB!";
    } elseif ($error == 'invalid_video_format') {
        $message = "Error: File Type Not Useable. Please Use mp4, avi, or mov!";
    } elseif ($error == 'couldnt_move_file') {
        $message = "Error: Coudln't Move File. Please Try Again!";
    } elseif ($error == 'missing_section_params') {
        $message = "Error: Missing Parameters To Edit Section. Please Try Again!";
    } elseif ($error == 'updated_same') {
        $message = "Error: No Changes Were Made!";
    }

    ?>
    <div class="floating-error" id="floating-error">
        <button id="floating-error-btn" class="floating-error-btn" value="floating-error">&#x2716;</button>
        <?php echo $message ?>
    </div>

    <?php
}

if (isset($_GET['success'])) {
    $message;
    $Success = $_GET['success'];
    if ($Success == 'updated_success') {
        $message = "Success: You Have Updated Your Section!";
    } elseif ($Success == 'permission_updated') {
        $message = "Success: You Have Successfully Change Permissions!";
    } elseif ($Success == 'deleted_section') {
        $message = "Success: You Have Successfully Deleted A Section!";
    }
    ?>
    <div class="floating-success" id="floating-success">
        <button id="floating-success-btn" class="floating-success-btn" value="floating-success">&#x2716;</button>
        <?php echo $message ?>
    </div>
    <?php
}