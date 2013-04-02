
<?php

require_once 'schema.php';

$db = new PDO('sqlite:wabisabi.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {

	$db->exec($admins);
	$db->exec($fields);
	$db->exec($pages);

	echo "Database successfully setup!";
} // try

catch(PDOException $e) {

	echo "Goats! It didn't work. Check out this message:<br><br>";

	echo $e->getMessage()."<br><br>";

}

?>
