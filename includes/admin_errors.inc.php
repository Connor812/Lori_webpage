<?php

session_start();

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
    } elseif ($error == 'update_failed') {
        $message = "Error: No Changes Were Made!";
    } elseif ($error == 'error_adding_heading') {
        $message = "Error: Couldn't Add Heading!";
    } elseif ($error == 'deleted_section_failed') {
        $message = "Error: Failed To Delete Section!";
    } elseif ($error == 'error_adding_subheading') {
        $message = "Error: Error Adding Subheading!";
    } elseif ($error == 'error_adding_quote') {
        $message = "Error: Error Adding Quote!";
    } elseif ($error == 'error_adding_byline') {
        $message = "Error: Error Adding Byline!";
    } elseif ($error == 'error_adding_story_box') {
        $message = "Error: Error Adding Story Box!";
    } elseif ($error == 'could_not_generate_user_input') {
        $message = "Error: Failed To Generate User Input!";
    } elseif ($error == 'error_adding_video') {
        $message = "Error: Error Adding Video!";
    } elseif ($error == 'file_to_large') {
        $message = "Error: File Is Over 40MB!";
    } elseif ($error == 'no_video_file') {
        $message = "Error: Please Upload A Video File!";
    } elseif ($error == 'error_adding_check_box') {
        $message = "Error: Failed To Create Check Box!";
    } elseif ($error == 'error_adding_image') {
        $message = "Error: Failed To Create Image!";
    } elseif ($error == 'invalid_pagenum') {
        $message = "Error: Received No Page Number. Please Try Again!";
    } elseif ($error == 'error_adding_bullets') {
        $message = "Error: Failed To Create Bullets!";
    } elseif ($error == 'error_adding_text') {
        $message = "Error: Failed To Create Text Box!";
    } elseif ($error == 'pwd_doesnt_match') {
        $message = "Error: Password Doesn't Match!";
    } elseif ($error == 'username_doesnt_exist') {
        $message = "Error: Username Doesn't Exist! Please Try Again.";
    } elseif ($error == 'failed_update_username') {
        $message = "Error: Failed To Update Username! Please Try Again.";
    } elseif ($error == 'passwords_not_match') {
        $message = "Error: Passwords Don't Match! Please Try Again.";
    } elseif ($error == 'failed_adding_comment') {
        $message = "Error: Failed To Add Comment! Please Try Again.";
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
    } elseif ($Success == 'successfully_added_section') {
        $message = "Success: You Have Successfully Added A Section!";
    } elseif ($Success == 'updated_page_name') {
        $message = "Success: You Have Successfully Updated The Page Name!";
    } elseif ($Success == 'created_page_name') {
        $message = "Success: You Have Successfully Created The Page Name!";
    } elseif ($Success == 'added_heading') {
        $message = "Success: You Have Successfully Created A New Heading!";
    } elseif ($Success == 'added_subheading') {
        $message = "Success: You Have Successfully Created A New Subheading!";
    } elseif ($Success == 'added_quote') {
        $message = "Success: You Have Successfully Created A New Quote!";
    } elseif ($Success == 'added_byline') {
        $message = "Success: You Have Successfully Created A New Byline!";
    } elseif ($Success == 'added_story_box') {
        $message = "Success: You Have Successfully Created A New Story Box!";
    } elseif ($Success == 'added_video') {
        $message = "Success: You Have Successfully Created A New Video!";
    } elseif ($Success == 'added_click_list') {
        $message = "Success: You Have Successfully Created A New Click List!";
    } elseif ($Success == 'added_image') {
        $message = "Success: You Have Successfully Created A New Image!";
    } elseif ($Success == 'added_bullets') {
        $message = "Success: You Have Successfully Created A Bullet!";
    } elseif ($Success == 'added_text') {
        $message = "Success: You Have Successfully Created A Text Box!";
    } elseif ($Success == 'logged_in') {
        $message = "Logged In! Welcome!";
    } elseif ($Success == 'updated_username') {
        $message = "Successfully Updated Username!";
    } elseif ($Success == 'updated_password') {
        $message = "Successfully Updated Password!";
    } 
    ?>
    <div class="floating-success" id="floating-success">
        <button id="floating-success-btn" class="floating-success-btn" value="floating-success">&#x2716;</button>
        <?php echo $message ?>
    </div>
    <?php
}