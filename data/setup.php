
<?php

require_once 'schema.php';

try {

	$db->exec($admins);
	$db->exec($fields);
	$db->exec($pages);
	
	// Redirect to the administration page
	$pth = P;
	echo "Your database as been setup! You may now <a href='{$pth}/admin'>login</a>";

} // try

catch(PDOException $e) {

	echo "Goats! It didn't work. Check out this message:<br><br>";

	echo $e->getMessage()."<br><br>";

}

?>
