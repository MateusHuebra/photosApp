$(function() {
    $.ajax({
        url: "/photosApp/home/getPosts",
        data: {
            offset: 10
        },
        method: 'POST'
    }).done(function(posts) {
        console.log(posts);
        posts.forEach(post => {
            $('#feed').append(
                post.id+'<br>'
            )
        });
    })
})