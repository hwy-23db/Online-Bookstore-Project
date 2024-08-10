document.addEventListener('DOMContentLoaded', (event) => {
    const categoryDropdown = document.getElementById('categoryDropdown');

    categoryDropdown.addEventListener('mouseover', () => {
        categoryDropdown.size = categoryDropdown.options.length;
    });

    categoryDropdown.addEventListener('mouseout', () => {
        categoryDropdown.size = 1;
    });

    categoryDropdown.addEventListener('change', () => {
        categoryDropdown.size = 1;
    });
});
