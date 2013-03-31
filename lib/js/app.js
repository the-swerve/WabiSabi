
function delete_cookie(name) {
	document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

$(document).ready(function() {

	// Hide the delete page button if we're on 404
	if($('.create-page').length) $('#delete-page').hide();

	// Logout as administrator
	$('#logout').click(function(e) {
		e.preventDefault();
		delete_cookie('wbsesh')
		window.location.reload();
	});

	// Delete the current page
	$('#delete-page').click(function(e) {
		e.preventDefault();
		if(confirm('Are you sure?') &&
			confirm('Are you really sure?') &&
			confirm('Are you really really sure?')) {

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

});
