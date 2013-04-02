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

<?php include 'lib/boilerplate.php' ?>

<?php

// Open our sqlite database
$db = new PDO('sqlite:'.R.'/data/wabisabi.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Initialize the model classes
require_once R.'/lib/models/admin.php';
$admin_class = new Admin($db);
require_once R.'/lib/models/page.php';
$page_class = new Page($db);
require_once R.'/lib/models/field.php';
$field_class = new Field($db);

// PHP Requirements
require_once R.'/lib/utilities.php'; // General custom utilities
require_once R.'/lib/phpti/ti.php';  // Template inheritance
require_once R.'/lib/show_field.php';  // Show fields

// Detect if the admin is signed in
// TODO take this query from the model
$admin = $db->query('SELECT * FROM admins')->fetch();
if($admin['session_token'] == $_COOKIE['wbsesh']) {
	$signed_in = true;
} else {
	$signed_in = false;
}

require_once 'lib/router.php';

?>

<?php $signed_in ? include 'lib/admin_controls.php' : '' ?>
