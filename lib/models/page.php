
<?php

class Page {

	public function __construct(PDO $db) {
		// Make the database accessible to Page instances
		$this->db = $db;
	}

	public function page_exists() {
		return false;
	}

}

?>
