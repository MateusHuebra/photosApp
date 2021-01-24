<div class="row content-create">
    <form class="col s12 l4 offset-l4" method="post" action="/photosApp/create/post" enctype="multipart/form-data">

        <div class="file-field input-field">
            <div class="btn blue darken-4">
                <span>File</span>
                <input name="picture" type="file" multiple>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Add a picture">
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <textarea name="postText" id="text" class="materialize-textarea" maxlength="255"><?php echo $info; ?></textarea>
                <label for="text">Textarea</label>
                <div id="counter">255</div>
            </div>
            <div class="fixed-action-btn">
                <button name="submit" type="submit" class="btn-floating btn-large blue darken-4">
                    <i class="large material-icons">add</i>
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

<script type="text/javascript" src="/photosApp/js/Create/index.js"></script>