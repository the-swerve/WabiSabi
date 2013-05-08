// TODO separate UI from data from ajax

/* Utilities */
/* TODO get a js plugin to manage cookie so this doesn't have to be maintained */

function delete_cookie(name) {
	document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function create_cookie(name, value, exdays) {
	var exdate = new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
	document.cookie = name + "=" + value;
}

/* Configure underscore templating */
_.templateSettings = {
	  interpolate : /\{\{(.+?)\}\}/g
};

/* Return  */

$(document).ready(function() {

	// Make the needed server data accessible locally
	var WSData = {};
	WSData.server_path = $('#ws-server-path').data('val');
	WSData.server_root = $('#ws-server-root').data('val');
	WSData.page_path = window.location.pathname.replace(WSData.server_path, "");

	$('.wysihtml5-toolbar a').click(function(e) {
		$(this).parent('.wysihtml5-toolbar').show();
	});

	// Hide the delete page and preview buttons if we're on 404
	// TODO move this to php
	if($('.ws-create-page').length) {
		$('#ws-delete-page').hide();
		$('#ws-preview-page').hide();
	}

	// Login as an administrator
	$('#ws-session-form').submit(function(e) {
		e.preventDefault();
		$('#ws-session-status').html('<i class="icon-spinner icon-spin"></i> authenticating...');
		var pass = $('#ws-session-pass').val();
		$.post(WSData.server_path + '/admin/session', {pass: 7px;
			.done(function(d) {
				create_cookie('wbsession', d.session_token);
				window.location.href = WSData.server_path;
			})
			.fail(function(d) {
				$('#ws-session-status').text('Invalid password.');
			});
	});

	// Register as an administrator
	$('#ws-registration-form').submit(function(e) {
		e.preventDefault();
		$('#ws-registration-status').html('<i class="icon-spinner icon-spin"></i> registering...');
		var new_pass = $('#ws-registration-pass').val();
		$.post(WSData.server_path + '/admin/registration', {new_pass: new_pass}, {}, 'json')
			.done(function(d) {
				create_cookie('wbsession', d.session_token);
				window.location.href = WSData.server_path;
			})
			.fail(function(d) {
				$('#ws-registration-status').text('Unable to register.');
			});
	});

	// Logout as administrator
	$('#ws-logout').click(function(e) {
		delete_cookie('wbsession');
		window.location.reload();
	});

	// Delete the current page
	$('#ws-delete-page').click(function(e) {
		e.preventDefault();
		if(confirm('Are you sure you want to remove this page?') &&
			confirm('Note: this is permanent. Are you really sure?')) {

			$.ajax({
				type: 'delete',
				data: {
					path: WSData.page_path
				},
				url: WSData.server_path + '/admin/pages'
			}).done(function(d) {
					window.location.reload();
			}).fail(function(d) {
				alert('Page deletion failed.');
			});
		}
	});

	// Create a page at the current location
	$('#ws-create-page').click(function(e) {
		e.preventDefault();
		$('#ws-creating-loading').fadeIn();

		var data = {
			path: WSData.page_path,
			title: $('#ws-title').val(),
			template_name: $('#ws-template-name').val()
		};

		$.post(WSData.server_path + '/admin/pages', data, {}, 'html')
			.done(function(d) {
				window.location.reload();
			})
			.fail(function(d) {
				$('#ws-creating-loading').text('Page creation failed.');
			});
	});

	// Update a field
	// This is called by the iframe blur boondoggle down below by the wysiwyg stuff	
	function update_field(name, path, type, content) {
		$.ajax({
			type: 'post',
			url: WSData.server_path + '/admin/fields',
			data: {name: name, path: path, type: type, content: content}
		}).done(function (d) {
			$('#ws-saving-status').html('<i class="icon-check"></i> Saved.');
		}).fail(function (d) {
			$('#ws-saving-status').html('<i class="icon-remove"></i> Error saving.');
		});
	}

	// Set up underscore.js templating

	// If the administration bar is visible, nudge the body down a bit. 
	if($('.ws-admin-bar').is(":visible")) {
		$('html').css('margin-top', '50px');
	}

	textareas = $('textarea.wabisabi-textarea');


	if(textareas.length) {

		// Initialize wysihtml5
		// Use a template for toolbars
		compiled = _.template($("#ws-toolbar-template").html());
		ids = [];
		styles = [];
		$('link[rel=stylesheet]').map(function() {
			styles.push($(this).attr('href'));
		});

		textareas.each(function() {
			
			self = $(this);
			id = $(this).attr('id');
			toolbar_id = $(this).data('toolbar-id');
			ids[id] = toolbar_id;
			field_name = $(this).data('field-name');
			field_type = $(this).data('field-type');

			// We have to generate a separate toolbar for every separate field.
			// I know, fucking stupid.
			$('#ws-admin-bar').append(compiled({toolbar_id: toolbar_id, field_name: field_name, field_type: field_type}));

			// Instantiate the wysihtml5 editor
			console.log(styles);
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
				body = $(this).find('iframe').contents().find('body');
				save_field_btn = $('.ws-save-field-btn');

				// Show the editing toolbar upon cursor focus on a wysiwyg
				body.focus(function(e) {
					$('#ws-saving-status').hide().html('');
					cls = $(this).attr('class').split(' ').pop();
					toolbar_id = ids[cls];
					$('.wysihtml5-toolbar').hide();
					$('#'+toolbar_id).fadeIn().css('display','inline-block');
				});

				// Dynamically save a field.
				save_field_btn.click(function(e) {
					$('.wysihtml5-toolbar').hide();
					$('#ws-saving-status').show().css('display','inline-block').html('<i class="icon-spinner icon-spin"></i> Saving...');

					name = $(this).data('field-name');
					type = $(this).data('field-type');
					content = $('iframe.wysihtml5-textarea-' + name).contents().find('body').html();

					result = update_field(name, WSData.page_path, type, content);
				});
			});
		});

	} // if

});
