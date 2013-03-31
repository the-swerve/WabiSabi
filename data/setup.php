
<?php

require_once 'schema.php';

$db = new PDO('sqlite:wabisabi.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {

	$db->exec($admins);
	$db->exec($gardens);
	$db->exec($pages);
	$db->exec($gardens_pages);

	echo "Database successfully setup!";
} // try

catch(PDOException $e) {

	echo "Goats! It didn't work. Check out this message:<br><br>";

	echo $e->getMessage()."<br><br>";

	echo "I hope it helped. Note: if you've already run this setup, you'll get the 'readonly' error; in that case, stop fuddling! It's done.";

}

?>
