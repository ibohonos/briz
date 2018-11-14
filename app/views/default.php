<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $data['title']; ?> - Briz</title>
	<link rel="stylesheet" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
	<?php include_once VIEW_PATH . "blocks" . DS . "header.php" ?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php include VIEW_PATH . $content_view; ?>
			</div>
		</div>
	</div>
	<?php include_once VIEW_PATH . "blocks" . DS . "footer.php" ?>
	<script src="/public/js/jquery-3.3.1.min.js"></script>
	<script src="/public/js/bootstrap.min.js"></script>
	<script src="/public/js/scripts.js"></script>
</body>
</html>