<p id='ws-nonexistent'>This page doesn't exist.</p>

<?php if($signed_in) { ?>

	<?php require R.'/../templates/manifest.php'; ?>

	<div class='ws-create-page'>

	<?php if($templates) { ?>
		<form>
			<label>Create a new page: </label>
			<select id='ws-template-name'>
				<option>select template</option>
				<?php foreach($templates as $t) { ?>
					<option><?php echo $t; ?></option>
				<?php } ?>
			</select>
			<input type='text' placeholder='page title' id='ws-title'/>
			<input type="submit" id='ws-create-page' value="Create" />
		</form>
	<?php } else { ?>
		<p><em>You have no templates</em></p>
	<?php } ?>

		<p style='display:none;' id='ws-creating-loading'> creating...</p>

	</div>

<?php } ?>
