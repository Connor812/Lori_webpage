// This is for editing the header

const displayHeading = document.querySelector(".heading");
const headingInput = document.getElementById("heading_input");

if (displayHeading) {
    headingInput.addEventListener("input", function (event) {
        event.preventDefault();

        const input = headingInput.value;
        console.log(input);
        displayHeading.innerHTML = input;
    });
}