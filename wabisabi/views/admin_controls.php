
<div id='ws-admin-bar'>

<!-- TODO make this a bootstrap navbar -->

	<a id='ws-logout' title='Logout' href='#logout'><i class='icon-off'></i> Logout</a>
	<a id='ws-delete-page'  title='Delete this page' href='#'> <i class='icon-trash'></i> Delete page</a>

	<?php if($_GET['preview']) { ?>
		<a id='ws-edit-page' href='.'><i class='icon-edit'></i> Edit mode</a>
	<?php } else { ?>
		<a id='ws-preview-page' title='Preview page' href='?preview=true' target="_blank"> <i class='icon-eye-open'></i> Preview</a>
	<?php } ?>

	<a id='ws-saving-status' style='display:none;'></a>

		<script type="text/template" id='ws-toolbar-template'>
			<div class='wysihtml5-toolbar' id='{{ toolbar_id }}' style='display:none;'>

				<a id='ws-toolbar-field-name'>{{ field_name.replace("_"," ") }}: </a>

				<a title='bold' data-wysihtml5-command="bold"><b>b</b></a>
				<a title='italic' data-wysihtml5-command="italic"><i>i</i></a>

				<a title='Heading 1' data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1">h1</a>
				<a title='Heading 2' data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2">h2</a>
				<a title='Heading 3' data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h3">h3</a>
				<a title='Heading 4' data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h4">h4</a>

				<a title='Insert link'  data-wysihtml5-command="createLink"><i class='icon-link'></i></a>

				<div data-wysihtml5-dialog='createLink' style='display: none;' class='wysihtml5-dialog'>
					<label>
						Link: <input data-wysihtml5-dialog-field="href" value="http://">
					</label>
					<a data-wysihtml5-dialog-action="save" >OK</a>
					<a data-wysihtml5-dialog-action="cancel" >Cancel</a>
				</div>

				<a title='Insert a picture'  data-wysihtml5-command="insertImage"><i class='icon-picture'></i></a>
					<div data-wysihtml5-dialog="insertImage" style='display: none;' class='wysihtml5-dialog'>
						<label>
							Image:
							<input data-wysihtml5-dialog-field="src" value="http://">
						</label>
						<a data-wysihtml5-dialog-action="save" >OK</a>
						<a data-wysihtml5-dialog-action="cancel" >Cancel</a>
					</div>

				<a title='Unordered list'  data-wysihtml5-command="insertUnorderedList"><i class='icon-list'></i></a>
				<a title='Ordered list'  data-wysihtml5-command="insertOrderedList"><i class='icon-list-ol'></i></a>

				<a title='Align center' class='btn btn-inverse tt' data-wysihtml5-command="justifyCenter"><i class='icon-align-center'></i></a>
				<a title='Align right'  data-wysihtml5-command="justifyRight"><i class='icon-align-right'></i></a>

				<a title='Block quote'  data-wysihtml5-command="formatBlock" data-wysihtml5-command-value='blockquote'><i class='icon-indent-right'></i></a>

				<a title='Horizontal rule'  data-wysihtml5-command="insertHTML" data-wysihtml5-command-value='<hr>'><i class='icon-minus'></i></a>
				<a title='HTML view'  data-wysihtml5-action="change_view">&lt;/&gt;</a>



			<a data-field-name='{{ field_name }}' data-field-type='{{ field_type }}' class='btn btn-success ws-save-field-btn' id='ws-save-field-btn'><i class='icon-check'></i> Save</a>
			</div>


		</script>

</div>
