$(function() {
    $('#nav-search-mobile').remove();
    $('#nav-search').remove();
    $('#search').trigger('focus');
    
    $('#clear').on('click', function() {
        $('#search').val('');
        $('#search').trigger('focus');
    })

    $('#search').on('input', function() {
        
        if($(this).val()!='') {

            $.ajax({
                url: '/search/query',
                data: {
                    query: $(this).val()
                },
                method: 'POST'
            }).done(function(response) {
                console.log(response);
                $('#search-result').html('');
                response.forEach(user => {
                    var html = '<li class="collection-item post-username">';
                    if (user.photo == null) {
                        html += '<img src="/images/profile.png" alt="" class="circle-post">';
                    } else {
                        html += '<img src="/images/database/' + user.id + '/' + user.photo + '" alt="" class="circle-post">';
                    }

                    html+= ' <a class="color-black" href="/' + user.username + '">' + user.username + '</li>';
                    $('#search-result').append(html);
                });
            })

        } else {
            $('#search-result').html('');
        }
    })

})