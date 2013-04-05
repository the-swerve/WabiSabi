<p id='nonexistant'>This page doesn't exist.</p>

<?php if($signed_in) { ?>

	<?php require_once R.'/templates/manifest.php'; ?>

	<div class='create-page'>

		<form>
			<label>new page: </label>
			<select class='input-medium' id='template_name'>
				<option>select template</option>
				<?php foreach($templates as $t) { ?>
					<option><?php echo $t; ?></option>
				<?php } ?>
			</select>
			<input type='text' placeholder='page title' class='input-medium' id='title'/>
			<input type="submit" class='btn' id='create-page' value="Create" />
		</form>

		<p id='creating-loading' class='hide'><i class='icon-spinner icon-spin icon-large'></i> creating...</p>

	</div>

<?php } ?>
