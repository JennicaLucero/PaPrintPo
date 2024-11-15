document.addEventListener('DOMContentLoaded', function () {
    // Get all dropdowns
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        const toggleButton = dropdown.querySelector('.toggle-btn');
        const dropdownItems = dropdown.querySelector('.dropdown-items');

        // Add click event to toggle dropdown visibility
        toggleButton.addEventListener('click', function(event) {
            event.stopPropagation(); // Prevents the event from bubbling up

            // Close all other dropdowns first
            dropdowns.forEach(otherDropdown => {
                const otherDropdownItems = otherDropdown.querySelector('.dropdown-items');
                if (otherDropdown !== dropdown) {
                    otherDropdownItems.classList.remove('active');
                }
            });

            // Toggle the current dropdown
            dropdownItems.classList.toggle('active');
        });
    });

    // Close any open dropdown when the user clicks outside of them
    document.addEventListener('click', function(event) {
        dropdowns.forEach(dropdown => {
            const dropdownItems = dropdown.querySelector('.dropdown-items');
            if (!dropdown.contains(event.target)) {
                dropdownItems.classList.remove('active');
            }
        });
    });
});
