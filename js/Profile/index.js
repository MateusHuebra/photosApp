$(function() {
    
    loadPostsAjax();

    var editPicTime = null;

    $('.profile-picture').on('click', function() {
        if(user.username == profileUsername) {
            $('#profile-picture').removeClass('fade-out');
            $('#profile-picture').addClass('fade-in');
            clearTimeout(editPicTime);
            editPicTime = setTimeout(function() {
                $('#profile-picture').removeClass('fade-in');
                $('#profile-picture').addClass('fade-out');
            }, 2000);
        }
    })
    
    $(window).on('load', function() {
        if(user.username == profileUsername) {
            $('.profile-picture').trigger('click');
        } else {
            $('#profile-picture').addClass('hidden');
        }
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

})

function loadPostsAjax(lastPostId = 0) {
    $.ajax({
        url: "/photosApp/post/getPostsById",
        data: {
            username: profileUsername,
            lastPostId: lastPostId
        },
        method: 'POST'
    }).done(function(posts) {

        console.log("lastPostId: "+lastPostId);
        console.log(posts);
        loadPosts(posts);

    })
}