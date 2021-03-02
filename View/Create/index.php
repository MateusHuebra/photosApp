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

<div id="page" class="row content-create hidden">
    <form class="col s12 l4 offset-l4" method="post" action="/create/post" enctype="multipart/form-data">
        <img id="pictureUploadPreview" class="sidenav-photo" src="" style="margin-top: 10px;">
        <div class="file-field input-field">
            <div class="btn blue darken-4">
                <span><i class="large material-icons">add_photo_alternate</i></span>
                <input id="pictureUpload" name="picture" type="file" multiple>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="<?php \Service\Translation::echo('interface.selectPicture'); ?>">
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <textarea name="postText" id="text" class="materialize-textarea" maxlength="255"><?php echo $info; ?></textarea>
                <label for="text"><?php \Service\Translation::echo('interface.caption'); ?></label>
                <div id="counter">255</div>
            </div>
            <div class="fixed-action-btn">
                <button name="submit" type="submit" class="btn-floating btn-large blue darken-4">
                    <i class="large material-icons">post_add</i>
                </button>
            </div>
            <div class="col s10 offset-s1 errorMessage">
                <span class="helper-text">
                    <?php
                    echo $error;
                    ?>
                </span>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="/js/Create/index.js"></script>