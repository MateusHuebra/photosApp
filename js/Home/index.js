$(function() {
    
    loadPostsAjax();

    $(window).location.reload();
    
});

function loadPostsAjax(lastPostId = 0) {
    $.ajax({
        url: "/photosApp/post/getPosts",
        data: {
            lastPostId: lastPostId
        },
        method: 'POST'
    }).done(function(posts) {

        console.log("lastPostId: "+lastPostId);
        console.log(posts);
        loadPosts(posts);

    })
}