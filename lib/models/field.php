
<?php

class Field {

	public function __construct(PDO $db) {
		// Make the database accessible to Field instances
		$this->db = $db;
	}

	public function find_field($name, $path, $type) {
		return reset($this->db->query("SELECT * FROM fields WHERE name = \"{$name}\" AND path = \"{$path}\" AND type = \"{$type}\"")->fetchAll());
	}

	public function create($name, $path, $type) {
		// TODO don't allow creation of repeat fields
		// TODO generalize the sql stuff below
		// Prepare our sql command

		// Filter reserved names	
		if($name == 'content') { $name = '_content'; }
		if($name == 'name') { $name = '_name'; }
		if($name == 'path') { $name = '_path'; }
		if($name == 'type') { $name = '_path'; }

		$db_insert = "INSERT INTO fields (created_at,updated_at,name,path,type,content)
			VALUES (:created_at,:updated_at,:name,:path,:type,:content)";
		$statement = $this->db->prepare($db_insert);

		$default_content = 'Edit this field.';

		// Bind parameters to values
		$statement->bindParam(':created_at', time());
		$statement->bindParam(':updated_at', time());
		$statement->bindParam(':name', $name);
		$statement->bindParam(':path', $path);
		$statement->bindParam(':type', $type);
		$statement->bindParam(':content', $default_content);

		// Execute table creation
		$statement->execute();

		return $this->find_field($name, $path, $type);

	} // create

	public function update($name, $path, $type, $content) {
		if($type == 'generic') { $path = ''; }
		$db_update = "UPDATE fields SET content = \"{$content}\" WHERE name = \"{$name}\" AND path = \"{$path}\" AND type = \"{$type}\"";
		return $this->db->exec($db_update);
	}


}
