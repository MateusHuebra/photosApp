$(function() {
    $.ajax({
        url: "/photosApp/profile/getPostsById",
        data: {
            username: username
        },
        method: 'POST'
    }).done(function(posts) {
        console.log(posts);
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
            html+='<span class="post-likescounter">'+post.likes+'</span>';
            html+='<span class="post-comments">12 comments</span>';
            html+='<span class="post-createdAt">'+post.createdAt+'</span> </div>';
            html+= '</div> </div> </div>';
            $('#timeline').append(
                html
            )
        });
    })

    var likescounter;
    $(document).on('click', '.post-like', function() {
        var url = "/photosApp/home/like";
        if($(this).hasClass('material-icons')) {
            url = "/photosApp/home/dislike";
            $(this).addClass('material-icons-outlined');
            $(this).removeClass('material-icons');
        } else {
            $(this).addClass('material-icons');
            $(this).removeClass('material-icons-outlined');
        }
        likescounter = $(this).parent().find('.post-likescounter');
        $.ajax({
            url: url,
            data: {
                postId: $(this).parent().data('postid'),
                userId: userId
            },
            method: 'POST'
        }).done(function(count) {
            likescounter.html(count);
        })
    })

    $('.profile-picture').on('click', function() {
        $('.profile-editpicture').removeClass('hidden');
    })
})