var lastCommentId = null;
var recentCommentId = null;
var sending = false;
var firstTimeLoadingComments = true;
var commentsLoaded = 0;

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
            loadRecentComments();
        }
    })

    $('#commentTextarea').on('keypress', function(e) {
        if(e.key == 'Enter') {
            e.preventDefault();
            sendComment();
        }
    })

    $('#modalCommentError').modal({
        onCloseEnd: function() {
            $('#commentTextarea').trigger('focus');
        }
    });

})

function loadRecentComments(highlightLastComment = false) {
    $.ajax({
        url: "/post/getPostComments",
        data: {
            postId: post.id,
            recentCommentId: recentCommentId
        },
        method: 'POST'
    }).done(function(comments) {
        showComments(comments, true, highlightLastComment);
    })
}

function loadComments() {
    $.ajax({
        url: "/post/getPostComments",
        data: {
            postId: post.id,
            lastCommentId: lastCommentId
        },
        method: 'POST'
    }).done(function(comments) {
        if(comments) {
            showComments(comments);
        } else {
            $(document).find('#comment-load').remove();
            countComments();
        }
    })

    $(document).on('click', '#sendComment', function() {
        if(sending == false) {
            sending = true;
            sendComment();
        }
    })
}

function showComments(comments, recent = false, highlightLastComment = false) {
    if(comments!=false) {
        var lastComment = $('.post-seeComments').children().last();
        comments.forEach(comment => {
            var html= '<div class="post-seeComment">';
            html+= '<span><a class="comment-username" href="/'+comment['user'].username+'">'+comment['user'].username+'</a></span>';
            html+= '<span> '+comment.text+'</span>';
            html+= '</div>';
            commentsLoaded++;
            if(recent==false) {
                $('.comment-load').after(html)
            } else {
                lastComment.after(html)
            }
        });
        if(recentCommentId==null || recent==false) {
            lastCommentId = comments[comments.length-1].id;
        }
        if(recentCommentId==null || recentCommentId<comments[0].id) {
            recentCommentId = comments[0].id;
        }
        console.log('last: '+lastCommentId+' - recent: '+recentCommentId);
    }
    if(highlightLastComment) {
        $('.post-seeComments').children().last().addClass('highlight');
    }
    countComments();
}

function sendComment() {
    $.ajax({
        url: "/post/sendComment",
        data: {
            postId: post.id,
            text: $('#commentTextarea').val()
        },
        method: 'POST'
    }).done(function(result) {
        loadRecentComments(true);
        
        sending = false;
        if(result!=false) {
            M.Modal.getInstance($('#modalCommentError')).open();
            $(document).find('#modalCommentError').find('.modal-content').text(result);
        } else {
            $('#commentTextarea').val('');
            $('#commentTextarea').trigger('blur');
            $('#commentTextarea').parent().find('label').removeClass('active');
            $('#page').animate({ scrollTop: $('#page').prop('scrollHeight')}, 500);
        }
    })
}

function countComments() {
    $.ajax({
        url: "/post/getCountComments",
        data: {
            postId: post.id
        },
        method: 'POST'
    }).done(function(count){
        if(count==1) {
            $(document).find('.post-comments').find('a').text('1 '+language.posts.comment);
        } else {
            $(document).find('.post-comments').find('a').text(''+count+' '+language.posts.comments);
        }
        
        console.log(commentsLoaded+' of '+count+' comments loaded');
        if(commentsLoaded == count) {   
            $(document).find('#comment-load').remove();
        } else {
            if((count - commentsLoaded) == 1) {
                $(document).find('#comment-load').text(language.interface.seeMore+' '+(count - commentsLoaded)+' '+language.posts.comment);
            } else {
                $(document).find('#comment-load').text(language.interface.seeMore+' '+(count - commentsLoaded)+' '+language.posts.comments);
            }
        }
    })
}