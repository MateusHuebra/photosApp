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
      <h5 style="padding: 0% 0% 2% 8%;"><?php \Service\Translation::echo('posts.likes'); ?></h5>
      <ul class="collection likeslist">
      </ul>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves btn-flat"><?php \Service\Translation::echo('interface.close'); ?></a>
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
			<h5><?php \Service\Translation::echo('interface.noPostsToShow'); ?></h5>
			<p><?php \Service\Translation::echo('interface.searchForPeopleToFollow'); ?></a></p>
		</div>
		<div class="modal-footer">
			<a class="modal-close waves-effect waves-white btn-flat"><?php \Service\Translation::echo('interface.cancel'); ?></a>
			<a href="/search" class="waves-effect waves-white btn-flat"><i class="material-icons left">search</i><?php \Service\Translation::echo('interface.search'); ?></a>
		</div>
	</div>

<script type="text/javascript" src="/js/PostFunctions.js"></script>
<script type="text/javascript" src="/js/CreateButton.js"></script>
<script type="text/javascript" src="/js/Home/index.js"></script>