<?php

// Load and initialize Silex
require_once R.'/lib/silex/vendor/autoload.php';
$app = new Silex\Application();
$app['debug'] = true;

use Symfony\Component\HttpFoundation\Request;

// Routing
// -------

// Administration, Setup, and Configuration

$app->get('/admin', function () {
	// Administration login page
	return inc('/views/auth.php');
});

$app->post('/admin/session', function (Request $request) use ($app) {
	// Authenticate existing user
	global $admin_class;
	$token = $admin_class->new_session($request->get('pass'));
	if($token) {
		return $app->json(array('session_token' => $token));
	} else {
		return $app->json(array('message' => 'could not authenticate'), 401);
	}
});

$app->post('/admin/registration', function (Request $request) use($app) {
	// Register a user
	global $admin_class;
	$token = $admin_class->register($request->get('new_pass'));
	if($token) {	
		return $app->json(array('session_token' => $token));
	} else {
		return $app->json(array('message' => 'could not register'), 400);
	}
});

$app->delete('/admin/session', function () use ($app) {
	// Destroy the administrator's session (logout)
	global $admin_class;
	$admin_class->destroy_session();
	return 'Logged out.'; // reload with javascript
});


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

$app->post('/admin/fields', function (Request $request) use ($app) {
	// Update a field
	global $field_class;
	$success = $field_class->update($request->get('name'), $request->get('path'), $request->get('type'), htmlspecialchars($request->get('content')));
	if($success) {
		return $app->json(array('message' => 'field updated'));
	} else {
		return $app->json(array('message' => 'could not update field'), 400);
	}
});

// Generalized scoping
// TODO extract out below redundancy

$app->get('/{one}/{two}', function ($one,$two) use ($app) {
	global $page_class;
	$path = '/'.$one.'/'.$two;
	// Search for a page with this path - O(n)
	$current_page = $page_class->find_page($path);
	if($current_page) {
		return inc('/../templates/'.$current_page['template'].'.php');
	} else {
		return inc('/views/404.php');
	}
});

$app->get('/{one}', function ($one) use ($app) {
	global $page_class;
	global $signed_in;
	$path = '/'.$one;
	// Search for a page with this path - O(n)
	$current_page = $page_class->find_page($path);
	if($current_page) {
		return inc('/../templates/'.$current_page['template'].'.php');
	} else {
		return inc('/views/404.php');
	}
});

// Root
$app->get('/', function () {
	global $page_class;
	global $signed_in;
	$path = '/';
	// Search for a page with this path - O(n)
	$current_page = $page_class->find_page($path);
	if($current_page) {
		return inc('/../templates/'.$current_page['template'].'.php');
	} else {
		return inc('/views/404.php');
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
