
<div id='ws-admin-bar'>

<!-- TODO make this a bootstrap navbar -->

	<div style='display:none;' id='ws-session-data'>
		<span id='ws-server-path' data-val='<?php echo P ?>'></span>
		<span id='ws-server-root' data-val='<?php echo R ?>'></span>
	</div>

	<a class='btn btn-inverse' id='ws-logout' title='Logout' href='#logout'><i class='icon-off'></i> Logout</a>
	<a class='btn btn-inverse' id='ws-delete-page'  title='Delete this page' href='#'> <i class='icon-trash'></i> Delete page</a>

	<?php if($_GET['preview']) { ?>
		<a href='.' class='btn btn-inverse'><i class='icon-edit'></i> Edit mode</a>
	<?php } else { ?>
		<a class='btn btn-inverse' id='ws-delete-page' title='Delete this page' href='?preview=true' target="_blank"> <i class='icon-eye-open'></i> Preview</a>
	<?php } ?>

	<a id='ws-saving-status' style='display:none;'></a>

		<script type="text/template" id='ws-toolbar-template'>
			<div class='btn-group wysihtml5-toolbar' id='<%= toolbar_id %>' style='display:none;'>

				<a id='ws-toolbar-field-name' class='btn btn-inverse disabled'><%= field_name.replace("_"," ") %>: </a>

				<a data-toggle='tooltip' title='bold' class='tt btn btn-inverse' data-wysihtml5-command="bold"><b>b</b></a>
				<a data-toggle='tooltip' title='italic' class='tt btn btn-inverse' data-wysihtml5-command="italic"><i>i</i></a>

				<a data-toggle='tooltip' title='Heading 1' class='tt btn btn-inverse' data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1">h1</a>
				<a data-toggle='tooltip' title='Heading 2' class='tt btn btn-inverse' data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2">h2</a>
				<a data-toggle='tooltip' title='Heading 3' class='tt btn btn-inverse' data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h3">h3</a>
				<a data-toggle='tooltip' title='Heading 4' class='tt btn btn-inverse' data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h4">h4</a>

				<a data-toggle='tooltip' title='Insert link' class='tt btn btn-inverse' data-wysihtml5-command="createLink"><i class='icon-link'></i></a>
				<div data-wysihtml5-dialog='createLink' style='display: none;' class='wysihtml5-dialog'>
					<label>
						Link: <input data-wysihtml5-dialog-field="href" value="http://">
					</label>
					<a data-wysihtml5-dialog-action="save" class='btn btn-inverse'>OK</a>
					<a data-wysihtml5-dialog-action="cancel" class='btn btn-inverse'>Cancel</a>
				</div>

				<a data-toggle='tooltip' title='Insert a picture' class='tt btn btn-inverse' data-wysihtml5-command="insertImage"><i class='icon-picture'></i></a>
					<div data-wysihtml5-dialog="insertImage" style='display: none;' class='wysihtml5-dialog'>
						<label>
							Image:
							<input data-wysihtml5-dialog-field="src" value="http://">
						</label>
						<a data-wysihtml5-dialog-action="save" class='btn btn-inverse'>OK</a>
						<a data-wysihtml5-dialog-action="cancel" class='btn btn-inverse'>Cancel</a>
					</div>

				<a data-toggle='tooltip' title='Unordered list' class='tt btn btn-inverse' data-wysihtml5-command="insertUnorderedList"><i class='icon-list'></i></a>
				<a data-toggle='tooltip' title='Ordered list' class='tt btn btn-inverse' data-wysihtml5-command="insertOrderedList"><i class='icon-list-ol'></i></a>

				<a data-toggle='tooltip' title='Align center' class='btn btn-inverse tt' data-wysihtml5-command="justifyCenter"><i class='icon-align-center'></i></a>
				<a data-toggle='tooltip' title='Align right' class='tt btn btn-inverse' data-wysihtml5-command="justifyRight"><i class='icon-align-right'></i></a>

				<a data-toggle='tooltip' title='Block quote' class='tt btn btn-inverse' data-wysihtml5-command="formatBlock" data-wysihtml5-command-value='blockquote'><i class='icon-indent-right'></i></a>

				<a data-toggle='tooltip' title='Horizontal rule' class='tt btn btn-inverse' data-wysihtml5-command="insertHTML" data-wysihtml5-command-value='<hr>'><i class='icon-minus'></i></a>


			<a data-field-name='<%= field_name %>' data-field-type='<%= field_type %>' class='btn btn-success ws-save-field-btn' id='ws-save-field-btn'><i class='icon-check'></i> Save</a>
			</div>


		</script>

</div>
