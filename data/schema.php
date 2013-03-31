
<?php

$admins = "CREATE TABLE IF NOT EXISTS admins (
	           id INTEGER PRIMARY KEY,
	           created_at INTEGER,
	           updated_at INTEGER,
						 session_token TEXT,
	           pass_hash TEXT)";

$gardens = "CREATE TABLE IF NOT EXISTS gardens (
	           id INTEGER PRIMARY KEY,
	           created_at INTEGER,
	           updated_at INTEGER,
	           name TEXT,
	           content TEXT)";

$pages = "CREATE TABLE IF NOT EXISTS pages (
					 id INTEGER PRIMARY KEY,
					 created_at INTEGER,
					 updated_at INTEGER,
					 path TEXT,
					 title TEXT,
					 template TEXT)";

// The many-to-many join table for gardens and pages. One page will have many 
// gardens, and a single garden might have multiple pages (think sidebars).
$gardens_pages = "CREATE TABLE IF NOT EXISTS gardens_pages (
									garden_id INTEGER,
									page_id INTEGER)";

?>
