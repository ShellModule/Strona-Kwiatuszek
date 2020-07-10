function toggleClass(elem) {
    $(elem).toggleClass('is-active');
    $('.navbar-collapse').slideToggle('fast');
    if ($('body').hasClass('lockScroll')) {
        $('body').removeClass('lockScroll');
    } else {
        $('body').addClass('lockScroll');
    }
};
$('.nav-link').on('click', function () {
    $('.hamburger').toggleClass('is-active');
});