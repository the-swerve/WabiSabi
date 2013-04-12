<!DOCTYPE html>
<html>

<head>

	<?php require_once R.'/../templates/manifest.php'; ?>

	<meta charset="utf-8">
<?php if($site_description) { ?>
	<meta name="description" content="<?php echo $site_description ?>">
<?php } ?>

<?php if($signed_in || $_SERVER['REQUEST_URI'] == P.'/admin') { ?>

	<script src="<?php echo P."/wabisabi/javascripts/jquery-1.9.1.min.js"?>"></script>
	<script src="<?php echo P."/wabisabi/javascripts/underscore-min.js"?>"></script>

	<script src="<?php echo P."/wabisabi/javascripts/wysihtml5-parser.js"?>"></script>
	<script src="<?php echo P."/wabisabi/javascripts/wysihtml5_autoresize.js"?>"></script>
	<script src="<?php echo P."/wabisabi/javascripts/app.js"?>"></script>
	<link rel="stylesheet" type='text/css' href="<?php echo P."/wabisabi/stylesheets/style.css"?>">
	<link rel="stylesheet" type='text/css' href="<?php echo P."/wabisabi/stylesheets/font-awesome.min.css"?>">

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

<body id='ws-body'>
