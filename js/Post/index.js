var lastCommentId = null;
var recentCommentId = null;
var sending = false;

$(function() {

    loadPost(post, true);
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

function loadRecentComments() {
    $.ajax({
        url: "/photosApp/post/getPostComments",
        data: {
            postId: post.id,
            recentCommentId: recentCommentId
        },
        method: 'POST'
    }).done(function(comments) {
        showComments(comments, true);
    })
}

function loadComments() {
    $.ajax({
        url: "/photosApp/post/getPostComments",
        data: {
            postId: post.id,
            lastCommentId: lastCommentId
        },
        method: 'POST'
    }).done(function(comments) {
        showComments(comments);
        $(document).find('#comment-load').text('see more comments');
    })

    $(document).on('click', '#sendComment', function() {
        if(sending == false) {
            sending = true;
            sendComment();
        }
    })
}

function showComments(comments, recent = false) {
    if(comments!=false) {
        comments.forEach(comment => {
            var html= '<div class="post-seeComment">';
            html+= '<span><a class="comment-username" href="/photosApp/'+comment['user'].username+'">'+comment['user'].username+'</a></span>';
            html+= '<span> '+comment.text+'</span>';
            html+= '</div>';
            if(recent==false) {
                $('.comment-load').after(html)
            } else {
                $('.post-seeComments').append(html)
            }
        });
        if(recent==false) {
            lastCommentId = comments[comments.length-1].id;
        }
        if(recentCommentId==null || recentCommentId<comments[0].id) {
            recentCommentId = comments[0].id;
        }
        console.log('last: '+lastCommentId+' - recent: '+recentCommentId);
    }
    countComments();
}

function sendComment() {
    $.ajax({
        url: "/photosApp/post/sendComment",
        data: {
            postId: post.id,
            text: $('#commentTextarea').val()
        },
        method: 'POST'
    }).done(function(result) {
        sending = false;
        if(result!=false) {
            M.Modal.getInstance($('#modalCommentError')).open();
            $(document).find('#modalCommentError').find('.modal-content').text(result);
        } else {
            $('#commentTextarea').val('');
        }
        loadRecentComments();
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