console.log(5+7);

// Wait for the page to load
window.onload = function() {
    // Get the button
    var button = document.querySelector('.back-to-top');

    // Function to show/hide the button
    function toggleButton() {
        if (window.scrollY > 120) {
            button.style.display = 'block';
        } else {
            button.style.display = 'none';
        }
    }

    // Run the function when scrolling
    window.addEventListener('scroll', toggleButton);

    // Run the function once when the page loads
    toggleButton();
};