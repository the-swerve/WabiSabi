
<?php

class Admin {

	public function __construct(PDO $db) {
		// Make the database accessible to Admin instances
		$this->db = $db;
	}

	public function register($pass) {
		// Create a new user
		// Hash the pass
		$bcrypt = new Bcrypt(15);
		$hash = $bcrypt->hash($pass);

		// Create the user with the stored hash
		$db_insert = "INSERT INTO admins (created_at,updated_at,session_token,pass_hash)
									VALUES (:created_at,:updated_at,:session_token,:pass_hash)";
		$statement = $this->db->prepare($db_insert);

		// Generate a random session token
		$generated_token = bin2hex(openssl_random_pseudo_bytes(4));

		// Bind parameters to statement variables
		$statement->bindParam(':created_at', $created_at);
		$statement->bindParam(':updated_at', $updated_at);
		$statement->bindParam(':session_token', $session_token);
		$statement->bindParam(':pass_hash', $pass_hash);

		// Store the newly-created session token in a cookie
		// (Immediatelys sign in the admin)

		$created_at = time();
		$updated_at = time();
		$pass_hash = $hash;
		$session_token = $generated_token;

		$statement->execute();

		$admins =  $this->db->query('SELECT * FROM admins');

		return true;

	} // register


	public function new_session($pass) {
		// Validate existing user
		$bcrypt = new Bcrypt(15);

		// Get the first user hash
		$admin = $this->db->query('SELECT * FROM admins')->fetch();
		$valid = $bcrypt->verify($pass, $admin['pass_hash']);

		if($valid) {
			// Save it to a cookie
			setcookie('wbsesh', $admin['session_token']);
			return true;
		}
		else {
			return false;
		}
	} // new_session

	function admin_exists() {
		// Check in db if there's a user	
		$users = $this->db->query('SELECT * FROM admins')->fetchAll();
		return count($users) > 0;
	}

} // class

?>
