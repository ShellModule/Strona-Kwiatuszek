$("#navabout").click(function() {
    $('html, body').animate({
        scrollTop: $("#about_us").offset().top
    }, 1000);
});

$("#navoffer").click(function() {
    $('html, body').animate({
        scrollTop: $("#offer").offset().top
    }, 1000);
});