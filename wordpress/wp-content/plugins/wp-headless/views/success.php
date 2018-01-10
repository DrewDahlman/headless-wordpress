<?php include('shared/header.php'); ?>
 	<div class="postbox" style="padding: 25px;">
	  <h2>Success!</h2>
	  <p>Uploaded: <?= $content["file_name"]; ?></p>
	  <p>Path: <a href='<?= $this->uploader->settings['file_url']; ?>'><?= $this->uploader->settings['file_url']; ?></a></p>
  </div>
<?php include('shared/footer.php'); ?>