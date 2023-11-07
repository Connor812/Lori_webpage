document.addEventListener('DOMContentLoaded', function () {

    console.log('admin.js')

    const buttons = document.querySelectorAll('.add-section-btn');
    // For each button add an event listener to grab the section_id from the button
    buttons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const sectionId = button.getAttribute('section_id');
            console.log(sectionId);
            // Set the section_id the the button-modal div
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
                subheadingForm.setAttribute('action', `includes/modal_form/subheading.inc.php?section_id=${sectionId}&page_num=${page_num}`)
            }
            else if (formType == 'quote') {
                const quoteForm = document.getElementById('quote_form');
                quoteForm.setAttribute('action', `includes/modal_form/quote.inc.php?section_id=${sectionId}&page_num=${page_num}`)
            }
            else if (formType == 'byline') {
                const bylineForm = document.getElementById('byline_form');
                bylineForm.setAttribute('action', `includes/modal_form/byline.inc.php?section_id=${sectionId}&page_num=${page_num}`)
            }
            else if (formType == 'story_box') {
                const story_boxForm = document.getElementById('story_box_form');
                story_boxForm.setAttribute('action', `includes/modal_form/story_box.inc.php?section_id=${sectionId}&page_num=${page_num}`)
            }
            else if (formType == 'video') {
                const videoForm = document.getElementById('video_form');
                videoForm.setAttribute('action', `includes/modal_form/video.inc.php?section_id=${sectionId}&page_num=${page_num}`)
            }
            else if (formType == 'check_box') {
                const check_boxForm = document.getElementById('check_box_form');
                check_boxForm.setAttribute('action', `includes/modal_form/check_box.inc.php?section_id=${sectionId}&page_num=${page_num}`)
            }
            else if (formType == 'check_list') {
                const check_listForm = document.getElementById('check_list_form');
                check_listForm.setAttribute('action', `includes/modal_form/check_list.inc.php?section_id=${sectionId}&page_num=${page_num}`)
            }
            else if (formType == 'image') {
                const imageForm = document.getElementById('image_form');
                imageForm.setAttribute('action', `includes/modal_form/image.inc.php?section_id=${sectionId}&page_num=${page_num}`)
            }
            else if (formType == 'bullets') {
                const bulletsForm = document.getElementById('bullets_form');
                bulletsForm.setAttribute('action', `includes/modal_form/bullets.inc.php?section_id=${sectionId}&page_num=${page_num}`)
            }
            else if (formType == 'text') {
                const textForm = document.getElementById('text_form');
                textForm.setAttribute('action', `includes/modal_form/text.inc.php?section_id=${sectionId}&page_num=${page_num}`)
            }

        });
    });

    const form_holder = document.getElementById('form_holder');
    // Add a click event listener to each item
    const dropdownItems = document.querySelectorAll('.check_box_input');

    dropdownItems.forEach(function (item) {
        item.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the default link behavior

            const dataItem = this.getAttribute('data-item');
            console.log('Selected data-item: ' + dataItem);
            const numOfItems = form_holder.children.length;


            if (dataItem == 'checkbox') {
                const newItem = `
                <div id="item_${numOfItems}">
                    <input type="hidden" name="item_type[]" value="checkbox"> <!-- Hidden field for the type -->
                    <label class="d-flex justify-content-start">Check Box Title</label>
                    <input name="item_title[]" placeholder="Check Box Title/Question" type="text" class="form-control" />
                    <label class="d-flex justify-content-start">Short for of Title/Question</label>
                    <input name="item_userdata_name[]" placeholder="Short form of the title/question to short the user input" type="text" class="form-control" />
                    <input type="hidden" name="placeholder_text[]" value=""> <!-- Hidden field for the type -->
                    <button class="btn btn-danger delete_item_btn" value="item_${numOfItems}"><i class="fas fa-trash-alt"></i></button>
                </div>`;
                form_holder.insertAdjacentHTML('beforeend', newItem);
                // This calls the query selector all to get the new delete buttons
                getAllDeleteBtns();
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
                form_holder.insertAdjacentHTML('beforeend', newItem);
                // This calls the query selector all to get the new delete buttons
                getAllDeleteBtns();
            }


        });
    });


    // Function that will get all the delete item buttons, add an event listener to delete the item section if not needed
    function getAllDeleteBtns() {
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



});