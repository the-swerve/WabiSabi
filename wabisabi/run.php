<?php
// Initialize WabiSabi

require_once 'config.php';

define('R', __DIR__); // define root ('R') as the directory of index.php
define('P', $site_directory); // $site_directory is from config.php

// Initialize the database
require_once R.'/data/initialize.php';

// Initialize the models
require_once R.'/models/admin.php';
$admin_class = new Admin($db);
require_once R.'/models/page.php';
$page_class = new Page($db);
require_once R.'/models/field.php';
$field_class = new Field($db);

// PHP Requirements
require_once 'lib/utilities.php'; // General custom utilities
require_once 'lib/phpti/ti.php';  // Template inheritance
require_once 'views/show_field.php';  // Display and creation of fields

// Detect if the admin is signed in
$signed_in = false;
$admin = $admin_class->retrieve();
if($admin) {
	$cookie = $_COOKIE['wbsession'];
	if($admin['session_token'] == $cookie) {
		$signed_in = true;
	}
}

?>
