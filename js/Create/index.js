$(function() {
    $('#text').on("input", function(){
        var counter = $('#text').val().length;
        counter = 255 - counter;
        //console.log(counter);
        $('#counter').text(counter);
    })

    $('#pictureUpload').on('change', function() {
        if (this.files && this.files[0]) {
            
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#pictureUploadPreview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(this.files[0]);

            M.Modal.getInstance($('#modalProfilePicture')).open();
        } else {
            $('#pictureUploadPreview').attr('src', user.photo);
        }
    })

});
