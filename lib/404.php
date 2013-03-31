<p id='nonexistant'>This page doesn't exist.</p>

<?php if($signed_in) { ?>

<?php require_once R.'/templates/manifest.php'; ?>

<div class='create-page'>

	<label>new page: </label>
	<select class='input-medium' id='template_name'>
		<option>select template</option>
		<?php foreach($templates as $templ) { ?>
			<option><?php echo $templ; ?></option>
		<?php } ?>
	</select>
	<input type='text' placeholder='page title' class='input-medium' id='title'/>
	<button class='btn' id='create-page'>create</button>

	<p id='creating-loading' class='hide'><i class='icon-spinner icon-spin icon-large'></i> creating...</p>

</div>

<?php } ?>
