<div class="preloader-wrapper active" style="left: 45%;top: 20px;">
    <div class="spinner-layer spinner-blue-only">
        <div class="circle-clipper left">
            <div class="circle"></div>
        </div>
        <div class="gap-patch">
            <div class="circle"></div>
        </div>
        <div class="circle-clipper right">
            <div class="circle"></div>
        </div>
    </div>
</div>

<div id="page" class="hidden">

    <div class="row content-profile">
        <div class="col s12 l4 offset-l4 no-padding profile-content">
            <img src="<?php echo $profileUser->getCoverPicture(); ?>" alt="" class="profile-cover">
            <div class="profile-picturearea">
                <img src="<?php echo $profileUser->getProfilePicture(); ?>" alt="" class="profile-picture">
                <span class="profile-username"><?php echo $profileUser->getUsername(); ?></span>
                <button id="profile-picture" onclick="$('#pictureUpload').trigger('click');" class="color-black btn-floating waves-effect  blue darken-4" style="position: absolute; right: -10px; top: -10px;"><i class="material-icons">edit</i></button>
            </div>
        </div>
    </div>

    <div id="posts" class="feed">

    </div>




    <div id="modalLikes" class="modal modal-fixed-footer">
        <div class="modal-content likeslist-content">
            <ul class="collection likeslist">
            </ul>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves btn-flat">Close</a>
        </div>
    </div>

    <div id="modalProfilePicture" class="modal modal-fixed-footer">
        <form method="post" action="/photosApp/profile/uploadProfilePicture" enctype="multipart/form-data">
            <div class="modal-content" style="overflow-x: hidden;">

                <div class="file-field input-field">
                    <img id="pictureUploadPreview" class="sidenav-photo" src="<?php echo $_SESSION['user']->getProfilePicture(); ?>">
                    <div style="left: -300px; position: absolute;" class="center btn blue darken-4">
                        <span>Select Picture</span>
                        <input id="pictureUpload" name="picture" type="file" multiple>

                    </div>
                    <div style="left: -300px; position: absolute;" class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Add a picture">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves btn-flat">Cancel</a>
                <button name="submit" type="submit" class="modal-close waves-effect waves-teal btn-flat">Change Picture</button>
            </div>
        </form>
    </div>

    <div class="fixed-action-btn">
        <a href="/photosApp/create" class="btn-floating btn-large blue darken-4">
            <i class="large material-icons">add_photo_alternate</i>
        </a>
    </div>

</div>

<script type="text/javascript">
    <?php
    echo 'var profileUsername = "' . $profileUser->getUsername() . '"; ';
    if (!is_null($error)) {
        echo 'M.toast({html: "' . $error . '", classes: "rounded"});';
    }
    ?>
</script>
<script type="text/javascript" src="/photosApp/js/PostFunctions.js"></script>
<script type="text/javascript" src="/photosApp/js/CreateButton.js"></script>
<script type="text/javascript" src="/photosApp/js/Profile/index.js"></script>