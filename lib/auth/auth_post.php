
<?php

include R.'/lib/auth/check_users.php';
require_once R.'/lib/auth/bcrypt.php';
require_once R.'/lib/models/admin.php';


if(user_exists() && $_POST['pass']) {
	// Authenticate existing user
	$admin = new Admin($db);
	$authenticated = $admin->new_session($_POST['pass']);

	if($authenticated) {
		// Redirect to home
?>

	<script>
		window.location.href='<?php echo P ?>';
	</script>

<?php

	} else {
		echo 'Invalid pass.';
	}

} elseif(!user_exists() && $_POST['new_pass']) {

	// Register a user
	$admin = new Admin($db);
	$success = $admin->register($_POST['new_pass']);
	if($success) {	
		echo 'Registered!';
	} else {
		echo 'There was a problem.';
	}
}

?>


