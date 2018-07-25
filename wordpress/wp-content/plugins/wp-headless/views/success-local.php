<?php include('shared/header.php'); ?>
 	<div class="postbox" style="padding: 25px;">
	  <h2>Local Success!</h2>
	  <p>Created: <?= $content["file_name"]; ?></p>
	  <p>Path: <a href='<?= $local_path; ?>'><?= $local_path; ?></a></p>
  </div>
<?php include('shared/footer.php'); ?>