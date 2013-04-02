
<?php

$admins = "CREATE TABLE IF NOT EXISTS admins (
	           id INTEGER PRIMARY KEY,
	           created_at INTEGER,
	           updated_at INTEGER,
						 session_token TEXT,
	           pass_hash TEXT)";

$fields = "CREATE TABLE IF NOT EXISTS fields (
	           id INTEGER PRIMARY KEY,
	           created_at INTEGER,
	           updated_at INTEGER,
	           name TEXT,
						 path TEXT,
						 type TEXT,
	           content TEXT)";

$pages = "CREATE TABLE IF NOT EXISTS pages (
					 id INTEGER PRIMARY KEY,
					 created_at INTEGER,
					 updated_at INTEGER,
					 path TEXT,
					 title TEXT,
					 template TEXT)";

?>
