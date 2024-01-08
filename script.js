document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.getElementById('hamburger');
    const closeMenu = document.getElementById('close-menu');
    const mobileMenuContainer = document.querySelector('.mobile-menu-container');
    const mobileMenu = document.querySelector('.mobile-menu');

    hamburger.addEventListener('click', function () {
        mobileMenu.style.display = 'flex';
        closeMenu.style.display='block';
    });

    closeMenu.addEventListener('click', function () {
        mobileMenu.style.display = 'none';
        closeMenu.style.display='none';
    });
});