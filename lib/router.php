<?php

// Load and initialize Silex
require_once R.'/lib/silex/vendor/autoload.php';
$app = new Silex\Application();
$app['debug'] = true;

// Initialize the page class
require_once 'lib/models/page.php';
$page_class = new Page($db);

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

use Symfony\Component\HttpFoundation\Request;

$app->post('/admin/pages', function (Request $request) use ($app) {
	// Create a page
	global $page_class;
	$success = $page_class->create($request->get('path'), $request->get('title'), $request->get('template_name'));

	if($success) {
		return $app->json(array('message' => 'page created'));
	} else {
		return $app->json(array('message' => 'could not create page'), 400);
	}
});

$app->delete('/admin/pages', function (Request $request) use ($app) {
	// Destroy a page by path
	global $page_class;
	$success = $page_class->destroy($request->get('path'));

	if($success) {
		return $app->json(array('message' => 'page destroyed'));
	} else {
		return $app->json(array('message' => 'could not destroy page'), 400);
	}
});

// Generalized scoping
// Yeah, it only goes up to four directories. There ain't no splats in Silex.

$app->get('/{one}/{two}/{three}/{four}', function ($one,$two,$three,$four) use ($app) {
	global $page_class;
	$path = P.'/'.$one.'/'.$two.'/'.$three.'/'.$four;
	// Search for a page with this path - O(n)
	$page = $page_class->find_page($path);
	if($page) {
		return inc('/templates/'.$page['template'].'.php');
	} else {
		return inc('/lib/404.php');
	}
});

$app->get('/{one}/{two}/{three}', function ($one,$two,$three) use ($app) {
	global $page_class;
	$path = P.'/'.$one.'/'.$two.'/'.$three;
	// Search for a page with this path - O(n)
	$page = $page_class->find_page($path);
	if($page) {
		return inc('/templates/'.$page['template'].'.php');
	} else {
		return inc('/lib/404.php');
	}
});

$app->get('/{one}/{two}', function ($one,$two) use ($app) {
	global $page_class;
	$path = P.'/'.$one.'/'.$two;
	// Search for a page with this path - O(n)
	$page = $page_class->find_page($path);
	if($page) {
		return inc('/templates/'.$page['template'].'.php');
	} else {
		return inc('/lib/404.php');
	}
});

$app->get('/{one}', function ($one) use ($app) {
	global $page_class;
	$path = P.'/'.$one;
	// Search for a page with this path - O(n)
	$page = $page_class->find_page($path);
	if($page) {
		return inc('/templates/'.$page['template'].'.php');
	} else {
		return inc('/lib/404.php');
	}
});


// Root

$app->get('/', function () {
	global $page_class;
	$path = P.'/';
	// Search for a page with this path - O(n)
	$page = $page_class->find_page($path);
	if($page) {
		return inc('/templates/'.$page['template'].'.php');
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
