var likescounter;
var postId;
var url;
var lastPostId;

$(function() {
    $('#posts').html('');

    $(document).on('click', '.post-like', function () {
        if ($(this).hasClass('material-icons')) {
            url = "/photosApp/post/dislike";
            $(this).addClass('material-icons-outlined');
            $(this).removeClass('material-icons');
        } else {
            url = "/photosApp/post/like";
            $(this).addClass('material-icons');
            $(this).removeClass('material-icons-outlined');
        }
        likescounter = $(this).parent().find('.post-likescounter');
        postId = $(this).parent().data('postid');
        like();
    })

    $(document).on('click', '.like-trigger', function () {
        url = "/photosApp/post/likesCount";
        likescounter = $(this).parent().parent().find('.post-likescounter')
        postId = $(this).parent().parent().data('postid');
        like();
    })

    $(window).on('scroll', function() {
        var scrollPosition = $(window).scrollTop();
        var scrollMax = $(document).height() - $(window).height();
        if(scrollPosition == scrollMax) {
            loadPostsAjax(lastPostId);
        }
    })

})

function loadPosts(posts) {
        posts.forEach(post => {
            loadPost(post);
        })
}

function loadPost(post, showComments = false) {
    var html = '<div class="row"> <div class="col s12 no-padding m4 offset-m4"> <div class="card">';
        html+= '<div class="post-content"> <img src="'+post['user'].photo+'" alt="" class="circle-post"> <span><a class="post-username" href="/photosApp/'+post['user'].username+'">'+post['user'].username+'</a></span> </div>';
        html+= '<div class="card-image"> <img src="/photosApp/images/database/'+post['user'].id+'/'+post.picture+'"> </div>';
        if(post.text!='') { html+='<div class="post-content post-text"> '+post.text+' </div>'; }
        html+= '<div data-postid="'+post.id+'" class="post-content post-text post-interactions">';
        if(post.liked) {
            html+='<i id="like" class="post-like material-icons">thumb_up</i> ';
        } else {
            html+='<i id="like" class="post-like material-icons-outlined">thumb_up</i> ';
        }
        html+='<span class="post-likescounter">'+post.likes+' <a href="#modalLikes" class="color-black modal-trigger like-trigger">likes</a></span>';
        if(post.comments==1) {
            html+='<span class="post-comments"><a href="/photosApp/post/?pid='+post.id+'&pic='+post.picture.split('.')[0]+'" class="color-black">1 comments</a></span>';
        } else {
            html+='<span class="post-comments"><a href="/photosApp/post/?pid='+post.id+'&pic='+post.picture.split('.')[0]+'" class="color-black">'+post.comments+' comments</a></span>';
        }
        html+='<span class="post-createdAt">'+post.createdAt+'</span> </div>'; 
        if(showComments) {
            html+= '<div data-postid="'+post['id']+'" class="post-content post-text post-seeComments">';
            html+= '<div class="comment-load"><span id="comment-load">see more comments</span></div>';
        }
        html+= '</div> </div> </div>';
        $('#posts').append(
            html
        );
        changeLikeText(post.likes, $(document).find(`[data-postid='${post['id']}']`).find('.modal-trigger'));
        lastPostId = post.id;
        //console.log("lastPostId: "+lastPostId);
}

function like() {
    $.ajax({
        url: url,
        data: {
            postId: postId,
            userId: user.id
        },
        method: 'POST'
    }).done(function (count) {
        likescounter.html(count + ' <a href="#modalLikes" class="color-black modal-trigger like-trigger">see likes</a>');
        changeLikeText(count, likescounter.find('.modal-trigger'));
        seeLikes();
    })
}

function seeLikes() {
    $.ajax({
        url: '/photosApp/Post/seeLikes',
        data: {
            postId: postId
        },
        method: 'POST'
    }).done(function (likes) {
        //changeLikeText(likes.length, $(document).find(`[data-postid='${postId}']`).find(modal-trigger));
        var likesHtml = '';
        likes.forEach(like => {
            likesHtml += '<li class="collection-item post-username">';
            if (like.photo == null) {
                likesHtml += '<img src="/photosApp/images/profile.png" alt="" class="circle-post">';
            } else {
                likesHtml += '<img src="/photosApp/images/database/' + like.id + '/' + like.photo + '" alt="" class="circle-post">';
            }
            likesHtml += ' <a class="color-black" href="/photosApp/' + like.username + '">' + like.username + '</li>';
        });
        $('.likeslist').html(' ');
        $('.likeslist').append(
            likesHtml
        );
    })
}

function changeLikeText(likes, object) {
    console.log("likes: "+ likes);
    if (likes == 1) {
        object.text('like');
    } else {
        object.text('likes');
    }
}