document.addEventListener('DOMContentLoaded', function () {

    console.log('admin.js');

    const buttons = document.querySelectorAll('.add-section-btn');
    // For each button add an event listener to grab the section_id from the button
    buttons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const sectionId = button.getAttribute('section_id');
            console.log(sectionId);
            // Set the section_id the the button-modal div to grab when the type button is clicked
            const modalSection = document.getElementById('button-modal');
            modalSection.setAttribute('section_id', sectionId);
        });
    });

    // adds an event listener on each button to add a new section so that it can add an action to the form with the corresponding section id
    modalButtons = document.querySelectorAll('.modal_button');
    modalButtons.forEach(modalButton => {
        modalButton.addEventListener('click', (event) => {
            event.preventDefault();
            const sectionId = document.getElementById('button-modal').getAttribute('section_id');
            const selectedElement = document.getElementById('selected_page');
            const page_num = selectedElement.value;
            console.log(page_num + ' <---page_num');
            const formType = modalButton.getAttribute('form_type');
            console.log(formType);

            if (formType == 'heading') {
                const headingForm = document.getElementById('heading_form');
                headingForm.setAttribute('action', `includes/modal_form/heading.inc.php?section_id=${sectionId}&page_num=${page_num}`);
            }
            else if (formType == 'subheading') {
                const subheadingForm = document.getElementById('subheading_form');
                subheadingForm.setAttribute('action', `includes/modal_form/subheading.inc.php?section_id=${sectionId}&page_num=${page_num}`);
            }
            else if (formType == 'quote') {
                const quoteForm = document.getElementById('quote_form');
                quoteForm.setAttribute('action', `includes/modal_form/quote.inc.php?section_id=${sectionId}&page_num=${page_num}`);
            }
            else if (formType == 'byline') {
                const bylineForm = document.getElementById('byline_form');
                bylineForm.setAttribute('action', `includes/modal_form/byline.inc.php?section_id=${sectionId}&page_num=${page_num}`);
            }
            else if (formType == 'story_box') {
                const story_boxForm = document.getElementById('story_box_form');
                story_boxForm.setAttribute('action', `includes/modal_form/story_box.inc.php?section_id=${sectionId}&page_num=${page_num}`);
            }
            else if (formType == 'video') {
                const videoForm = document.getElementById('video_form');
                videoForm.setAttribute('action', `includes/modal_form/video.inc.php?section_id=${sectionId}&page_num=${page_num}`);
            }
            else if (formType == 'check_box') {
                const check_boxForm = document.getElementById('check_box_form');
                check_boxForm.setAttribute('action', `includes/modal_form/check_box.inc.php?section_id=${sectionId}&page_num=${page_num}`);
            }
            else if (formType == 'check_list') {
                const check_listForm = document.getElementById('check_list_form');
                check_listForm.setAttribute('action', `includes/modal_form/check_list.inc.php?section_id=${sectionId}&page_num=${page_num}`);
            }
            else if (formType == 'image') {
                const imageForm = document.getElementById('image_form');
                imageForm.setAttribute('action', `includes/modal_form/image.inc.php?section_id=${sectionId}&page_num=${page_num}`);
            }
            else if (formType == 'bullets') {
                const bulletsForm = document.getElementById('bullet_form');
                bulletsForm.setAttribute('action', `includes/modal_form/bullets.inc.php?section_id=${sectionId}&page_num=${page_num}`);
            }
            else if (formType == 'text') {
                const textForm = document.getElementById('text_form');
                textForm.setAttribute('action', `includes/modal_form/text.inc.php?section_id=${sectionId}&page_num=${page_num}`);
            }
            else if (formType == 'comment') {
                const textForm = document.getElementById('comment_form');
                textForm.setAttribute('action', `includes/modal_form/comment.inc.php?section_id=${sectionId}&page_num=${page_num}`);
            }

        });
    });

    // This gets all the delete buttons and add an event listener to all of them
    const delete_btns = document.querySelectorAll('.delete-section-btn');
    delete_btns.forEach(delete_btn => {
        delete_btn.addEventListener('click', function (event) {
            event.preventDefault();
            const section_id = delete_btn.getAttribute('section_id');
            const selectedElement = document.getElementById('selected_page');
            const page_num = selectedElement.value;
            const delete_section_form = document.getElementById('delete_section_form');
            // This sets the action of the delete button to the delete modal so the delete_section.php file can handle it
            delete_section_form.setAttribute('action', `includes/delete_section.inc.php?section_id=${section_id}&page_num=${page_num}`);
        });
    });



    const click_list_input_container = document.getElementById('click_list_input_container');
    // Add a click event listener to each item
    const dropdownItems = document.querySelectorAll('.check_box_input');
    // This will will add a section in the click list container depending on if the user selected the checkbox or text area
    dropdownItems.forEach(function (item) {
        item.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the default link behavior

            const dataItem = this.getAttribute('data-item');
            console.log('Selected data-item: ' + dataItem);
            const numOfItems = click_list_input_container.children.length;


            if (dataItem == 'checkbox') {
                const newItem = `
                <div id="item_${numOfItems}">
                    <input type="hidden" name="item_type[]" value="checkbox"> <!-- Hidden field for the type -->
                    <input type="hidden" name="placeholder_text[]" value=""> <!-- Hidden field for the type -->
                    <label class="d-flex justify-content-start">Check Box Title</label>
                    <input name="item_title[]" placeholder="Check Box Title/Question" type="text" class="form-control" />
                    <label class="d-flex justify-content-start">Short for of Title/Question</label>
                    <input name="item_userdata_name[]" placeholder="Short form of the title/question to short the user input" type="text" class="form-control" />
                    <button class="btn btn-danger delete_item_btn" value="item_${numOfItems}"><i class="fas fa-trash-alt"></i></button>
                </div>`;
                click_list_input_container.insertAdjacentHTML('beforeend', newItem);
                // This calls the query selector all to get the new delete buttons
                getAllDeleteItemBtns();
            }
            else if (dataItem == 'textarea') {
                const newItem = `
                <div id="item_${numOfItems}">
                    <input type="hidden" name="item_type[]" value="textarea"> <!-- Hidden field for the type -->
                    <label class="d-flex justify-content-start">Textarea Title</label>
                    <input name="item_title[]" placeholder="Textarea Title/Question" type="text" class="form-control" />
                    <label class="d-flex justify-content-start">Short for of Title/Question</label>
                    <input name="item_userdata_name[]" placeholder="Short form of the title/question to short the user input" type="text" class="form-control" />
                    <label class="d-flex justify-content-start">Placeholder text</label>
                    <input name="placeholder_text[]" placeholder="Examples/Explanation of question" type="text" class="form-control" />
                    <button class="btn btn-danger delete_item_btn" value="item_${numOfItems}"><i class="fas fa-trash-alt"></i></button>
                </div>`;
                click_list_input_container.insertAdjacentHTML('beforeend', newItem);
                // This calls the query selector all to get the new delete buttons
                getAllDeleteItemBtns();
            }

        });
    });

    // This will add a bullet to the bullet modal so the user can add as many bullets as she wants
    const add_bullet_btn = document.getElementById('add_bullet_btn');
    const bullet_input_container = document.getElementById('bullet_input_container');

    add_bullet_btn.addEventListener('click', (event) => {
        event.preventDefault();
        const numOfItems = bullet_input_container.children.length;
        const newBullet = `
        <div id=bullet_${numOfItems}>
            <label class="form-label">Bullet Content</label>
            <input name="bullet_content[]" type="text" class="form-control"
            placeholder="Please enter bullet content" />
            <button class="btn btn-danger delete_item_btn" value="bullet_${numOfItems}"><i class="fas fa-trash-alt"></i></button>
        </div>
        `;
        bullet_input_container.insertAdjacentHTML('beforeend', newBullet);
        getAllDeleteItemBtns();
    });

    // Function that will get all the delete item buttons, add an event listener to delete the item section if not needed
    function getAllDeleteItemBtns() {
        const deleteItemButtons = document.querySelectorAll('.delete_item_btn');
        console.log(deleteItemButtons);
        deleteItemButtons.forEach(function (deleteItemButton) {
            deleteItemButton.addEventListener('click', (event) => {
                event.preventDefault();
                const itemToDeleteId = deleteItemButton.getAttribute('value');
                console.log(itemToDeleteId);
                document.getElementById(itemToDeleteId).remove();
            });
        });
    }


    // This will add an event listener to all the add and delete buttons to add a hover event listener so that when hovered, it will show the section she will add, delete or edit

    const deleteBtns = document.querySelectorAll('.delete-section-btn');

    deleteBtns.forEach(deleteBtn => {
        deleteBtn.addEventListener('mouseenter', (event) => {
            event.preventDefault();
            const section_id = deleteBtn.getAttribute('section_id');
            const section = document.getElementById(section_id);
            section.classList.add('delete-section');
        });
    });
    deleteBtns.forEach(deleteBtn => {
        deleteBtn.addEventListener('mouseout', (event) => {
            event.preventDefault();
            const section_id = deleteBtn.getAttribute('section_id');
            const section = document.getElementById(section_id);
            section.classList.remove('delete-section');
        });
    });

    const addSectionBtns = document.querySelectorAll('.add-section-btn');

    addSectionBtns.forEach(addBtn => {
        addBtn.addEventListener('mouseover', (event) => {
            event.preventDefault();
            const section_id = addBtn.getAttribute('section_id');
            const section = document.getElementById(`add${section_id}`);
            section.classList.remove('hide');
        });

        addBtn.addEventListener('mouseout', (event) => {
            event.preventDefault();
            const section_id = addBtn.getAttribute('section_id');
            const section = document.getElementById(`add${section_id}`);
            section.classList.add('hide');
        });
    });
});