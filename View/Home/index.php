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

  <div class="fixed-action-btn">
    <a href="/create" class="btn-floating btn-large blue darken-4">
      <i class="large material-icons">add_photo_alternate</i>
    </a>
  </div>

</div>

<div id="modalNoFollows" class="modal">
		<div class="modal-content">
			<h5><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.noPostsToShow'); ?></h5>
			<p><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.searchForPeopleToFollow'); ?></a></p>
		</div>
		<div class="modal-footer">
			<a class="modal-close waves-effect waves-white btn-flat"><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.cancel'); ?></a>
			<a href="/search" class="waves-effect waves-white btn-flat"><i class="material-icons left">search</i><?php echo call_user_func(array('\Service\Language\\'.$_SESSION['lang'], 'get'), 'interface.search'); ?></a>
		</div>
	</div>

<script type="text/javascript" src="/js/PostFunctions.js"></script>
<script type="text/javascript" src="/js/CreateButton.js"></script>
<script type="text/javascript" src="/js/Home/index.js"></script>