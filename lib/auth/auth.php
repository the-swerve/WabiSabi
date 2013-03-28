<!DOCTYPE html>
<html>
<head>
<style>
	body {
		text-align: center;
	}
	form {
		margin: 0 auto 0 auto;
		width: 20em;
	}

	input {
		width: 10em;
		font-family: monospace;
		font-size: 24px;
		padding: 12px;
		border: 1px solid #ddd;
		box-shadow: 0 0 7px 0 #ddd;
	}

	h1 {
		margin-top: 10%;
		font-family: monospace;
		color: #555;
		font-size: 18px;
	}
</style>
</head>
<body>

<?php include R.'/lib/auth/check_users.php' ?>

<?php if(user_exists()) { ?>

	<h1>Sign in</h1>

	<form method="post">
		<input type="password" placeholder="Password" name="pass" />
	</form>

<?php } else { ?>

	<h1>Create your password</h1>

	<form method="post">
		<input type="password" placeholder="New password" name="new_pass" />
	</form>

<?php } ?>

</body></html>
