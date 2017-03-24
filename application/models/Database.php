<?php

class Database
{

	private $db;
	private $query;
	private $result;
	private $row;

	public function __construct() {
		$this->db = $db;
	}

	private function connect() {
		$this->db = new SQLite3('../db/database.db') or die ('Unable to open database');
		$this->db->exec($this->query);
		$this->result = $this->db->query($this->query);
		while ($this->row = $this->result->fetchArray()) {
			echo $row['data'];
		}

	}
}