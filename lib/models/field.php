
<?php

class Field {

	public function __construct(PDO $db) {
		// Make the database accessible to Field instances
		$this->db = $db;
	}

	public function find_field($name) {
		// $field = $this->db->query('SELECT * FROM fields WHERE name = "'.$name.'"')->fetchAll();
		// return reset($field);
		// The above is not working at all. I have no fucking clue why.
		$field = null;
		foreach($this->db->query("SELECT * FROM fields WHERE name = '".$name."'") as $f)  {
			$field = $f;
			break;
		}
		return $field;
	}

	public function create($name) {
		// TODO don't allow creation of repeat fields
		// TODO generalize the sql stuff below
		// Prepare our sql command
		$db_insert = "INSERT INTO fields (created_at,updated_at,name,content)
									VALUES (:created_at,:updated_at,:name,:content)";
		$statement = $this->db->prepare($db_insert);

		$default_content = 'Edit this field.';

		// Bind parameters to values
		$statement->bindParam(':created_at', time());
		$statement->bindParam(':updated_at', time());
		$statement->bindParam(':name', $name);
		$statement->bindParam(':content', $default_content);

		// Execute table creation
		$statement->execute();

		return $this->find_field($name);

	} // create

}
