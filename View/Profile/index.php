<div class="row content-profile">
    <div class="col s12 l4 offset-l4 no-padding profile-content">
        <img src="<?php echo $profileUser->getCoverPicture(); ?>" alt="" class="profile-cover">
        <div class="profile-picturearea">
            <img src="<?php echo $profileUser->getProfilePicture(); ?>" alt="" class="profile-picture">
            <i class="material-icons profile-editpicture hidden">edit</i>
        </div>
    </div>
        
    <div id="timeline">

    </div>

</div>

<script type="text/javascript">
<?php
    echo 'var username = "'.$profileUser->getUsername().'";';
?>
</script>
<script type="text/javascript" src="/photosApp/js/Profile/index.js"></script>