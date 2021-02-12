var likescounter;
var commentscounter;
var postId;
var url;
var lastPostId;
var scrollDetected = false;
var moreSelectedPost;

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
        commentscounter = $(this).parent().find('.post-comments').find('a');
        likescounter = $(this).parent().find('.post-likescounter');
        postId = $(this).parent().data('postid');
        like();
        if(typeof loadRecentComments === 'function') {
            loadRecentComments();
        }
    })

    $(document).on('click', '.like-trigger', function () {
        url = "/photosApp/post/likesCount";
        commentscounter = $(this).parent().parent().find('.post-comments').find('a');
        likescounter = $(this).parent().parent().find('.post-likescounter')
        postId = $(this).parent().parent().data('postid');
        like();
        if(typeof loadRecentComments === 'function') {
            loadRecentComments();
        }
    })

    $(window).on('scroll', function() {
        var scrollPosition = $(window).scrollTop();
        //var scrollMax = $('body').prop('scrollHeight') - $(window).height() + 50;
        var scrollMax = $(document).height() - window.visualViewport.height - 10;
        console.log('scrollPosition: '+scrollPosition+' - scrollMax:'+scrollMax);
        //$('.brand-logo').text('scrollPosition: '+scrollPosition+' - scrollMax:'+scrollMax);
        if(scrollPosition >= scrollMax && !scrollDetected) {
            scrollDetected = true;
            loadPostsAjax(lastPostId);
        }
    })

    $(document).on('click', '.dropdownWithoutSelection-trigger', function() {
        moreSelectedPost = $(this).parent().parent().find('.post-interactions').data('postid');
    })

    $(document).on('click', '#more-copy', function() {
        var query = ".post-interactions[data-postid='"+moreSelectedPost+"']";
        var link = $(document).find(query).find('.post-comments').find('a').attr('href');
        console.log(link);
        $('#selection').val(link);
        $('#selection').trigger('select');
        document.execCommand('copy');
        $('#selection').trigger('blur');
        M.Toast.dismissAll();
        M.toast({html: "copied to the clipboard", classes: "rounded"});
    })

    $('#modalDeletePostConfirm').on('click', function() {
        var postToBeDeleted = moreSelectedPost;
        console.log('trying to delete post id'+postToBeDeleted);
        $.ajax({
            url: '/photosApp/post/delete',
            data: {
                postid: postToBeDeleted
            },
            method: 'POST'
        }).done(function(result) {
            if(result=='') {
                M.toast({html: "your post has been deleted", classes: "rounded"});
                $(document).find(`[data-postid='${postToBeDeleted}']`).parent().parent().parent().remove();
            } else {
                M.toast({html: result, classes: "rounded"});
            }
        })
    })

})

function loadPosts(posts) {
        posts.forEach(post => {
            loadPost(post);
        })
        scrollDetected = false;
}

function loadPost(post, showComments = false) {
    var html = '<div class="row"> <div class="col s12 no-padding m4 offset-m4"> <div class="card">';
        html+= '<div class="post-content"> <img src="'+post['user'].photo+'" alt="" class="circle-post">';
        html+= '<span><a class="post-username" href="/photosApp/'+post['user'].username+'">'+post['user'].username+'</a></span>';
        html+= '<i data-target="dropdown-post-';
        if(post['user'].username == user.username) {
            html+='your';
        } else {
            html+='their';
        }
        html+='" class="post-more dropdownWithoutSelection-trigger material-icons">more_vert</i></div>';
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
        postId = post.id;
        changeLikeAndCommentText(post.likes, $(document).find(`[data-postid='${post['id']}']`).find('.modal-trigger'), post.comments, $(document).find(`[data-postid='${post['id']}']`).find('.post-comments').find('a'));
        lastPostId = post.id;
        //console.log("lastPostId: "+lastPostId);
        
        $(document).find('.dropdownWithoutSelection-trigger').dropdown();
}

function like() {
    $.ajax({
        url: url,
        data: {
            postId: postId,
            userId: user.id
        },
        method: 'POST'
    }).done(function (result) {
        likescounter.html(result.like + ' <a href="#modalLikes" class="color-black modal-trigger like-trigger">see likes</a>');
        changeLikeAndCommentText(result.like, likescounter.find('.modal-trigger'), result.comment, commentscounter);
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

function changeLikeAndCommentText(likes, likesObject, comments, commentsObject) {
    console.log("likes for id"+postId+": "+ likes);
    console.log("comments for id"+postId+": "+ comments);

    if (likes == 1) {
        likesObject.text('like');
    } else {
        likesObject.text('likes');
    }

    if (comments == 1) {
        commentsObject.text('1 comment');
    } else {
        commentsObject.text(comments+' comments');
    }
    
}