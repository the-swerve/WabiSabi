
<?php

	$success = $page_class->create($request->get('path'), $request->get('template_name'));

	if($success) {
		json_encode(array("success" => "true"));
	} else {
		header("HTTP/1.0 400 Bad Request");
	}

?>
