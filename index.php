<?php

/* WabiSabi CMS
 * An ultra-minimal in-place content management system
 * By Jay R Bolton (jayrbolton@gmail.com ` boltonium.com)
 * Tools: Silex, PHPTI
 */

// Setup and configuration
// -----------------------

define('R', __DIR__); // define root ('R') as the directory of index.php

// Open/create SQLite db files
$db = new PDO('sqlite:'.R.'/data/wabisabi.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Requirements
require_once R.'/lib/utilities.php';

// Load and initialize Silex
require_once R.'/lib/silex/vendor/autoload.php';
$app = new Silex\Application();
$app['debug'] = true;

// Routing
// -------


// Administration and Setup

$app->get('/admin', function () {
	// Authenticate an administrator
	return inc('/lib/auth/auth.php');
});

$app->post('/admin', function () {
	// Authenticate an administrator
	return inc('/lib/auth/auth_post.php');
});

$app->get('/setup', function () {
	// Setup the database (run once)
	return inc('/data/setup_db.php');
});


// Generalized scoping
// Yeah, it only goes up to four directories. There ain't no splats in Silex.

$app->get('/{one}/{two}/{three}/{four}', function ($one,$two,$three) use ($app) {
	// Three scopes
	return $app->escape($one).$app->escape($two).$app->escape($three).$app->escape($four);
});

$app->get('/{one}/{two}/{three}', function ($one,$two,$three) use ($app) {
	// Three scopes
	return $app->escape($one).$app->escape($two).$app->escape($three);
});

$app->get('/{one}/{two}', function ($one,$two) use ($app) {
	// Two scopes
	return $app->escape($one).$app->escape($two);
});

$app->get('/{one}', function ($one) use ($app) {
	// One scope
	return $app->escape($one);
});


// Root

$app->get('/', function () {
	// Root
	return inc('/temple/index.php');
});


// Miscellaneous

$app->error(function (\Exception $e, $code) {
	// Error routing
	return 'We are sorry, but something went terribly wrong: <br><br>'.$e.$code;
});


// Run Silex

$app->run();

?>
