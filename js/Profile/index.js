$(function() {
    $.ajax({
        url: "/photosApp/profile/getPostsById",
        data: {
            username: username
        },
        method: 'POST'
    }).done(function(posts) {
        console.log(posts);
        posts.forEach(post => {
            var html = '<div class="row"> <div class="col s12 m6"> <div class="card">';
            html+= '<div class="post-content"> <img src="'+post['user'].photo+'" alt="" class="circle-post"> <span><a class="post-username" href="/photosApp/'+post['user'].username+'">'+post['user'].username+'</a></span> <span class="post-createdAt">'+post.createdAt+'</span> </div>';
            html+= '<div class="card-image"> <img src="/photosApp/images/database/'+post['user'].id+'/'+post.picture+'"> </div>';
            if(post.text!='') { html+='<div class="post-content post-text"> '+post.text+' </div>'; }
            html+= '</div> </div> </div>';
            $('#timeline').append(
                html
            )
        });
    })
})