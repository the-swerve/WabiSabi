
<?php

class Admin {

	public static function register(pass) {
		// Create a new user

		// Hash the pass
		$bcrypt = new Bcrypt(15);
		$hash = $bcrypt->hash($_POST['new_pass']);

		// Create the user with the stored hash
		$db_insert = "INSERT INTO admins (created_at,updated_at,pass_hash)
									VALUES (:created_at, :updated_at, :pass_hash)";
		$statement = $db->prepare($db_insert);

		// Bind parameters to sstatement variables
		$statement->bindParam(':created_at', $created_at);
		$statement->bindParam(':updated_at', $updated_at);
		$statement->bindParam(':pass_hash',  $pass_hash);

		$created_at = time();
		$updated_at = time();
		$pass_hash = $hash;

		$statement->execute();

		$admins =  $db->query('SELECT * FROM admins');
		foreach($admins as $admin) {
			echo "hash: " . $admin['pass_hash'] . "\n";
		}

	} // register


	public static function new_session(pass) {
		// Validate existing user
		echo "pass: ".$_POST['pass'];

		// Get the first usser hash
		$hash = 'wut';
		$good = $bcrypt->verify($_POST['pass'], $hash);

		if($good) {
			// Generate session token in admin table
			$session_token = 'wut';
			// Save it to a cookie
			setcookie('wbsesh', $session_token);
			header("Location: ".R);
		}
		else {
			header("Location: ".R."/admin#logfail");
		}
	} // new_session

} // class

?>
