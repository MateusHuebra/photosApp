<div class="row content-profile">
    <div class="col s12 l4 offset-l4 no-padding profile-content">
        <img src="<?php echo $profileUser->getCoverPicture(); ?>" alt="" class="profile-cover">
        <div class="profile-picturearea">
            <img src="<?php echo $profileUser->getProfilePicture(); ?>" alt="" class="profile-picture">
            <i class="material-icons profile-editpicture hidden">edit</i>
        </div>
    </div>

    <div id="timeline">
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
    </div>

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

<script type="text/javascript">
    <?php
    echo 'var username = "' . $profileUser->getUsername() . '";';
    ?>
</script>
<script type="text/javascript" src="/photosApp/js/PostFunctions.js"></script>
<script type="text/javascript" src="/photosApp/js/Profile/index.js"></script>