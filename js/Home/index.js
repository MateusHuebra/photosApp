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
            var html = '<div class="row"> <div class="col s12 m4 offset-m4"> <div class="card">';
            html+= '<div class="post-content"> <img src="'+post['user'].photo+'" alt="" class="circle-post"> <span><a class="post-username" href="/photosApp/'+post['user'].username+'">'+post['user'].username+'</a></span> </div>';
            html+= '<div class="card-image"> <img src="/photosApp/images/database/'+post['user'].id+'/'+post.picture+'"> </div>';
            if(post.text!='') { html+='<div class="post-content post-text"> '+post.text+' </div>'; }
            html+= '<div class="post-content post-text post-interactions">';
            html+='<i class="post-like material-icons-outlined">thumb_up</i> ';
            html+='<span class="post-likescounter">12</span>';
            html+='<span class="post-comments">12 comments</span>';
            html+='<span class="post-createdAt">'+post.createdAt+'</span> </div>';
            html+= '</div> </div> </div>';
            $('#feed').append(
                html
            )
        });
    })

})