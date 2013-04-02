<?php

function field($name) {
	// Construct an editable field within a page.

	// Initialize stuff
	global $db;
	global $field_class;
	global $signed_in;

	$head = "<div class='wabisabi-field' id='wysihtml5-{$name}'>";
	$foot = "</div>";

	if($signed_in) {
		$head .= "<textarea class='wabisabi-textarea' id='wysihtml5-textarea-{$name}' data-toolbar-id='wysihtml5-toolbar-{$name}'>";
		$foot = "</textarea>".$foot;
	}

	// Find this field
	$found = $field_class->find_field($name);
	if($found) {
		echo $head.$found['content'].$foot;
	} else {
		// Create this field in the db
		$new_field = $field_class->create($name);
		if($new_field) {
			echo $head.$new_field['content'].$foot;
		} else {
			echo "Could not create this field:  ";
			echo print_r($db->errorInfo());
		}
	}

	return true;
}

?>
