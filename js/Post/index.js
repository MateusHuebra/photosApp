var lastCommentId = null;

$(function() {
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
        html+='<span class="post-comments"><a href="#" class="color-black"> comments</a></span>';
        html+='<span class="post-createdAt">'+post.createdAt+'</span> </div>';
        html+= '<div data-postid="'+post['id']+'" class="post-content post-text post-seeComments">';
        html+= '<div class="comment-load"><span id="comment-load">see more comments</span></div>';
        html+= '</div> </div> </div>';
        $('#post').html('');
        $('#post').append(
            html
        );
        changeLikeText(post.likes, $(document).find(`[data-postid='${post['id']}']`).find('.modal-trigger'));

    function changeLikeText(likes, object) {
        console.log(likes);
        if (likes == 1) {
            object.text('like');
        } else {
            object.text('likes');
        }
    }

    loadComments();

    $(document).on('click', '#comment-load', function() {
        var loadText = $(document).find('#comment-load');
        if(loadText.text()=='loading more comments...') {
            console.log('already loading more comments');
        } else {
            loadText.text('loading more comments...');
            loadComments();
        }
    })

})

function loadComments() {
    $.ajax({
        url: "/photosApp/post/getPostComments",
        data: {
            postId: post.id,
            lastCommentId: lastCommentId
        },
        method: 'POST'
    }).done(function(comments) {
        if(comments!=false) {
            comments.forEach(comment => {
                var html= '<div class="post-seeComment">';
                html+= '<span><a class="comment-username" href="/photosApp/'+comment['user'].username+'">'+comment['user'].username+'</a></span>';
                html+= '<span> '+comment.text+'</span>';
                html+= '</div>';
                $('.comment-load').after(html)
            });
            lastCommentId = comments[comments.length-1].id;
        }
        countComments();
        $(document).find('#comment-load').text('see more comments');
    })
}

function countComments() {
    $.ajax({
        url: "/photosApp/post/getCountComments",
        data: {
            postId: post.id
        },
        method: 'POST'
    }).done(function(count){
        if(count==1) {
            $(document).find('.post-comments').html('<a href="#" class="color-black">1 comment</a>');
        } else {
            $(document).find('.post-comments').html('<a href="#" class="color-black">'+count+' comments</a>');
        }
    })
}