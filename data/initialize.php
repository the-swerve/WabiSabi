
<?php

// Initialize our Sqlite database
// We also detect if it hasn't been set up; if not, then automatically set it up and redirect to /admin

// Open our sqlite database
$db = new PDO('sqlite:'.R.'/data/wabisabi.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Detect if the database has been set up
try {
	$db->query("SELECT * FROM pages");
} catch (PDOException $err) {
	require_once 'setup.php';
}

?>
