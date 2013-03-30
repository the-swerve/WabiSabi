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

// PHP Requirements
require_once R.'/lib/utilities.php'; // General custom utilities
require_once R.'/lib/phpti/ti.php';  // Template inheritance

// Load and initialize Silex
require_once R.'/lib/silex/vendor/autoload.php';
$app = new Silex\Application();
$app['debug'] = true;

// Detect if the admin is signed in
$admin = $db->query('SELECT * FROM admins')->fetch();
if($admin['session_token'] == $_COOKIE['wbsesh']) {
	$signed_in = true;
} else {
	$signed_in = false;
}

// Routing
// -------


// Administration, Setup, and Configuration

$app->get('/admin', function () {
	// Authenticate an administrator
	return inc('/lib/auth/auth.php');
});

$app->post('/admin', function () {
	// Authenticate an administrator
	return inc('/lib/auth/auth_post.php');
});

$app->post('/admin/logout', function () {
	// Logout the administrator
	return inc('/data/logout.php');
});


// Generalized scoping
// Yeah, it only goes up to four directories. There ain't no splats in Silex.

$app->get('/{one}/{two}/{three}/{four}', function ($one,$two,$three) use ($app) {
	$path = '/'.$one.'/'.$two.'/'.$three.'/'.$four;
	// Search for a page with this path - O(n)
	$page = false;
	if($page) {
		return 'wut';
	} else {
		return inc('/lib/404.php');
	}
});

$app->get('/{one}/{two}/{three}', function ($one,$two,$three) use ($app) {
	// Three scopes
	$path = '/'.$one.'/'.$two.'/'.$three;
	// Search for a page with this path - O(n)
	$page = false;
	if($page) {
		return 'wut';
	} else {
		return inc('/lib/404.php');
	}
});

$app->get('/{one}/{two}', function ($one,$two) use ($app) {
	// Two scopes
	$path = '/'.$one.'/'.$two;
	// Search for a page with this path - O(n)
	$page = false;
	if($page) {
		return 'wut';
	} else {
		return inc('/lib/404.php');
	}
});

$app->get('/{one}', function ($one) use ($app) {
	// One scope
	$path = '/'.$one;
	// Search for a page with this path - O(n)
	$page = false;
	if($page) {
		return 'wut';
	} else {
		return inc('/lib/404.php');
	}
});


// Root

$app->get('/', function () {
	// Root
	$path = '/';
	// Search for a page with this path - O(n)
	$page = false;
	if($page) {
		return 'wut';
	} else {
		return inc('/lib/404.php');
	}
});


// Miscellaneous

$app->error(function (\Exception $e, $code) {
	// Error routing
	if($code == 404) {
		return "This page doesn't exist.";
	}
	return 'We are sorry, but something went terribly wrong: <br><br>'.$e.$code;
});


// Run Silex

$app->run();

?>

<?php $signed_in ? include 'lib/admin_controls.php' : '' ?>
