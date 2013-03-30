
function delete_cookie(name) {
	document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

$(document).ready(function() {

	$('#logout').click(function(e) {
		e.preventDefault();
		delete_cookie('wbsesh')
		window.location.reload();
	});

	$('#delete-page').click(function(e) {
		e.preventDefault();
		if(confirm('Are you sure?') &&
			confirm('Are you really sure?') &&
			confirm('Are you really really sure?')) {

			alert('deleted!');
			window.location.href = '/';
		}
	});

});
