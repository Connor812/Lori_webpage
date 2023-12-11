// This is for editing the header

if (document.querySelector(".heading")) {
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
}

if (document.querySelector(".subheading")) {
    const displaySubheading = document.querySelector(".subheading");
    const subheadingInput = document.getElementById("subheading_input");

    if (displaySubheading) {
        subheadingInput.addEventListener("input", function (event) {
            event.preventDefault();

            const input = subheadingInput.value;
            console.log(input);
            displaySubheading.innerHTML = input;
        });
    }
}