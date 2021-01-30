$(function() {
    $(window).on('load', function() {
        $('.preloader-wrapper').remove();
        $('#page').removeClass('hidden');
        $(document).find('#page').removeClass('hidden');
    });
    setTimeout(function() {
        $('.preloader-wrapper').remove();
        $('#page').removeClass('hidden');
    }, 3000);
})