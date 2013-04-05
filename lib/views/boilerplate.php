
<!DOCTYPE html>

<head>

	<?php require_once R.'/templates/manifest.php'; ?>

	<meta charset="utf-8">
<?php if($site_description) { ?>
	<meta name="description" content="<?php echo $site_description ?>">
<?php } ?>

	<script src="<?php echo P."/lib/javascripts/jquery-1.9.1.min.js"?>"></script>
	<script src="<?php echo P."/lib/javascripts/underscore-min.js"?>"></script>
	<script src="<?php echo P."/lib/bootstrap/js/bootstrap.min.js"?>"></script>

	<link rel="stylesheet" type='text/css' href="<?php echo P."/lib/bootstrap/css/bootstrap.min.css"?>">
	<link rel="stylesheet" type='text/css' href="<?php echo P."/lib/bootstrap/css/font-awesome.min.css"?>">

<?php if($signed_in || $_SERVER['REQUEST_URI'] == P.'/admin') { ?>
	<script src="<?php echo P."/lib/javascripts/wysihtml5-parser.js"?>"></script>
	<script src="<?php echo P."/lib/javascripts/wysihtml5-0.3.0.min.js"?>"></script>
	<script src="<?php echo P."/lib/javascripts/wysihtml5-0.3.0.min.js"?>"></script>
	<script src="<?php echo P."/lib/javascripts/app.js"?>"></script>
	<link rel="stylesheet" type='text/css' href="<?php echo P."/lib/stylesheets/style.css"?>">
<?php } ?>


<?php if($scripts) { ?>
	<?php foreach($scripts as $s) { ?>
	<script src="<?php echo P."/templates/scripts/{$s}"; ?>.js"></script>
	<?php } ?>
<?php } ?>

<?php if($styles) { ?>
	<?php foreach($styles as $s) { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo P."/templates/styles/{$s}"; ?>.css"></script>
	<?php } ?>
<?php } ?>

</head>

<body>
