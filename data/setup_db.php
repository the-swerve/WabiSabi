
<?php

try {

	// Create Gardens
	$db->exec("CREATE TABLE IF NOT EXISTS gardens (
	           id INTEGER PRIMARY KEY,
	           created_at INTEGER,
	           updated_at INTEGER,
	           name TEXT,
	           content TEXT)");

	// Create admins
	$db->exec("CREATE TABLE IF NOT EXISTS admins (
	           id INTEGER PRIMARY KEY,
	           created_at INTEGER,
	           updated_at INTEGER,
						 session_token TEXT,
	           pass_hash TEXT)");

	// Create paths
	$db->exec("CREATE TABLE IF NOT EXISTS paths (
	           id INTEGER PRIMARY KEY,
	           created_at INTEGER,
	           updated_at INTEGER,
	           path TEXT,
	           template TEXT)");

	echo "Database successfully setup!";
} // try

catch(PDOException $e) {

	echo "Goats! It didn't work. Check out this message:<br><br>";

	echo $e->getMessage()."<br><br>";

	echo "I hope it helped. Note: if you've already run this setup, you'll get the 'readonly' error; in that case, stop fuddling! It's done.";

}

?>
