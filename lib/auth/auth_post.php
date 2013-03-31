
<?php

include R.'/lib/auth/check_users.php';
require_once R.'/lib/auth/bcrypt.php';
require_once R.'/lib/models/admin.php';

$admin = new Admin($db);

if($admin->admin_exists() && $_POST['pass']) {
	// Authenticate existing user
	$authenticated = $admin->new_session($_POST['pass']);

	if($authenticated) {
		// Redirect to home
		?> <script> window.location.href='<?php echo P ?>'; </script> <?php

	} else {
		echo 'Invalid pass.';
	}

} elseif(!$admin->admin_exists() && $_POST['new_pass']) {

	// Register a user
	$success = $admin->register($_POST['new_pass']);
	if($success) {	
		?> <script> window.location.href='<?php echo P ?>'; </script> <?php
	} else {
		echo 'There was a problem.';
	}
}

?>
