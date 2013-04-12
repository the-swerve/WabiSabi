<?php
// Display the WabiSabi page

require_once 'run.php';


require_once R.'/controllers/router.php';

if($signed_in) {
	include 'views/admin_controls.php';
}

?>
