// This is for editing the heading

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

// This is for editing the subheading

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

// This is for editing the quote

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

// This is for editing the byline

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

// This is for editing the text

if (document.querySelector(".text")) {
    const displayText = document.querySelector(".text");
    const textInput = document.getElementById("text_input");

    if (displayText) {
        textInput.addEventListener("input", function (event) {
            event.preventDefault();

            const input = textInput.value;
            console.log(input);
            displayText.innerHTML = input;
        });
    }
}