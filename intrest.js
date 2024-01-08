document.addEventListener('DOMContentLoaded', function () {
    // Select the form and submit button
    const form = document.getElementById('interestForm');
    const submitBtn = document.getElementById('submitBTN');

    // Add event listener for form submission
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the form from submitting

        // Your custom validation or actions here

        // Example: Display a notification
        alert('Thank you for your submission!');

        // Optionally, submit the form to Formspree using AJAX
        // Note: This may require additional configuration on Formspree
        // Example using Fetch API:
        // fetch(form.action, {
        //     method: 'POST',
        //     body: new FormData(form),
        // })
        // .then(response => response.json())
        // .then(data => console.log(data))
        // .catch(error => console.error('Error:', error));
    });
});