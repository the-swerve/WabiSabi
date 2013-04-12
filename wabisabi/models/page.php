<?php

class Page {

	public function __construct(PDO $db) {
		// Make the database accessible to Page instances
		$this->db = $db;
	}

	public function find_page($path) {
		// Check in db if there's a page based on the path
		$page = $this->db->query("SELECT * FROM pages WHERE path = \"{$path}\"")->fetchAll();
		return reset($page);
	}

	public function all() {
		return $this->db->query("SELECT * FROM pages")->fetchAll();
	}

	public function create($path, $title, $template_name) {
		if($template_name == 'select template') {
			return false;
		}
		// TODO don't allow creation of repeat pages
		// Prepare our sql command
		$db_insert = "INSERT INTO pages (created_at,updated_at,path,title,template)
									VALUES (:created_at,:updated_at,:path,:title,:template)";
		$statement = $this->db->prepare($db_insert);

		// Bind parameters to values
		$statement->bindParam(':created_at', time());
		$statement->bindParam(':updated_at', time());
		$statement->bindParam(':path', $path);
		$statement->bindParam(':title', $title);
		$statement->bindParam(':template', $template_name);

		// Execute table creation
		$statement->execute();

		return true; // success
	}

	public function destroy($path) {
		// destroy a page by path
		$this->db->query('DELETE FROM pages WHERE path = "'.$path.'"');
		return true;
	}

}

?>
