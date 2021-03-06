$(function() {
    
    loadPostsAjax();

    var editPicTime = null;

    $('.profile-picture').on('click', function() {
        if(user.username == profileUsername) {
            $('#profile-picture').removeClass('fade-out');
            $('#profile-picture').addClass('fade-in');
            clearTimeout(editPicTime);
            editPicTime = setTimeout(function() {
                $('#profile-picture').removeClass('fade-in');
                $('#profile-picture').addClass('fade-out');
            }, 2000);
        }
    })
    
    $(window).on('load', function() {
        if(user.username == profileUsername) {
            $('.profile-picture').trigger('click');
        } else {
            $('#profile-picture').addClass('hidden');
        }
    })

    $('#pictureUpload').on('change', function() {
        if (this.files && this.files[0]) {
            
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#pictureUploadPreview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(this.files[0]);

            M.Modal.getInstance($('#modalProfilePicture')).open();
        } else {
            $('#pictureUploadPreview').attr('src', user.photo);
        }
    })

    if(profileId == user['id']) {
        $('.profile-follow').remove();
    } else {
        $('#profile-picture').remove();
        $('.profile-edit').remove();
        $.ajax({
            url: 'profile/isFollowing',
            data: {
                followsId: profileId
            },
            method: 'POST'
        }).done(function(response) {
            if(response) {
                $('.profile-follow').find('i').text('person_add_alt_1');
                $('.profile-follow').find('span').find('span').text(language.interface.following);
            } else {
                $('.profile-follow').find('i').text('person_add_alt');
                $('.profile-follow').find('span').find('span').text(language.interface.follow);
            }
        })
    }

    $('.profile-follow').on('click', function() {
        if ($(this).find('i').text() == 'person_add_alt') {
            $(this).find('i').text('person_add_alt_1');
            $(this).find('span').find('span').text(language.interface.following);
            follow('follow');
            var followers = $('#profile-info-followers').text().split(' ')[0];
            followers++;
            followers == 1 ? followers+= ' '+language.interface.follower+'</br>'
                        : followers+= ' '+language.interface.followers+'</br>'
            $('#profile-info-followers').html(followers);
        } else {
            url = "/profile/unfollow";
            $(this).find('i').text('person_add_alt');
            $(this).find('span').find('span').text(language.interface.follow);
            follow('unfollow');
            var followers = $('#profile-info-followers').text().split(' ')[0];
            followers--;
            followers == 1 ? followers+= ' '+language.interface.follower+'</br>'
                        : followers+= ' '+language.interface.followers+'</br>'
            $('#profile-info-followers').html(followers);
        }
    })

    $('#profile-info-followers').on('click', function() {
        loadFollows('followers');
    })
    $('#profile-info-following').on('click', function() {
        loadFollows('following');
    })

})

function loadPostsAjax(lastPostId = 0) {
    $.ajax({
        url: "/post/getPostsById",
        data: {
            username: profileUsername,
            lastPostId: lastPostId
        },
        method: 'POST'
    }).done(function(posts) {

        console.log("lastPostId: "+lastPostId);
        console.log(posts);
        loadPosts(posts);

    })
}

function follow(url) {
    $.ajax({
        url: "profile/"+url,
        data: {
            followsId: profileId
        },
        method: 'POST'
    }).done(function() {

    })
}

function loadFollows(action) {
    $('#'+action+'list').html('<div class="preloader-wrapper active" style="left: 43%;top: 70px; position: fixed;"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>');
    $.ajax({
        url: "profile/seeFollows",
        data: {
            profileId: profileId,
            action: action
        },
        method: 'POST'
    }).done(function(follows) {
        var followsHtml = '';
        follows.forEach(follow => {
            followsHtml += '<li class="collection-item post-username">';
            if (follow.photo == null) {
                followsHtml += '<img src="/images/profile.png" alt="" class="circle-post">';
            } else {
                followsHtml += '<img src="/images/database/' + follow.id + '/' + follow.photo + '" alt="" class="circle-post">';
            }
            followsHtml += ' <a class="color-black" href="/' + follow.username + '">' + follow.username + '</li>';
        });
        $('#'+action+'list').html(' ');
        $('#'+action+'list').append(
            followsHtml
        );
    })
}