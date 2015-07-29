<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Notes PHP/AJAX</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/stylesheets/style.css">
</head>
<body>
	<header>
		<div class="container">
			<h1>Notes</h1>
			<form action="/notes_controller/create" method="post" class="noteForm form-horizontal">
				<div class="form-group">
					<label for="inputTitle" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputTitle" name="title" placeholder="Title">
					</div>
				</div>
				<div class="form-group">
					<label for="inputDescription" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputDescription" name="description" placeholder="Description">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="hidden" name="submit">
						<input type="submit" class="btn btn-info" value="Add Note">
					</div>
				</div>
			</form>
		</div>
	</header>
	<main>
		<div class="container notes">
<?php foreach($notes as $note) { ?>
			<div class="col-sm-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<form action="/notes_controller/delete" method="post" class="deleteForm">
							<input type="hidden" name="noteID" value="<?= $note['id']; ?>">
							<input type="submit" value="x" class="btn btn-danger btn-xs">
						</form>
						<h3 class="panel-title"><?= $note['title']; ?></h3>
					</div>
					<div class="panel-body">
						<?= $note['description']; ?>
					</div>
				</div>
			</div>
<?php } ?>
		</div>
	</main>
	<footer>
		<div class="container">
			<p>Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
		</div>
	</footer>
	<script type="text/javascript" src="assets/javascripts/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="assets/javascripts/main.js"></script>
</body>
</html>