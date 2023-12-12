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

if (document.querySelector(".quote")) {
    const displayQuote = document.querySelector(".quote");
    const quoteInput = document.getElementById("quote_input");

    if (displayQuote) {
        quoteInput.addEventListener("input", function (event) {
            event.preventDefault();

            const input = quoteInput.value;
            console.log(input); 
            displayQuote.innerHTML = input;
        });
    }
}

if (document.querySelector(".byline")) {
    const displayByline = document.querySelector(".byline");
    const bylineInput = document.getElementById("byline_input");

    if (displayByline) {
        bylineInput.addEventListener("input", function (event) {
            event.preventDefault();

            const input = bylineInput.value;
            console.log(input);
            displayByline.innerHTML = input;
        });
    }
}