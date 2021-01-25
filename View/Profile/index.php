<div class="row content-profile">
    <div class="col s12 l4 offset-l4 no-padding">
        <img src="<?php echo $user->getCoverPicture(); ?>" alt="" class="profile-cover">
        <img src="<?php echo $user->getProfilePicture(); ?>" alt="" class="profile-picture">
    </div>
    
    <div class="col s12 l4 offset-l4">
        
    <div id="timeline">

    </div>
    
    </div>
</div>

<script type="text/javascript">
<?php
    echo 'var username = "'.$user->getUsername().'";';
?>
</script>
<script type="text/javascript" src="/photosApp/js/Profile/index.js"></script>