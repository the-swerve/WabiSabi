<style>
	#form {
		margin: 0 auto 0 auto;
		width: 9em;
	}

	#pass {
		height: auto;
		width: 8em;
	}

	#h1 {
		text-align: center;
		margin-top: 10%;
		color: #555;
		font-size: 18px;
	}
</style>

<?php if($signed_in) { ?>

	<p>You're already signed in.</p>

<?php } else if($admin_class->admin_exists()) { ?>

	<h1 id='h1'>Login</h1>

	<form method="post" id='form'>
		<input type="password" placeholder="Password" name="pass" id='pass' />
	</form>

<?php } else { ?>

	<h1 id='h1'>Create your password</h1>

	<form method="post" id='form'>
		<input type="password" placeholder="New password" name="new_pass" id='pass' />
	</form>

<?php } ?>
