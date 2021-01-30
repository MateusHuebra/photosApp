var createButtonFadeoutTimer = null;
var scrollTimer = null;

$(function() {

    //createButtonFadeoutTimer = setTimeout(function() {    fadeOut(); }, 3000);

    $(window).on('scroll', function() {
        fadeOut();
        //resetScrollTimer()
    });

})

function fadeIn() {
    $('.fixed-action-btn').removeClass('fade-out');
    $('.fixed-action-btn').addClass('fade-in');
    //clearTimeout(createButtonFadeoutTimer);
    //createButtonFadeoutTimer = setTimeout(function() {    fadeOut(); }, 3000)
}

function fadeOut() {
    $('.fixed-action-btn').removeClass('fade-in');
    $('.fixed-action-btn').addClass('fade-out');
    resetScrollTimer();
}

function resetScrollTimer() {
    clearTimeout(scrollTimer);
    scrollTimer = setTimeout(function() {
        fadeIn();
    }, 1000)
}