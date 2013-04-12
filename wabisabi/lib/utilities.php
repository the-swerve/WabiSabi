<?php

// General utilities

// A utility function for loading up php templates
// For use inside routing functions in router.php
function inc($file) {
	global $db; // give access to the db within our included file
	global $path;
	global $page_class;
	global $field_class;
	global $admin_class;
	global $signed_in;

	ob_start();
	include R.'/views/boilerplate.php';

	include R.$file;

	echo '</body></html>';
	$content = ob_get_contents();
	ob_end_clean();

	return $content; // awww yeah
}

function navigation() {
	// list out <li> tags for all of the pages in this dir
	// Retrieve all pages whose path starts with $dir
	global $page_class;
	$names = $page_class->all();
	$nested = false; // Keep track of whether we're in a nested list
	$markup = "<ul class='nav-list'>";
	foreach($names as $n) {
		// Take out the root path and split the path by slashes
		$dirs = explode("/", str_replace(P, '', $n['path']));
		if(count($dirs) > 2) {
			// This is a subdirectory
			if(!$nested) {
				$markup .= "<li class='sub-nav'><ul>";
			}
			$nested = true;
		} else { // This is a parent directory
			if($nested) {
				// End our nested list
				$markup .= '</ul></li>';
			}
			$nested = false;
		}
		$markup .= "<li class='nav-item'><a href='{$n['path']}'>{$n['title']}</a></li>";
	}
	if($nested) {
		$markup .= '</ul></li>';
	}
	$markup .= '</ul>';
	return $markup;
}

?>
