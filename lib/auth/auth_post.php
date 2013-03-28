
<?php

include R.'/lib/auth/check_users.php';
require_once R.'/lib/auth/bcrypt.php';
require_once R.'/lib/models/admin.php';


if(user_exists() && $_POST['pass']) {
	Admin->new_session($_POST['pass']);
} elseif(!user_exists() && $_POST['new_pass']) {
	Admin->create($_POST['new_pass']);
}

?>


