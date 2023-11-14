document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('journal-form');
  const submitBtn = document.getElementById('journal-submit-btn');
  let formChanged = false;
  console.log(submitBtn);

  // Add an event listener for form input changes
  form.addEventListener('change', function () {
    console.log('form has changed');
    formChanged = true;
    // Show the submit button
    submitBtn.classList.remove('hide');
  });

  // Add an event listener for form submission
  form.addEventListener('submit', function () {
    formChanged = false;
    // Hide the submit button after form submission
    submitBtn.style.display = 'none';
  });

  // Add an event listener for beforeunload
  window.addEventListener('beforeunload', function (e) {
    if (formChanged) {

      // You can prevent the page from unloading immediately by returning a confirmation message.
      e.returnValue = 'You have unsaved changes. Do you want to leave this page?';
    }

  });
});