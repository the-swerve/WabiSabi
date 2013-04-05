
function delete_cookie(name) {
	document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function autosave() {
	$('.wabisabi-field').everyTime("300000", function() {
		name = $(this).data('name');
		$.ajax({
			type: "POST",
			url: "/admin/save_field",
			data: {name: name},
			success: function(msg) { $('#save-notify').text('Saved.'); }
		});
	});
}

$(document).ready(function() {

	// Hide the delete page button if we're on 404
	// TODO move this to php
	if($('.create-page').length) {
		$('#delete-page').hide();
		$('#wysihtml5-toolbar').hide();
	}

	// Logout as administrator
	$('#logout').click(function(e) {
		delete_cookie('wbsession');
		window.location.reload();
	});

	// Delete the current page
	$('#delete-page').click(function(e) {
		e.preventDefault();
		if(confirm('Are you sure you want to remove this page?') &&
			confirm('Note: this is permanent. Are you really sure?')) {

			$.ajax({
				type: 'delete',
				data: {
					path: window.location.pathname
				},
				dataType: 'html',
				url: '/admin/pages'
			})
				.done(function(d) {
					window.location.reload();
				})
				.fail(function(d) {
					alert('Page deletion failed.');
				});
		}
	});

	// Create a page at the current location
	$('#create-page').click(function(e) {
		e.preventDefault();
		$('#creating-loading').fadeIn();
		var data = {
			path: window.location.pathname,
			title: $('#title').val(),
			template_name: $('#template_name').val()
		};
		$.post('/admin/pages', data, {}, 'html')
			.done(function(d) {
				window.location.reload();
			})
			.fail(function(d) {
				$('#creating-loading').text('Page creation failed.');
			});
	});

	// Update a field
	// This is called by the iframe blur boondoggle down below by the wysiwyg stuff	
	function update_field(name, path, type, content) {
		console.log(name, content, type);
		result = false;
		$.ajax({
			type: 'put',
			url: '/admin/fields',
			data: {name: name, path: path, type: type, content: content},
			dataType: 'html'
		}).done(function (d) {
			$('#saving-status').html('<i class="icon-check"></i> Saved.');
		}).fail(function (d) {
			$('#saving-status').html('<i class="icon-remove"></i> Error saving.');
		});
	}

	// Automatically place tooltips with the .tt data-toggle='tooltip' title='bold' class
	$('.tt').tooltip({
		placement: 'bottom',
		container: 'body'
	});

	// Set up underscore.js templating

	// If the administration bar is visible, nudge the body down a bit. 
	if($('.admin-bar').is(":visible")) {
		$('html').css('margin-top', '50px');
	}

	textareas = $('textarea.wabisabi-textarea');

	if(textareas.length) {
		// Initialize wysihtml5
		// Use a template for toolbars
		compiled = _.template($("script.toolbar-template").html());
		ids = new Array();
		styles = $('link[rel=stylesheet]').map(function() {
			return $(this).attr('href');
		});
		console.log(styles);

		// Auto-resize our textareas to fit their content
		//TODO
		//textareas.each(function(index, elem) {
		//	textareas.attr('rows', $(''));
		//});

		textareas.each(function() {

			self = $(this);
			id = $(this).attr('id');
			toolbar_id = $(this).data('toolbar-id');
			ids[id] = toolbar_id;

			// We have to generate a separate toolbar for every separate field.
			// I know, fucking stupid.
			$('.admin-bar').append(compiled({toolbar_id: toolbar_id}));

			// Instantiate the wysihtml5 editor
			editor = new wysihtml5.Editor(id, {
				name: id, // this is important for being able to show the toolbar
				stylesheets: styles,
				toolbar: toolbar_id, // id of toolbar element
				parserRules: wysihtml5ParserRules // defined in parser rules set 
			})

		});

		// Only show the formatting commands when the user selects the field
		// We also have to show the right toolbar for the right field.
		// This was insanely fucking hard to figure out.
		// I don't even want to explain it right now.
		editor.on('load', function() {
			$('.wabisabi-field').each(function() {
				toolbar_id = $(this).find('.wabisabi-textarea').data('toolbar-id');
				$(this).find('iframe').contents().find('body').click(function(e) {
					$('#saving-status').hide().html('');
					cls = $(this).attr('class').split(' ').pop();
					toolbar_id = ids[cls];
					$('#'+toolbar_id).fadeIn(toolbar_id).css('display','inline-block');
				});
				$(this).find('iframe').contents().find('body').blur(function(e) {
					cls = $(this).attr('class').split(' ').pop();
					toolbar_id = ids[cls];
					$('.wysihtml5-toolbar').hide();
					$('#saving-status').show().css('display','inline-block').html('<i class="icon-spinner icon-spin"></i> Saving...');

					// TODO make this less hacky
					// Derive the field name from the class of the wysiwyg iframe body
					keys = cls.split('-');
					name = keys.pop();
					path = window.location.pathname;
					type = keys.pop();
					content = $(this).html();
					result = update_field(name, path, type, content);
				});
			});
		});

	} // if

});
