<?php
/* WabiSabi CMS
 * An ultra-minimal in-place content management system
 * By Jay R Bolton (jayrbolton@gmail.com ` boltonium.com)
 * Tools: Silex, phpti
 */
?>

<?php
// Setup and configuration
// -----------------------

define('R', __DIR__); // define root ('R') as the directory of index.php
define('P', '/wabisabi'); // manually define the server-relative directory 
?>

<?php include 'lib/views/boilerplate.php' ?>

<?php

// Initialize the database
require_once R.'/data/initialize.php';

// Initialize the models
require_once R.'/lib/models/admin.php';
$admin_class = new Admin($db);
require_once R.'/lib/models/page.php';
$page_class = new Page($db);
require_once R.'/lib/models/field.php';
$field_class = new Field($db);

// PHP Requirements
require_once R.'/lib/utilities.php'; // General custom utilities
require_once R.'/lib/phpti/ti.php';  // Template inheritance
require_once R.'/lib/views/show_field.php';  // Show fields

// Detect if the admin is signed in
$signed_in = false;
$admin = $admin_class->retrieve();
$cookie = $_COOKIE['wbsession'];
if($admin['session_token'] == $cookie) {
	$signed_in = true;
} 

require_once 'lib/router.php';

?>

<?php $signed_in ? include 'lib/views/admin_controls.php' : '' ?>
