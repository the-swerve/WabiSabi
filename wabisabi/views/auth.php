<style>
	#ws-form {
		margin: 0 auto 0 auto;
		width: 6em;
	}

	#ws-pass {
		width: 6em;
	}

	#ws-h1 {
		text-align: center;
		margin-top: 10%;
	}
</style>

<?php if($signed_in) { ?>

	<p>You're already signed in.</p>

<?php } else if($admin_class->retrieve()) { ?>

	<h1 id='ws-h1'>Login</h1>

	<form method="post" id='ws-form'>
		<input type="password" placeholder="Password" name="pass" id='ws-pass' />
	</form>

<?php } else { ?>

	<h1 id='ws-h1'>Create your password</h1>

	<form method="post" id='ws-form'>
		<input type="password" placeholder="New pass" name="new_pass" id='ws-pass' />
	</form>

<?php } ?>
