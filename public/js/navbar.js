// navbar.js

$(document).ready(function () {
    var path = window.location.pathname;
    var navLinks = $(".navbar-nav .nav-link");

    navLinks.each(function () {
        var href = $(this).attr("href");

        if (path === href) {
            $(this).addClass("active");
        }

        // Check if the link has dropdown items
        var dropdown = $(this).next(".dropdown-menu");

        if (dropdown.length > 0) {
            var dropdownItems = dropdown.find('.dropdown-item');
            dropdownItems.each(function () {
                if (path === $(this).attr("href")) {
                    $(this).closest(".nav-item.dropdown").find(".nav-link").addClass("active");
                }
            });
        }
    });
});
