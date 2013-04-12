<?php

function field($name, $type) {

	// Construct an editable field within a page.

	// Initialize stuff
	global $db;
	global $field_class;
	global $signed_in;

	$path = "/";
	if($type == 'specific') {
		// this field is tied to this specific path
		$no_params = explode('?', $_SERVER['REQUEST_URI'], 2);
		$path = str_replace(P, "", $no_params[0]);
	}

	$head = "<div class='wabisabi-field' id='wysihtml5-{$name}'>";
	$foot = "</div>";

	if($signed_in && !$_GET['preview']) {
		$head .= "<textarea class='wabisabi-textarea' id='wysihtml5-textarea-{$name}' data-toolbar-id='wysihtml5-toolbar-{$name}' data-field-name='{$name}' data-field-type='{$type}'>";
		$foot = "</textarea>".$foot;
	}

	ob_start();

	// Find this field
	$found = $field_class->find_field($name, $path, $type);
	if($found) {
		echo $head.html_entity_decode($found['content']).$foot;
	} else {

		// Field not found: create this field in the db
		$new_field = $field_class->create($name, $path, $type);
		// Display the newly created field
		if($new_field) {
			echo $head.$new_field['content'].$foot;
		} else {
			echo "Could not create this field <br />  ";
		}

	}

	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

?>
