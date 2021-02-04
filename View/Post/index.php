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


<div id="page" class="hidden page-forcomments">
	<div id="post">

	</div>

	<div class="row">
	<div class="col s12 l4 offset-l4 input-field comments-input">
		<textarea style="padding-right: 50px;" id="commentTextarea" maxlength="255" rows="5" class="materialize-textarea"></textarea>
		<label for="commentTextarea">Add a comment</label>

		<button id="sendComment" style=" position: absolute; right: 10px; bottom: 17px;" class="btn blue darken-4">
			<i class="material-icons">send</i>
		</button>

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

	<div id="modalCommentError" class="modal">
		<div class="modal-content">
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-red btn-flat">Close</a>
		</div>
	</div>
</div>

<script type="text/javascript">
	<?php
	echo 'var post = ' . json_encode($data['post']) . ';';
	?>
</script>

<script type="text/javascript" src="/photosApp/js/PostFunctions.js"></script>
<script type="text/javascript" src="/photosApp/js/Post/index.js"></script>