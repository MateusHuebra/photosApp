$(function() {
    $.ajax({
        url: "/photosApp/post/getPostsById",
        data: {
            username: profileUsername
        },
        method: 'POST'
    }).done(function(posts) {
        console.log(posts);
        $('#timeline').html('');
        posts.forEach(post => {
            var html = '<div class="row"> <div class="col s12 m4 offset-m4"> <div class="card">';
            html+= '<div class="post-content"> <img src="'+post['user'].photo+'" alt="" class="circle-post"> <span><a class="post-username" href="/photosApp/'+post['user'].username+'">'+post['user'].username+'</a></span> </div>';
            html+= '<div class="card-image"> <img src="/photosApp/images/database/'+post['user'].id+'/'+post.picture+'"> </div>';
            if(post.text!='') { html+='<div class="post-content post-text"> '+post.text+' </div>'; }
            html+= '<div data-postid="'+post['id']+'" class="post-content post-text post-interactions">';
            if(post.liked) {
                html+='<i id="like" class="post-like material-icons">thumb_up</i> ';
            } else {
                html+='<i id="like" class="post-like material-icons-outlined">thumb_up</i> ';
            }
            html+='<span class="post-likescounter">'+post.likes+' <a href="#modalLikes" class="color-black modal-trigger like-trigger">see likes</a></span>';
            html+='<span class="post-comments"><a href="/photosApp/post/?pid='+post.id+'&pic='+post.picture.split('.')[0]+'" class="color-black">12 comments</a></span>';
            html+='<span class="post-createdAt">'+post.createdAt+'</span> </div>';
            html+= '</div> </div> </div>';
            $('#timeline').append(
                html
            )
            changeLikeText(post.likes, $(document).find(`[data-postid='${post['id']}']`).find('.modal-trigger'));
        });
    })

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

    function changeLikeText(likes, object) {
        console.log(likes);
        if (likes == 1) {
            object.text('like');
        } else {
            object.text('likes');
        }
    }

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