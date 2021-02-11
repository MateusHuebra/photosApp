$(function() {
    $.ajax({
        url: "/photosApp/post/getPosts",
        data: {
            offset: 10
        },
        method: 'POST'
    }).done(function(posts) {

        console.log(posts);
        $('#posts').html('');
        loadPosts(posts);

    })

    $(window).location.reload();
    
});