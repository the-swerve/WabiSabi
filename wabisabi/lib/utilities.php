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

// XXX move this into views
function navigation() {
	// list out <li> tags for all of the pages in this dir
	// Retrieve all pages whose path starts with $dir
	global $page_class;
	$pages = $page_class->all();
	$menu = pages_to_array($pages);
	$ul = array_to_ul($menu);
	return $ul;
} // navigation

function pages_to_array($pages) {
	// Turn a list of all pages into a PHP nested array
	// Structure:
	// 'page' =>
	// 		'path' => 'fullpath'
	// 		'title' => 'page title'
	//		'children' =>
	//				'path => 'path'
	//				'title' => 'page title'
	//	etc
	$menu = array();
	foreach($pages as $p) {
		// Take out the root path and split the path by slashes
		$dirs = explode("/", str_replace(P, '', $p['path']));
		if(count($dirs) > 2) {
			$menu[$dirs[1]]['children'][$dirs[2]] = array(
				'path' => P.$p['path'],
				'title' => $p['title']
			);
		} else {
			$menu[$dirs[1]] = array(
				'path' => P.$p['path'],
				'title' => $p['title'],
				'children' => array()
			);
		} // else
	} // foreach

	return $menu;
}

function array_to_ul($menu) {
	$ul = "<ul class='ws-nav'>";
	foreach($menu as $page) {
		$ul .= "<li class='ws-nav-item'><a href='{$page['path']}'>{$page['title']}</a>";
		if($page['children']) {
			$ul .= "<ul class='ws-sub-nav'>";
			foreach($page['children'] as $child) {
				$ul .= "<li class='ws-sub-nav-item'><a href='{$child['path']}'>{$child['title']}</a></li>";
			}
			$ul .= "</ul>";
		}
		$ul .= "</li>";
	}
	
	return $ul."</ul>";
}

// array_to_ul
		/*
			// This is a subdirectory
			if(!$nested) {
				// First nested item
				$markup .= "<ul class='ws-sub-nav'>";
			}
			$nested = true;
		} else { // This is a parent directory
			if($nested) {
				// We've been nesting; end our nested list
				$markup .= '</ul>';
			}
			if($first) {
				$markup .= '</li>';
				$first = false;
			}
			$nested = false;
		}
		$url = P.$n['path'];
		$markup .= "<li class='ws-nav-item'><a href='{$url}'>{$n['title']}</a>";
		if($nested) {
			$markup .= "</li>";
		}
	}
	if ($nested) {
		$markup .= '</ul>'; // close final nested list
	}
	$markup .= '</li></ul>'; // close 
	return $markup;
	 */

?>
