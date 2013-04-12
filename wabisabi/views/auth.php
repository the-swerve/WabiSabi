
<?php if($signed_in) { ?>

	<p>You're already signed in.</p>

<?php } else if($admin_class->retrieve()) { ?>

	<h1 class='ws-h1'>Login</h1>

	<form class='ws-form' id='ws-session-form'>
		<p id='ws-session-status'></p>
		<input type="password" placeholder="Password" name="pass" class='ws-pass' id='ws-session-pass' />
	</form>

<?php } else { ?>

	<h1 class='ws-h1'>Create your password</h1>

	<form class='ws-form' id='ws-registration-form'>
		<p id='ws-registration-status'></p>
		<input type="password" placeholder="New pass" name="new_pass" class='ws-pass' id='ws-registration-pass' />
	</form>

<?php } ?>
