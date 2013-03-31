<?php

// General utilities

// A utility function for loading up php templates
// For use inside routing functions in index.php
function inc($file) {
	global $db; // give access to the db within our included file
	global $path;
	global $page_class;
	global $signed_in;

	ob_start();
	include R.$file;
	$content = ob_get_contents();
	ob_end_clean();

	return $content; // awww yeah
}
