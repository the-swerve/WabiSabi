
<div class='admin-bar'>

<!-- TODO make this a bootstrap navbar -->

	<div class='btn-group'>

		<button class='btn btn-inverse' id='logout'>
			<a title='Logout' href='#logout'><i class='icon-off'></i> Logout</a>
		</button>

		<button class='btn btn-inverse' id='delete-page'>
			<a title='Delete this page' href='#'> <i class='icon-trash'></i> Delete page</a>
		</button>

	</div>

	<div class='btn disabled hide' id='saving-status'></div>

	<script type="text/template" class='toolbar-template'>
		<div class='btn-group wysihtml5-toolbar' id='<%= toolbar_id %>' style='display:none;'>

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

		</div>
	</script>

</div>
