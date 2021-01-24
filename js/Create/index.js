$(function() {
    $('#text').on("input", function(){
        var counter = $('#text').val().length;
        counter = 255 - counter;
        //console.log(counter);
        $('#counter').text(counter);
    })
});