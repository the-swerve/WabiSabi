<?php


function user_exists() {
	// Check in db if there's a user	
	global $db;
	$users = $db->query('SELECT * FROM admins')->fetchAll();
	return count($users) > 0;
}

?>
