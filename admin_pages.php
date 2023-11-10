<?php
require_once 'admin-header.php';
require_once "connect/db.php";
?>

<div class="container-fluid border border-bottom border-dark p-3" style="background-color: white;">

    <div class="row">
        <div class="col-sm-6">
            <form method='post' action='<?php echo BASE_URL . "/admin_pages.php" ?>'>
                <select id="selected_page" name="selected_page" class="form-select form-select-md mb-3">
                    aria-label="Large select example">
                    <option value="add_page">... Add Page</option>
                    <?php
                    // Check $_POST for selected_page
                    $selected_page = isset($_POST['selected_page']) ? $_POST['selected_page'] : null;

                    if ($selected_page == 'add_page') {
                        $sql = 'SELECT COUNT(DISTINCT page_num) AS num_pages FROM journal_page;';
                        $result = mysqli_query($mysqli, $sql);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $page_nums = $row['num_pages'] + 1;
                            for ($i = 1; $i <= $page_nums; $i++) {
                                $selected = ($page_nums == $i) ? 'selected' : ''; // Check if the option should be selected
                                echo '<option value="' . $i . '" ' . $selected . '>Page ' . $i . '</option>';
                            }
                        } else {
                            echo "Query Error: " . mysqli_error($mysqli);
                        }
                    } else {

                        // If not found in $_POST, check $_GET for page_num
                        if ($selected_page === null && isset($_GET['page_num'])) {
                            $selected_page = $_GET['page_num'];
                        }

                        // You can now use $selected_page as the selected value
                        $sql = 'SELECT COUNT(DISTINCT page_num) AS num_pages FROM journal_page;';
                        $result = mysqli_query($mysqli, $sql);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $page_nums = $row['num_pages'];
                            for ($i = 1; $i <= $page_nums; $i++) {
                                $selected = ($selected_page == $i) ? 'selected' : ''; // Check if the option should be selected
                                echo '<option value="' . $i . '" ' . $selected . '>Page ' . $i . '</option>';
                            }
                        } else {
                            echo "Query Error: " . mysqli_error($mysqli);
                        }
                    }
                    ?>
                </select>
                <input class="btn btn-primary" type="submit" value="Submit">
            </form>
        </div>
    </div>

    <!-- Modals -->
    <!-- Heading Modal -->
    <div class="modal top fade" add-type="header" add-section="add-section" id="heading-modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
        <div class="modal-dialog   modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a Heading</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Modal Content goes here -->
                    <form id="heading_form" method="post">
                        <h5 class="d-flex justify-content-start">Heading Text</h5>
                        <input name="heading_content" placeholder="Heading Text" type="text" class="form-control" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save New Heading</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Subtitle Modal -->
    <div class="modal top fade" add-type="subheading" add-section="add-section" id="subheading-modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
        <div class="modal-dialog   modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a Subheading</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Modal Content goes here -->
                    <form id="subheading_form" method="post">
                        <h5 class="d-flex justify-content-start">Subheading Title</h5>
                        <input name="subheading_content" placeholder="subheading title" type="text"
                            id="modal-value-input" class="form-control" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save New Subheading</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Quote Modal -->
    <div class="modal top fade" add-type="quote" add-section="add-section" id="quote-modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
        <div class="modal-dialog   modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a Quote</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Modal Content goes here -->
                    <form id="quote_form" method="post">
                        <h5 class="d-flex justify-content-start">Quote</h5>
                        <input name="quote_content" placeholder="Quote" type="text" id="modal-value-input"
                            class="form-control" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save New Quote</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Byline Modal -->
    <div class="modal top fade" add-type="byline" add-section="add-section" id="byline-modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
        <div class="modal-dialog   modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a Byline</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Modal Content goes here -->

                    <form id="byline_form" method="post">
                        <h5 class="d-flex justify-content-start">Byline</h5>
                        <input name="byline_content" placeholder="Byline text" type="text" class="form-control" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Story Box Modal -->
    <div class="modal top fade" add-type="story_box" add-section="add-section" id="story-box-modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
        <div class="modal-dialog   modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a Story Box</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Modal Content goes here -->
                    <form id="story_box_form" method="post">
                        <h5 class="d-flex justify-content-center">Story Box</h5>
                        <label class="d-flex justify-content-start">Story Box Title</label>
                        <input name="story_box_name" placeholder="Story Box Title/Question" type="text"
                            class="form-control" />
                        <label class="d-flex justify-content-start">User Data Name</label>
                        <input name="story_box_userdata_name" placeholder="Short form of question/title" type="text"
                            class="form-control" />
                        <label class="d-flex justify-content-start">Placeholder Text</label>
                        <input name="placeholder_text" placeholder="Examples or a description of the story box"
                            type="text" class="form-control" />

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Modal -->
    <div class="modal top fade" add-type="video" add-section="add-section" id="video-modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
        <div class="modal-dialog   modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a Video</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Modal Content goes here -->
                    <form id="video_form" method="post" enctype="multipart/form-data">

                        <label class="form-label" for="customFile">Video Name</label>
                        <input name="section_name" type="text" class="form-control"
                            placeholder="Chose a name for the video" />
                        <label class="form-label" for="customFile">Upload a video</label>
                        <input name="my_video" type="file" class="form-control" id="customFile" />

                        <input type="submit" class="btn btn-primary" name="submit" value="Upload">
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Check Box Modal -->
    <div class="modal top fade" add-type="check_box" add-section="add-section" id="check-box-modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
        <div class="modal-dialog   modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a Check Box</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Closse"></button>
                </div>
                <div class="modal-body">
                    <!-- Modal Content goes here -->
                    <form id="check_box_form" method="post">
                        <label class="d-flex justify-content-start">Name of List</label>
                        <input name="section_name" placeholder="Chose a name for the list" type="text"
                            class="form-control" />
                        <div id="click_list_input_container"></div>

                        <!-- Drop down for the textarea or checkbox items -->
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="add_item_btn"
                                data-mdb-toggle="dropdown" aria-expanded="false">
                                Chose a Type
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="add_item_btn">
                                <li><a class="dropdown-item check_box_input" href="#" data-item="checkbox">Checkbox</a>
                                </li>
                                <li><a class="dropdown-item check_box_input" href="#" data-item="textarea">Textarea</a>
                                </li>
                            </ul>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div class="modal top fade" add-type="image" add-section="add-section" id="image-modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
        <div class="modal-dialog   modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a Image</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Modal Content goes here -->
                    <form id="image_form" method="post" enctype="multipart/form-data">

                        <label class="form-label" for="customFile">Image Name</label>
                        <input name="section_name" type="text" class="form-control"
                            placeholder="Chose a name for the Image" />
                        <label class="form-label" for="customFile">Image Text</label>
                        <textarea name="image_text" type="text" class="form-control"
                            placeholder="The text that will be displayed beside the image"></textarea>
                        <label class="form-label" for="customFile">Upload a Image</label>
                        <input name="my_image" type="file" class="form-control" id="customFile" />

                        <input type="submit" class="btn btn-primary" name="submit" value="Upload">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bullets Modal -->
    <div class="modal top fade" add-type="bullets" add-section="add-section" id="bullets-modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
        <div class="modal-dialog   modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a Bullets</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Modal Content goes here -->

                    <form id="bullet_form">
                        <label class="form-label">Bullet List Name</label>
                        <input name="section_name" type="text" class="form-control"
                            placeholder="Chose a name for the Bullet List" />

                        <div id="bullet_input_container"></div>
                        <button id="add_bullet_btn" class="btn btn-primary" type="button">Add Bullet</button>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Text Modal -->
    <div class="modal top fade" add-type="text" add-section="add-section" id="text-modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
        <div class="modal-dialog   modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a Text</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Modal Content goes here -->

                    <form id="text_form" method="post">

                        <label class="form-label">Text Name</label>
                        <input name="section_name" type="text" class="form-control"
                            placeholder="Chose a name for Text Section" />
                        <label class="form-label">Text Content</label>
                        <textarea name="text_content" type="text" class="form-control"
                            placeholder="Please type your text"></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Button Modal -->
    <div class="modal top fade" id="button-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-mdb-backdrop="true" data-mdb-keyboard="true">
        <div class="modal-dialog   modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a Text</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex flex-wrap justify-content-center gap-3">
                    <!-- Modal Content goes here -->

                    <button type="button" class="btn btn-primary modal_button" form_type="heading"
                        data-mdb-toggle="modal" data-mdb-target="#heading-modal">
                        Heading
                    </button>
                    <button type="button" class="btn btn-primary modal_button" form_type="subheading"
                        data-mdb-toggle="modal" data-mdb-target="#subheading-modal">
                        Subheading
                    </button>
                    <button type="button" class="btn btn-primary modal_button" form_type="quote" data-mdb-toggle="modal"
                        data-mdb-target="#quote-modal">
                        Quote
                    </button>
                    <button type="button" class="btn btn-primary modal_button" form_type="byline"
                        data-mdb-toggle="modal" data-mdb-target="#byline-modal">
                        Byline
                    </button>
                    <button type="button" class="btn btn-primary modal_button" form_type="story_box"
                        data-mdb-toggle="modal" data-mdb-target="#story-box-modal">
                        Story Box
                    </button>
                    <button type="button" class="btn btn-primary modal_button" form_type="video" data-mdb-toggle="modal"
                        data-mdb-target="#video-modal">
                        Video
                    </button>
                    <button type="button" class="btn btn-primary modal_button" form_type="check_box"
                        data-mdb-toggle="modal" data-mdb-target="#check-box-modal">
                        Check Box
                    </button>
                    <button type="button" class="btn btn-primary modal_button" form_type="image" data-mdb-toggle="modal"
                        data-mdb-target="#image-modal">
                        Image
                    </button>
                    <button type="button" class="btn btn-primary modal_button" form_type="bullets"
                        data-mdb-toggle="modal" data-mdb-target="#bullets-modal">
                        Bullets
                    </button>
                    <button type="button" class="btn btn-primary modal_button" form_type="text" data-mdb-toggle="modal"
                        data-mdb-target="#text-modal">
                        Text
                    </button>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'admin2.php';
?>