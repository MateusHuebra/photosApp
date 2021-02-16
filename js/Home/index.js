var firstLoadOfPosts = true;

$(function() {
    
    loadPostsAjax();

    $(window).location.reload();
    
});

function loadPostsAjax(lastPostId = 0) {
    $.ajax({
        url: "/post/getPostsFromFollows",
        data: {
            lastPostId: lastPostId
        },
        method: 'POST'
    }).done(function(posts) {

        console.log("lastPostId: "+lastPostId);
        console.log(posts);
        loadPosts(posts);
        if(firstLoadOfPosts) {
            firstLoadOfPosts=false;
            if(posts == false) {
                M.Modal.getInstance($('#modalNoFollows')).open();
            }
        }

    })
}