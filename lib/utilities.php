<?php

// General utilities

// A utility function for loading up php templates
// For use inside routing functions in index.php
function inc($path) {
	global $db; // give access to the db within our included file
	ob_start();
	include R.$path;
	$content = ob_get_contents();
	ob_end_clean();
	return $content; // awww yeah
}
