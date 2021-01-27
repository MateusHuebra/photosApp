$(function() {
    
    var likescounter;
    var postId;
    var url;

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

    $(document).on('click', '.modal-trigger', function () {
        url = "/photosApp/post/likesCount";
        likescounter = $(this).parent().parent().find('.post-likescounter')
        postId = $(this).parent().parent().data('postid');
        like();
    })

    function like() {
        $.ajax({
            url: url,
            data: {
                postId: postId,
                userId: userId
            },
            method: 'POST'
        }).done(function (count) {
            likescounter.html(count + ' <a href="#modalLikes" class="color-black modal-trigger">see likes</a>');
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
        console.log(likes);
        if (likes == 1) {
            object.text('like');
        } else {
            object.text('likes');
        }
    }

})