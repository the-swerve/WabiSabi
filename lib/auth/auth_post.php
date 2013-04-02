
<?php

if($admin_class->admin_exists() && $_POST['pass']) {
	// Authenticate existing user
	$authenticated = $admin_class->new_session($_POST['pass']);

	if($authenticated) {
		// Redirect to home
		?> <script> window.location.href='<?php echo P ?>'; </script> <?php

	} else {
		echo 'Invalid pass.';
	}

} elseif(!$admin_class->admin_exists() && $_POST['new_pass']) {

	// Register a user
	$success = $admin_class->register($_POST['new_pass']);
	if($success) {	
		?> <script> window.location.href='<?php echo P ?>'; </script> <?php
	} else {
		echo 'There was a problem.';
	}
}

?>
